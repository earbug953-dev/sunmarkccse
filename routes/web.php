<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/forex', function () {
    return view('Forex');
})->name('forex');
Route::get('/cryptos', function () {
    return view('Cryptos');
})->name('cryptos');
Route::get('/shares', function () {
    return view('Shares');
})->name('shares');
Route::get('/indices', function () {
    return view('Indices');
})->name('indices');
Route::get('/energies', function () {
    return view('Energies');
})->name('energies');
Route::get('/metals', function () {
    return view('Metals');
})->name('metals');
Route::get('/platform', function () {
    return view('Platform');
})->name('platform');
Route::get('/swaps', function () {
    return view('Swaps');
})->name('swaps');
Route::get('/spreads', function () {
    return view('Spreads');
})->name('spreads');
Route::get('/pamm', function () {
    return view('PAMM');
})->name('pamm');
Route::get('/why-us', function () {
    return view('Why-Us');
})->name('why-us');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/terms', function () {
    return view('Terms');
})->name('terms');
Route::get('/privacy-policy', function () {
    return view('Privacy-policy');
})->name('privacy-policy');
Route::get('/trade-certificate', function () {
    return view('trade-certificate');
})->name('trade-certificate');




Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/deposit', function () {
        return view('user.deposit');
    })->name('user.deposit');

    Route::get('/packages', [InvestmentController::class, 'packages'])
         ->name('user.packages');

    // Buy a plan
    Route::post('/invest/{package}', [InvestmentController::class, 'invest'])
         ->name('user.invest');

    // Send pending earnings to wallet
    Route::post('/earnings/claim', [InvestmentController::class, 'claimEarnings'])
         ->name('user.earnings.claim');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('user.transactions');
    Route::get('/withdraw', function () {
    $withdrawals = Withdrawal::where('user_id', auth()->id())
        ->latest()
        ->get();
    $user = auth()->user();

    return view('user.withdrawal', compact('withdrawals', 'user'));
})->name('user.withdraw');

    Route::post('/deposit/confirm', [DepositsController::class, 'confirm_deposit'])->name('user.deposit.confirm');

    Route::post('/withdraw', [WithdrawalController::class, 'request_withdrawal'])->name('user.withdraw.request');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, "index"])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, "users"])->name('admin.users');
    Route::get('/deposits', [AdminController::class, "deposits"])->name('admin.deposits');
    Route::get('/withdrawals', [AdminController::class, "withdrawals"])->name('admin.withdrawals');
    Route::get('/packages', [AdminController::class, "packages"])->name('admin.packages');
    Route::get('/transactions', [AdminController::class, "transactions"])->name('admin.transactions');
    Route::get('/reports', [AdminController::class, "reports"])->name('admin.reports');
    Route::get('/settings', [AdminController::class, "settings"])->name('admin.settings');


    Route::post('/packages/store', [PackagesController::class, "store"])->name('admin.packages.store');

    Route::put('/packages/update/{package}', [PackagesController::class, "update"])->name('admin.packages.update');

    Route::delete('/packages/destroy/{package}', [PackagesController::class, "destroy"])->name('admin.packages.destroy');

    Route::put('/settings/update', [SettingsController::class, "update_settings"])->name('admin.settings.update');

    Route::post('/deposits/approve/{deposit}', [DepositsController::class, 'approve_deposit'])->name('admin.deposits.approve');
    Route::post('/deposits/reject/{deposit}', [DepositsController::class, 'reject_deposit'])->name('admin.deposits.reject');

    Route::post('/withdrawals/cancel/{withdrawal}',
    [WithdrawalController::class, 'cancel_withdrawal'])
    ->name('admin.withdrawals.cancel');
    Route::post('/withdrawals/approve/{withdrawal}',
    [WithdrawalController::class, 'approve_withdrawal'])
    ->name('admin.withdrawal.approve');
});





Route::middleware('auth', 'verified')->group(function () {

});

require __DIR__.'/auth.php';
