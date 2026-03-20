<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Package;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    // ── Show packages page with all active investments ──
    public function packages()
    {
        $user = auth()->user();

        $packages = Package::where('active', true)
                           ->orderBy('min_investment', 'asc')
                           ->paginate(8);

        // Get ALL active investments for this user (not just one)
        $activeInvestments = Investment::where('user_id', $user->id)
                                       ->where('status', 'active')
                                       ->with('package')
                                       ->latest()
                                       ->get();

        return view('user.packages', compact('packages', 'user', 'activeInvestments'));
    }

    // ── Buy a plan — allows buying even with active plans ──
    public function invest(Request $request, Package $package)
    {
        $user = auth()->user();

        $rules = [
            'amount' => [
                'required',
                'numeric',
                'min:' . $package->min_investment,
            ],
        ];

        if ($package->max_investment) {
            $rules['amount'][] = 'max:' . $package->max_investment;
        }

        $request->validate($rules);

        $amount = (float) $request->amount;

        // Check balance
        if ($user->balance < $amount) {
            return back()->withErrors([
                'amount' => 'Insufficient balance. Please deposit funds first.'
            ]);
        }

        // Deduct from wallet
        $user->decrement('balance', $amount);

        // Create investment record
        Investment::create([
            'user_id'         => $user->id,
            'package_id'      => $package->id,
            'amount'          => $amount,
            'daily_earning'   => round($amount * ($package->daily_return / 100), 8),
            'total_earned'    => 0,   // starts at 0 — cron grows this
            'expected_return' => round($amount * (1 + $package->total_return / 100), 2),
            'days_remaining'  => $package->duration_days,
            'ends_at'         => now()->addDays($package->duration_days),
            'status'          => 'active',
        ]);

        return back()->with('success',
            '🎉 Successfully invested $' . number_format($amount, 2) .
            ' in ' . $package->name . '!'
        );
    }

    // ── Send pending earnings to wallet balance ──
    public function claimEarnings(Request $request)
    {
        $request->validate([
            'investment_id' => 'required|integer',
        ]);

        $investment = Investment::where('id', $request->investment_id)
                                ->where('user_id', auth()->id())
                                ->where('status', 'active')
                                ->firstOrFail();

        $amount = (float) $investment->total_earned;

        if ($amount <= 0) {
            return back()->with('warning',
                'No earnings to claim yet. Check back after the next credit.'
            );
        }

        // Move to wallet — same as how balance increases
        auth()->user()->increment('balance', $amount);

        // Reset pending earnings to 0
        $investment->update(['total_earned' => 0]);

        return back()->with('success',
            '💰 $' . number_format($amount, 4) . ' has been sent to your wallet!'
        );
    }
}
