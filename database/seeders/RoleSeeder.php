<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::create(['name' => 'Super-Admin']);
        $superadminRole->givePermissionTo('all');

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('edit-officers');
        $adminRole->givePermissionTo('delete-officers');
        $adminRole->givePermissionTo('view-officers');
        $adminRole->givePermissionTo('create-officers');
        $adminRole->givePermissionTo('update-officers');

        $adminRole->givePermissionTo('edit-complaints');
        $adminRole->givePermissionTo('view-complaints');
        $adminRole->givePermissionTo('create-complaints');
        $adminRole->givePermissionTo('update-complaints');

        $adminRole->givePermissionTo('edit-investigations');
        $adminRole->givePermissionTo('view-investigations');
        $adminRole->givePermissionTo('create-investigations');
        $adminRole->givePermissionTo('update-investigations');

        $officerRole = Role::create(['name' => 'Officers']);
        $officerRole->givePermissionTo('edit-investigations');
        $officerRole->givePermissionTo('view-investigations');
        $officerRole->givePermissionTo('create-investigations');
        $officerRole->givePermissionTo('update-investigations');

        $userRole = Role::create(['name' => 'User']);
        $userRole->givePermissionTo('edit-complaints');
        $userRole->givePermissionTo('view-complaints');
        $userRole->givePermissionTo('create-complaints');
        $userRole->givePermissionTo('update-complaints');
        $userRole->givePermissionTo('delete-complaints');
    }
}
