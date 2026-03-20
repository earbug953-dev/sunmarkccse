<?php

namespace App\Jobs;

use App\Events\EarningsTicked;
use App\Models\Investment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessEarningsTick implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function handle(): void
    {
        $investments = Investment::where('status', 'active')
                                 ->with('package')
                                 ->get();

        foreach ($investments as $inv) {
            $perSecond = round($inv->daily_earning / 24 / 3600, 8);

            // Save to DB
            $inv->increment('total_earned', $perSecond);

            // Check if plan expired
            if (now()->gte($inv->ends_at)) {
                $inv->update(['status' => 'completed', 'days_remaining' => 0]);
                continue;
            }

            // Broadcast to user's private channel
            broadcast(new EarningsTicked(
                userId:       $inv->user_id,
                investmentId: $inv->id,
                totalEarned:  (float) $inv->fresh()->total_earned,
                perSecond:    $perSecond
            ));
        }
    }
}
