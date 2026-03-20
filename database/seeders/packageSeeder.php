<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks so we can truncate safely
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('packages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $packages = [
            [
                'name'           => 'Starter',
                'min_investment' => 50,
                'max_investment' => 499,
                'daily_return'   => 3.00,
                'duration_days'  => 7,
                'total_return'   => 21.00,
                'description'    => 'Perfect for beginners. Low entry, steady daily returns.',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Silver',
                'min_investment' => 500,
                'max_investment' => 1999,
                'daily_return'   => 4.00,
                'duration_days'  => 7,
                'total_return'   => 28.00,
                'description'    => 'Great for growing investors. Higher daily returns.',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Gold',
                'min_investment' => 2000,
                'max_investment' => 9999,
                'daily_return'   => 5.00,
                'duration_days'  => 7,
                'total_return'   => 35.00,
                'description'    => 'Our most popular plan. Maximum short-term gains.',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'Platinum',
                'min_investment' => 10000,
                'max_investment' => 49999,
                'daily_return'   => 6.00,
                'duration_days'  => 7,
                'total_return'   => 42.00,
                'description'    => 'Premium returns for serious investors.',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => 'VIP',
                'min_investment' => 50000,
                'max_investment' => null,
                'daily_return'   => 7.00,
                'duration_days'  => 7,
                'total_return'   => 49.00,
                'description'    => 'Elite plan. Highest returns. No upper limit.',
                'active'         => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ];

        DB::table('packages')->insert($packages);

        $this->command->info('✅ 5 seven-day packages seeded successfully!');
        $this->command->table(
            ['Plan', 'Min', 'Max', 'Daily %', 'Days', 'Total %'],
            collect($packages)->map(fn($p) => [
                $p['name'],
                '$'.number_format($p['min_investment']),
                $p['max_investment'] ? '$'.number_format($p['max_investment']) : 'Unlimited',
                $p['daily_return'].'%',
                $p['duration_days'],
                $p['total_return'].'%',
            ])->toArray()
        );
    }
}
