<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::create(['name' => 'Super-Admin']);
        $permissions = Permission::all();
        $superadminRole->syncPermissions($permissions);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo('edit-officers');
        $adminRole->givePermissionTo('delete-officers');
        $adminRole->givePermissionTo('view-officers');
        $adminRole->givePermissionTo('create-officers');
        $adminRole->givePermissionTo('update-officers');

        $adminRole->givePermissionTo('view-complaints');
        $adminRole->givePermissionTo('update-complaints');
        $adminRole->givePermissionTo('edit-complaints');

        $adminRole->givePermissionTo('edit-investigations');
        $adminRole->givePermissionTo('view-investigations');
        $adminRole->givePermissionTo('create-investigations');
        $adminRole->givePermissionTo('update-investigations');
        $adminRole->givePermissionTo('delete-investigations');

        $officerRole = Role::create(['name' => 'Officer']);
        $officerRole->givePermissionTo('view-investigations');
        $officerRole->givePermissionTo('update-investigations');
        $officerRole->givePermissionTo('edit-investigations');
        $adminRole->givePermissionTo('view-complaints');

        $userRole = Role::create(['name' => 'User']);
        $userRole->givePermissionTo('edit-complaints');
        $userRole->givePermissionTo('view-complaints');
        $userRole->givePermissionTo('create-complaints');
        $userRole->givePermissionTo('update-complaints');
        $userRole->givePermissionTo('delete-complaints');
    }
}
