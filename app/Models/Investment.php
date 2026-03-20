<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'amount',
        'daily_earning',
        'total_earned',
        'expected_return',
        'days_remaining',
        'ends_at',
        'status',
    ];

    protected $casts = [
        'ends_at'         => 'datetime',
        'amount'          => 'float',
        'daily_earning'   => 'float',
        'total_earned'    => 'float',
        'expected_return' => 'float',
    ];

    // ── Relationships ──
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    // ── Helpers ──
    public function perSecond(): float
    {
        return round($this->daily_earning / 24 / 3600, 8);
    }

    public function perMinute(): float
    {
        return round($this->daily_earning / 24 / 60, 8);
    }
}
