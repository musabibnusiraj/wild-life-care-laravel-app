<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'update-users']);

        Permission::create(['name' => 'edit-complaints']);
        Permission::create(['name' => 'delete-complaints']);
        Permission::create(['name' => 'view-complaints']);
        Permission::create(['name' => 'create-complaints']);
        Permission::create(['name' => 'update-complaints']);

        Permission::create(['name' => 'edit-investigations']);
        Permission::create(['name' => 'delete-investigations']);
        Permission::create(['name' => 'view-investigations']);
        Permission::create(['name' => 'create-investigations']);
        Permission::create(['name' => 'update-investigations']);

        Permission::create(['name' => 'edit-officers']);
        Permission::create(['name' => 'delete-officers']);
        Permission::create(['name' => 'view-officers']);
        Permission::create(['name' => 'create-officers']);
        Permission::create(['name' => 'update-officers']);
    }
}
