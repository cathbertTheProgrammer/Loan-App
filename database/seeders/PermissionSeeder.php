<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            'view-user',
            'create-user',
            'edit-user',
            'delete-user'
         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}