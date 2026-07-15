<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {

        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $cashier = Role::firstOrCreate([
            'name' => 'Cashier',
            'guard_name' => 'web',
        ]);

        // Admin mendapat semua permission
        $admin->syncPermissions(Permission::all());

        // Cashier mendapat permission tertentu
        $cashier->syncPermissions([
            'view dashboard',
            'view products',
            'create sales',
            'view own sales',
        ]);
    }
}