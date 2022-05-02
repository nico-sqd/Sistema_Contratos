<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permission_index',
            'permission_show',
            'permission_create',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_show',
            'role_create',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_show',
            'user_create',
            'user_edit',
            'user_destroy'
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);

        }
    }
}
