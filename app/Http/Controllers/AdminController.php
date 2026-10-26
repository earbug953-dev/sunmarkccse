<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Investment;
use App\Models\Package;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = auth()->user();
        $deposit = Deposit::totalDeposits();
        $investments = Investment::with(['user', 'package'])
                             ->latest()
                             ->get();
        return view('admin.dashboard', compact('user', 'deposit','investments'));
    }

    public function users() {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function deposits()
    {
        $deposits = Deposit::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })
            ->latest()
            ->paginate(10);

        return view('admin.deposits', compact('deposits'));
    }

    public function withdrawals() {
        $withdrawals = Withdrawal::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })
            ->latest()
            ->paginate(10);
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function packages()
{
    $packages = Package::orderBy('min_investment')->paginate(10);

    // All investments with user + package loaded
    $investments = Investment::with(['user', 'package'])
                             ->latest()
                             ->get();

    return view('admin.packages', compact('packages', 'investments'));
}

    public function transactions() {
        $transactions = Auth::user()->transactions()->latest()->get();
        return view('admin.transactions', compact('transactions'));
    }

    public function reports() {
        return view('admin.reports');
    }


}
