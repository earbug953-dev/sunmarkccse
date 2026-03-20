<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

class EarningsTicked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public function __construct(
        public int   $userId,
        public int   $investmentId,
        public float $totalEarned,
        public float $perSecond
    ) {}

    public function broadcastOn(): array
    {
        // Private channel per user — only they receive it
        return [new PrivateChannel('earnings.' . $this->userId)];
    }

    public function broadcastAs(): string
    {
        return 'earnings.tick';
    }

    public function broadcastWith(): array
    {
        return [
            'investment_id' => $this->investmentId,
            'total_earned'  => $this->totalEarned,
            'per_second'    => $this->perSecond,
        ];
    }
}
