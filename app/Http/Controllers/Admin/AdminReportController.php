<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->get('from', now()->startOfMonth()->format('Y-m-d'));
        $to   = $request->get('to',   now()->format('Y-m-d'));

        // ── OVERVIEW STATS ──
        $totalDeposits    = Deposit::where('status','approved')->sum('amount');
        $totalWithdrawals = Withdrawal::where('status','completed')->sum('amount');
        $totalEarningsPaid= Transactions::where('type','earning')->sum('amount');
        $totalInvested    = Investment::sum('amount');

        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at',  now()->year)
                                 ->count();
        $totalUsers = User::count();

        $activeInvestments    = Investment::where('status','active')->count();
        $completedInvestments = Investment::where('status','completed')->count();

        // Net profit = deposits - withdrawals - earnings paid out
        $netProfit = $totalDeposits - $totalWithdrawals - $totalEarningsPaid;

        // ── MONTHLY DEPOSITS & WITHDRAWALS (last 12 months) ──
        $months = collect(range(11, 0))->map(fn($i) => now()->subMonths($i));

        $monthlyDeposits = $months->map(fn($m) =>
            Deposit::where('status','approved')
                   ->whereYear('created_at',  $m->year)
                   ->whereMonth('created_at', $m->month)
                   ->sum('amount')
        );

        $monthlyWithdrawals = $months->map(fn($m) =>
            Withdrawal::where('status','approved')
                      ->whereYear('created_at',  $m->year)
                      ->whereMonth('created_at', $m->month)
                      ->sum('amount')
        );

        $monthlyEarnings = $months->map(fn($m) =>
            Transactions::where('type','earning')
                       ->whereYear('created_at',  $m->year)
                       ->whereMonth('created_at', $m->month)
                       ->sum('amount')
        );

        $monthLabels = $months->map(fn($m) => $m->format('M Y'));

        // ── MONTHLY USER REGISTRATIONS ──
        $monthlyUsers = $months->map(fn($m) =>
            User::whereYear('created_at',  $m->year)
                ->whereMonth('created_at', $m->month)
                ->count()
        );

        // ── TOP DEPOSITORS ──
        $topDepositors = Deposit::select('user_id', DB::raw('SUM(amount) as total'), DB::raw('MAX(created_at) as last_deposit'))
            ->where('status','approved')
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('user')
            ->get();

        // ── TOP EARNERS ──
        $topEarners = Transactions::select('user_id', DB::raw('SUM(amount) as total'))
            ->where('type','earning')
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('user')
            ->get();

        // ── RECENT HIGH VALUE TRANSACTIONS ──
        $highValueDeposits = Deposit::with('user')
            ->where('status','approved')
            ->orderByDesc('amount')
            ->take(5)
            ->get()
            ->map(fn($d) => (object)[
                'ref'        => $d->tx_ref ?? ('DEP-'.str_pad($d->id,6,'0',STR_PAD_LEFT)),
                'user'       => $d->user->name ?? '—',
                'type'       => 'Deposit',
                'amount'     => $d->amount,
                'created_at' => $d->created_at,
            ]);

        $highValueWithdrawals = Withdrawal::with('user')
            ->where('status','approved')
            ->orderByDesc('amount')
            ->take(5)
            ->get()
            ->map(fn($w) => (object)[
                'ref'        => 'WDR-'.str_pad($w->id,6,'0',STR_PAD_LEFT),
                'user'       => $w->user->name ?? '—',
                'type'       => 'Withdrawal',
                'amount'     => $w->amount,
                'created_at' => $w->created_at,
            ]);

        $highValueTxns = $highValueDeposits->merge($highValueWithdrawals)
                                           ->sortByDesc('amount')
                                           ->take(6)
                                           ->values();

        // ── PLAN POPULARITY ──
        $planStats = Investment::select('package_id', DB::raw('COUNT(*) as count'), DB::raw('SUM(amount) as total'))
            ->groupBy('package_id')
            ->with('package')
            ->orderByDesc('total')
            ->get();

        return view('admin.reports', compact(
            'totalDeposits', 'totalWithdrawals', 'totalEarningsPaid',
            'totalInvested', 'netProfit', 'totalUsers', 'newUsersThisMonth',
            'activeInvestments', 'completedInvestments',
            'monthLabels', 'monthlyDeposits', 'monthlyWithdrawals',
            'monthlyEarnings', 'monthlyUsers',
            'topDepositors', 'topEarners', 'highValueTxns', 'planStats',
            'from', 'to'
        ));
    }
}
