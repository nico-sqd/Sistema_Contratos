<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Servicio Salud Osorno',
            'abreviacion'=>'DSSO',
            'codigo_deis'=>'123010'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Base San José Osorno',
            'abreviacion'=>'HBSJO',
            'codigo_deis'=>'123100'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Futa Sruka Lawenche Kunko Mapu Mo',
            'abreviacion'=>'HFSLKMM',
            'codigo_deis'=>'123104'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Purranque',
            'abreviacion'=>'HPU',
            'codigo_deis'=>'123101'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Pu Mülen Quilacahuín',
            'abreviacion'=>'HPMQ',
            'codigo_deis'=>'123105'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Puerto Octay',
            'abreviacion'=>'HPO',
            'codigo_deis'=>'123103'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Hospital Río Negro',
            'abreviacion'=>'HRN',
            'codigo_deis'=>'123102'
        ]);
        DB::table('establecimiento')->insert([
            'establecimiento'=>'Ninguno',
            'abreviacion'=>'NN',
            'codigo_deis'=>'1'
        ]);
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'rut'=>'12345678-9',
            'establecimiento'=>'1',
            'password'=>bcrypt('admin12'),
        ]);

        $user->assignRole('SuperAdmin');
    }
}
