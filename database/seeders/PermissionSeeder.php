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
            'index',
            'show',
            
            'super_index',
            'super_show',
            'super_create',
            'super_edit',
            'super_destroy',

            'admin_index',
            'admin_show',
            'admin_create',
            'admin_edit',
            'admin_destroy',

            'super',
            'admin', 
            'referente'
        ];

        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);

        }
    }
}
