<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display all transactions for the authenticated user
     */
    public function index()
    {
        $user = auth()->user();

        // Get all transactions ordered by latest first
        $transactions = $user->transactions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.transaction', compact('transactions'));
    }

    /**
     * Display only deposit transactions
     */
    public function deposits()
    {
        $user = auth()->user();

        // Get only deposit transactions
        $transactions = $user->transactions()
            ->where('type', 'deposit')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.transaction', compact('transactions'));
    }

    /**
     * Display only withdrawal transactions
     */
    public function withdrawals()
    {
        $user = auth()->user();

        // Get only withdrawal transactions
        $transactions = $user->transactions()
            ->where('type', 'withdrawal')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.transaction', compact('transactions'));
    }

    /**
     * Show transaction details
     */
    public function show($id)
    {
        $transaction = Transactions::findOrFail($id);

        // Make sure user can only view their own transactions
        if ($transaction->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('user.transaction', compact('transaction'));
    }

    /**
     * Get transaction statistics
     */
    public function statistics()
    {
        $user = auth()->user();

        $totalDeposits = $user->transactions()
            ->where('type', 'deposit')
            ->where('status', 'completed')
            ->sum('amount');

        $totalWithdrawals = $user->transactions()
            ->where('type', 'withdrawal')
            ->where('status', 'completed')
            ->sum('amount');

        $pendingTransactions = $user->transactions()
            ->where('status', 'pending')
            ->count();

        $failedTransactions = $user->transactions()
            ->where('status', 'failed')
            ->count();

        return view('user.transaction', compact(
            'totalDeposits',
            'totalWithdrawals',
            'pendingTransactions',
            'failedTransactions'
        ));
    }
}
