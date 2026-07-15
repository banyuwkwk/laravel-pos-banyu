<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@pos.test',
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole('Admin');

        $cashier = User::firstOrCreate(
            [
                'email' => 'cashier@pos.test',
            ],
            [
                'name' => 'Cashier',
                'password' => Hash::make('password'),
            ]
        );

        $cashier->assignRole('Cashier');
    }
}