<?php

namespace App\Console\Commands;

use App\Models\Investment;
use Illuminate\Console\Command;

class CreditEarnings extends Command
{
    protected $signature   = 'investments:credit';
    protected $description = 'Adds per-minute earnings to every active investment';

    public function handle(): void
{
    $investments = Investment::where('status', 'active')
                             ->with('package')
                             ->get();

    if ($investments->isEmpty()) {
        $this->info('No active investments.');
        return;
    }

    foreach ($investments as $inv) {
        // Per-minute credit
        $perMinute = round($inv->daily_earning / 24 / 60, 8);
        $inv->increment('total_earned', $perMinute);

        // Recalculate days remaining based on real time — NOT cron runs
        $daysPassed      = (int) $inv->created_at->diffInDays(now());
        $newDaysRemaining = max(0, $inv->package->duration_days - $daysPassed);

        if ($newDaysRemaining !== $inv->days_remaining) {
            $inv->update(['days_remaining' => $newDaysRemaining]);
        }

        // Only mark complete if real end date has passed
        if (now()->gte($inv->ends_at) && $newDaysRemaining <= 0) {
            $inv->update([
                'status'         => 'completed',
                'days_remaining' => 0,
            ]);
            $this->info("Investment #{$inv->id} completed naturally.");
        }
    }

    $this->info('✅ Credited per-minute earnings to ' . $investments->count() . ' investment(s).');
}
}
