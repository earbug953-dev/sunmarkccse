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

        $count = 0;

        foreach ($investments as $inv) {
            // Per-minute amount = daily_earning ÷ 24 hours ÷ 60 minutes
            $perMinute = round($inv->daily_earning / 24 / 60, 8);

            // ADD to total_earned — this is what grows in the DB
            $inv->increment('total_earned', $perMinute);

            $count++;

            // Mark as completed if plan has expired
            if (now()->gte($inv->ends_at)) {
                $inv->update([
                    'status'         => 'completed',
                    'days_remaining' => 0,
                ]);
                $this->info("Investment #{$inv->id} ({$inv->package->name}) completed.");
            } else {
                // Update days_remaining once per day (when a full day has passed)
                $daysPassed = (int) $inv->created_at->diffInDays(now());
                $newDaysRemaining = max(0, $inv->package->duration_days - $daysPassed);
                if ($newDaysRemaining !== $inv->days_remaining) {
                    $inv->update(['days_remaining' => $newDaysRemaining]);
                }
            }
        }

        $this->info("✅ Credited per-minute earnings to {$count} investment(s).");
    }
}
