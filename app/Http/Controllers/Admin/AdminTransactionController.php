<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transactions;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
        $type   = $request->get('type', 'all');
        $status = $request->get('status', '');
        $search = $request->get('search', '');

        $rows = collect();

        // ── DEPOSITS ──
        if (in_array($type, ['all', 'deposit'])) {
            $q = Deposit::with('user')->latest();
            if ($search) $q->where(function($q) use ($search) {
                $q->where('tx_ref','like',"%{$search}%")
                  ->orWhere('amount','like',"%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name','like',"%{$search}%")->orWhere('email','like',"%{$search}%"));
            });
            if ($status) $q->where('status', $status);
            $rows = $rows->merge($q->get()->map(fn($d) => (object)[
                'id'          => $d->id,
                'row_type'    => 'deposit',
                'row_ref'     => $d->tx_ref ?? ('DEP-'.str_pad($d->id,6,'0',STR_PAD_LEFT)),
                'user'        => $d->user,
                'amount'      => $d->amount,
                'description' => 'Deposit via '.strtoupper($d->payment_method ?? '—'),
                'row_method'  => strtoupper($d->payment_method ?? '—'),
                'status'      => $d->status,
                'created_at'  => $d->created_at,
                'row_proof'   => $d->proof_of_payment ?? $d->proof_image ?? null,
            ]));
        }

        // ── WITHDRAWALS ──
        if (in_array($type, ['all', 'withdrawal'])) {
            $q = Withdrawal::with('user')->latest();
            if ($search) $q->where(function($q) use ($search) {
                $q->where('amount','like',"%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name','like',"%{$search}%")->orWhere('email','like',"%{$search}%"));
            });
            if ($status) $q->where('status', $status);
            $rows = $rows->merge($q->get()->map(fn($w) => (object)[
                'id'          => $w->id,
                'row_type'    => 'withdrawal',
                'row_ref'     => 'WDR-'.str_pad($w->id,6,'0',STR_PAD_LEFT),
                'user'        => $w->user,
                'amount'      => $w->amount,
                'description' => 'Withdrawal via '.strtoupper($w->payment_method ?? $w->wallet_type ?? '—'),
                'row_method'  => strtoupper($w->payment_method ?? $w->wallet_type ?? '—'),
                'status'      => $w->status,
                'created_at'  => $w->created_at,
                'row_proof'   => null,
            ]));
        }

        // ── EARNINGS + PLAN PURCHASES (from transactions table) ──
        if (in_array($type, ['all', 'earning', 'investment'])) {
            $q = Transactions::with('user')->latest();
            if ($type === 'earning')    $q->where('type','earning');
            if ($type === 'investment') $q->where('type','investment');
            if (in_array($type, ['all'])) $q->whereIn('type',['earning','investment']);
            if ($search) $q->where(function($q) use ($search) {
                $q->where('reference','like',"%{$search}%")
                  ->orWhere('description','like',"%{$search}%")
                  ->orWhere('amount','like',"%{$search}%")
                  ->orWhereHas('user', fn($u) => $u->where('name','like',"%{$search}%")->orWhere('email','like',"%{$search}%"));
            });
            if ($status) $q->where('status', $status);
            $rows = $rows->merge($q->get()->map(fn($t) => (object)[
                'id'          => $t->id,
                'row_type'    => $t->type,
                'row_ref'     => $t->reference ?? ('TXN-'.str_pad($t->id,6,'0',STR_PAD_LEFT)),
                'user'        => $t->user,
                'amount'      => $t->amount,
                'description' => $t->description ?? ucfirst($t->type),
                'row_method'  => '—',
                'status'      => $t->status ?? 'completed',
                'created_at'  => $t->created_at,
                'row_proof'   => null,
            ]));
        }

        $transactions = $rows->sortByDesc('created_at')->values();

        // ── STATS ──
        $totalTransactions = Deposit::count() + Withdrawal::count() + Transactions::count();
        $depositsToday     = Deposit::whereDate('created_at',today())->sum('amount');
        $withdrawalsToday  = Withdrawal::whereDate('created_at',today())->sum('amount');
        $earningsToday     = Transactions::where('type','earning')->whereDate('created_at',today())->sum('amount');
        $pendingCount      = Deposit::where('status','pending')->count() + Withdrawal::where('status','pending')->count();
        $totalEarningsPaid = Transactions::where('type','earning')->sum('amount');

        return view('admin.transactions', compact(
            'transactions','totalTransactions','depositsToday',
            'withdrawalsToday','earningsToday','pendingCount',
            'totalEarningsPaid','type','status','search'
        ));
    }
}
