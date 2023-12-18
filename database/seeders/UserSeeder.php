<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $superadminRole = Role::findByName('Super-Admin');
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin835'),
        ]);
        $user->assignRole($superadminRole);

        $adminRole = Role::findByName('Admin');
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin835'),
        ]);
        $user->assignRole($adminRole);

        $userRole = Role::findByName('Officer');
        $user = \App\Models\User::factory()->create([
            'name' => 'Officer User',
            'email' => 'officer@example.com',
            'password' => Hash::make('office835'),
        ]);
        $user->assignRole($userRole);

        $userRole = Role::findByName('User');
        $user = \App\Models\User::factory()->create([
            'name' => 'Public User',
            'email' => 'user@example.com',
            'password' => Hash::make('user835'),
        ]);
        $user->assignRole($userRole);
    }
}
