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
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
      

        $admin->givePermissionTo([
            'view-role',
            'create-role',
            'edit-role',
            'delete-role',
            'view-user',
            'create-user',
            'edit-user',
            'delete-user'
        ]);

    }
}