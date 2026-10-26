<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Transactions;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $type = $request->get('type', 'all');

        $rows = collect();

        // ── DEPOSITS ──
        if (in_array($type, ['all','deposit'])) {
            $rows = $rows->merge(
                Deposit::where('user_id', $user->id)->latest()->get()->map(fn($d) => (object)[
                    'ref'         => $d->tx_ref ?? ('DEP-'.str_pad($d->id,6,'0',STR_PAD_LEFT)),
                    'type'        => 'deposit',
                    'amount'      => $d->amount,
                    'description' => 'Deposit via '.strtoupper($d->payment_method ?? '—'),
                    'status'      => $d->status,
                    'created_at'  => $d->created_at,
                    'proof'       => $d->proof_of_payment ?? $d->proof_image ?? null,
                ])
            );
        }

        // ── WITHDRAWALS ──
        if (in_array($type, ['all','withdrawal'])) {
            $rows = $rows->merge(
                Withdrawal::where('user_id', $user->id)->latest()->get()->map(fn($w) => (object)[
                    'ref'         => 'WDR-'.str_pad($w->id,6,'0',STR_PAD_LEFT),
                    'type'        => 'withdrawal',
                    'amount'      => $w->amount,
                    'description' => 'Withdrawal via '.strtoupper($w->payment_method ?? $w->wallet_type ?? '—'),
                    'status'      => $w->status,
                    'created_at'  => $w->created_at,
                    'proof'       => null,
                ])
            );
        }

        // ── EARNINGS + PLAN PURCHASES ──
        if (in_array($type, ['all','earning','investment'])) {
            $q = Transactions::where('user_id', $user->id)->latest();
            if ($type === 'earning')    $q->where('type','earning');
            if ($type === 'investment') $q->where('type','investment');
            if ($type === 'all')        $q->whereIn('type',['earning','investment']);

            $rows = $rows->merge(
                $q->get()->map(fn($t) => (object)[
                    'ref'         => $t->reference ?? ('TXN-'.str_pad($t->id,6,'0',STR_PAD_LEFT)),
                    'type'        => $t->type,
                    'amount'      => $t->amount,
                    'description' => $t->description ?? ucfirst($t->type),
                    'status'      => $t->status ?? 'completed',
                    'created_at'  => $t->created_at,
                    'proof'       => null,
                ])
            );
        }

        $all = $rows->sortByDesc('created_at')->values();

        // ── STATS ──
        $totalDeposited = Deposit::where('user_id',$user->id)->where('status','approved')->sum('amount');
        $totalWithdrawn = Withdrawal::where('user_id',$user->id)->where('status','completed')->sum('amount');
        $totalEarnings  = Transactions::where('user_id',$user->id)->where('type','earning')->sum('amount');

        return view('user.transaction', compact('all','type','totalDeposited','totalWithdrawn','totalEarnings','user'));
    }
}
