<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super-Admin
        $superAdmin = User::factory()->create([
            'role_id' => 1,
            'name' => 'Super-Admin Test',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
        $superAdmin->assignRole('super-admin');

        // Admin
        $admin = User::factory()->create([
            'role_id' => 2,
            'name' => 'Admin Test',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
        $admin->assignRole('admin');

        // Cashier
        $cashier = User::factory()->create([
            'role_id' => 3,
            'name' => 'Cashier Test',
            'email' => 'cashier@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
        $cashier->assignRole('cashier');

        // Meter-Reader
        $mReader = User::factory()->create([
            'role_id' => 4,
            'name' => 'Meter-Reader Test',
            'email' => 'mreader@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
        $mReader->assignRole('meter-reader');

        // User
        $user = User::factory()->create([
            'role_id' => 5,
            'name' => 'User Test',
            'email' => 'user@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
        $user->assignRole('user');
    }
}
