<?php
use App\Console\Commands\CreditEarnings;
use App\Jobs\ProcessEarningsTick;
use Illuminate\Support\Facades\Schedule;

// Runs every minute — saves to DB + broadcasts
Schedule::job(new ProcessEarningsTick)->everyMinute();
// ============================================================
// routes/console.php
// This file already exists in your Laravel project.
// ADD these lines at the bottom of it.
// ============================================================

// Runs every minute — adds per-minute earning to every active investment's total_earned
Schedule::command(CreditEarnings::class)->everyMinute();
