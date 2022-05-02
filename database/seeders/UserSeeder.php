<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'rut'=>'11111111-1',
            'password'=>bcrypt('admin12'),
        ]);

        $user->assignRole('SuperAdmin');
    }
}
