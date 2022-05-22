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
        DB::table('tipo_moneda')->insert([
            'Nombre_tipo'=>'CLP'
        ]);
        DB::table('tipo_moneda')->insert([
            'Nombre_tipo'=>'USD'
        ]);
        DB::table('tipo_moneda')->insert([
            'Nombre_tipo'=>'UF'
        ]);
        DB::table('modalidad')->insert([
            'nombre_modalidad'=>'Licitacion Publica',
            'abreviacion_modalidad'=>'LP'
        ]);
        DB::table('boletagarantia')->insert([
            'documentos_garantia'=>'Boleta Garantía'
        ]);
        DB::table('boletagarantia')->insert([
            'documentos_garantia'=>'Vale Vista'
        ]);
        DB::table('boletagarantia')->insert([
            'documentos_garantia'=>'Póliza de Garantía'
        ]);
        DB::table('boletagarantia')->insert([
            'documentos_garantia'=>'Certificado de Fianza'
        ]);
        DB::table('subdirecciones')->insert([
            'nombre_subdireccion'=>'Subdirección Administrativa',
            'id_establecimiento'=>'1'
        ]);
        DB::table('subdirecciones')->insert([
            'nombre_subdireccion'=>'Subdireccion de Gestión y Desarrollo de las Personas',
            'id_establecimiento'=>'1'
        ]);
        DB::table('subdirecciones')->insert([
            'nombre_subdireccion'=>'Subdireccion de Gestión Asistencial',
            'id_establecimiento'=>'1'
        ]);
        DB::table('subdirecciones')->insert([
            'nombre_subdireccion'=>'Ninguno',
            'id_establecimiento'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Articulación de la Red Asistencial',
            'codigo_sso'=>'B.3',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Atención Primaria',
            'codigo_sso'=>'B.4',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Estadísticas e información de Salud',
            'codigo_sso'=>'B.6',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Planificación y Análisis',
            'codigo_sso'=>'B.5',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Gestión de Producción',
            'codigo_sso'=>'B.1',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Calidad y Seguridad del Paciente',
            'codigo_sso'=>'B.2',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Salud Mental',
            'codigo_sso'=>'B.8',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Salud Digital',
            'codigo_sso'=>'B.7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Gestión de las Personas',
            'codigo_sso'=>'D.1',
            'id_subdireccion'=>'2'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Calidad de Vida',
            'codigo_sso'=>'D.2',
            'id_subdireccion'=>'2'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Capacitación, Formación Continua y RAD',
            'codigo_sso'=>'D.3',
            'id_subdireccion'=>'2'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Planificación RHS.',
            'codigo_sso'=>'D.4',
            'id_subdireccion'=>'2'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Desarrollo Organizacional',
            'codigo_sso'=>'D.5',
            'id_subdireccion'=>'2'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Depto. de Finanzas',
            'codigo_sso'=>'C.1',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Recursos Físicos',
            'codigo_sso'=>'C.2',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Proyectos',
            'codigo_sso'=>'C.3',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Tecnologías de la Información y Comunicaciones',
            'codigo_sso'=>'C.4',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Abastecimiento y Operaciones',
            'codigo_sso'=>'C.5',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Ingeniería Clínica',
            'codigo_sso'=>'C.6',
            'id_subdireccion'=>'1'
        ]);
        DB::table('departamentos')->insert([
            'nombre_departamento'=>'Ninguno',
            'codigo_sso'=>'NN',
            'id_subdireccion'=>'4'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'KUMELEN',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'NEWEN',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'AYEKAN',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'PEULLA',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'COSAM ORIENTE',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'COSAM RAHUE',
            'id_departamento'=>'7',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'PRAIS',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'SAMU',
            'id_subdireccion'=>'3'
        ]);
        DB::table('dispositivos')->insert([
            'nombre_dispositivo'=>'Ninguno',
            'id_subdireccion'=>'4'
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
