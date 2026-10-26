<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Transactions;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ── Active investments ──
        $activeInvestments = Investment::where('user_id', $user->id)
                                       ->where('status', 'active')
                                       ->with('package')
                                       ->latest('created_at')
                                       ->take(2)
                                       ->get();

        // ── Summary stats ──
        $totalDeposited = Deposit::where('user_id', $user->id)
                                 ->where('status', 'approved')
                                 ->sum('amount');

        $totalWithdrawn = Withdrawal::where('user_id', $user->id)
                                    ->where('status', 'completed')
                                    ->sum('amount');

        $totalEarnings = Transactions::where('user_id', $user->id)
                                    ->where('type', 'earning')
                                    ->sum('amount');

        // ── Recent transactions (last 6) ──
        $deposits = Deposit::where('user_id', $user->id)->latest()->take(3)->get()
            ->map(fn($d) => (object)[
                'type'       => 'deposit',
                'amount'     => $d->amount,
                'created_at' => $d->created_at,
            ]);

        $txns = Transactions::where('user_id', $user->id)->latest()->take(3)->get()
            ->map(fn($t) => (object)[
                'type'       => $t->type,
                'amount'     => $t->amount,
                'created_at' => $t->created_at,
            ]);

        $recentTxns = $deposits->merge($txns)
                               ->sortByDesc('created_at')
                               ->take(6)
                               ->values();

        // ── Chart: monthly deposits last 6 months ──
        $months = collect(range(5, 0))->map(fn($i) => now()->subMonths($i));

        $chartLabels = $months->map(fn($m) => $m->format('M'))->values();
        $chartData   = $months->map(fn($m) =>
            Deposit::where('user_id', $user->id)
                   ->where('status', 'approved')
                   ->whereYear('created_at',  $m->year)
                   ->whereMonth('created_at', $m->month)
                   ->sum('amount')
        )->values();

        return view('user.dashboard', compact(
            'user',
            'activeInvestments',
            'totalDeposited',
            'totalWithdrawn',
            'totalEarnings',
            'recentTxns',
            'chartLabels',
            'chartData'
        ));
    }
}
