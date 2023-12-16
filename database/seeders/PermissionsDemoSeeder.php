<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminRole = Role::findByName('Admin');
        $adminRole->givePermissionTo('edit-users');
        $adminRole->givePermissionTo('delete-users');
        $adminRole->givePermissionTo('view-users');
        $adminRole->givePermissionTo('create-users');
        $adminRole->givePermissionTo('update-users');

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin835'),
        ]);
        $user->assignRole($adminRole);

        $superadminRole = Role::findByName('Super-Admin');
        $superadminRole->givePermissionTo('all');

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin835'),
        ]);
        $user->assignRole($superadminRole);
    }
}
