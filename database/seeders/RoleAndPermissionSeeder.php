<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            ['name' => 'list-users'],
            ['name' => 'create-users'],
            ['name' => 'delete-users'],

            ['name' => 'change-role'],
            ['name' => 'list-role'],
            ['name' => 'create-role'],
            ['name' => 'edit-role'],
            ['name' => 'delete-role'],

            ['name' => 'list-permission'],
            ['name' => 'create-permission'],
            ['name' => 'edit-permission'],
            ['name' => 'delete-permission'],
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission['name']]);
        }

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $cashierRole = Role::create(['name' => 'cashier']);
        $meterReaderRole = Role::create(['name' => 'meter-reader']);
        $userRole = Role::create(['name' => 'user']);

        $superAdminRole->givePermissionTo(Permission::all());
        $adminRole->givePermissionTo('list-users', 'list-role', 'list-permission');
        $meterReaderRole->givePermissionTo('list-users');
        $cashierRole->givePermissionTo('list-users');
    }
}
