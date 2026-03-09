<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
    ['email' => 'support@sunhill.com'],   // ← usually email is unique identifier
    [
        'name'     => 'SUNHILL Trading',
        'email'    => 'support@sunhill.com',
        'phone'    => '12345678121',           // ← was missing 9 ?
        'username' => 'tesla_admin',      // ← lowercase + fixed
        'country'  => 'USA',
        'password' => Hash::make('12345678'),
        'role'     => 'admin',
    ]
);
    }
}
