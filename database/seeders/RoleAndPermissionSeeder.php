<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin-home']);

        $adminRole = Role::create(['name' => 'Admin']);

        $adminRole -> givePermissionTo([
            'admin-home'
        ]);
    }
}
