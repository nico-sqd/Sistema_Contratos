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
        DB::table('tipo_moneda')->insert([
            'Nombre_tipo'=>'EUR'
        ]);
        DB::table('tipo_moneda')->insert([
            'Nombre_tipo'=>'UTM'
        ]);
        DB::table('modalidad')->insert([
            'nombre_modalidad'=>'Licitacion Publica',
            'abreviacion_modalidad'=>'LP'
        ]);
        DB::table('modalidad')->insert([
            'nombre_modalidad'=>'Trato Directo',
            'abreviacion_modalidad'=>'TD'
        ]);
        DB::table('modalidad')->insert([
            'nombre_modalidad'=>'Gran Compra',
            'abreviacion_modalidad'=>'GC'
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
        DB::table('boletagarantia')->insert([
            'documentos_garantia'=>'Otro'
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
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Vigente',
        ]);
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Modificado',
        ]);
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Termino Anticipado',
        ]);
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Terminado',
        ]);
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Cerrado',
        ]);
        DB::table('estadocontrato')->insert([
            'estado_contrato'=>'Fin Presupuesto',
        ]);
        DB::table('estadopagomulta')->insert([
            'estado_pago'=>'Pendiente',
        ]);
        DB::table('estadopagomulta')->insert([
            'estado_pago'=>'Cobrado',
        ]);
        DB::table('estadopagomulta')->insert([
            'estado_pago'=>'Pago Proveedor',
        ]);
        DB::table('estadopagomulta')->insert([
            'estado_pago'=>'Cobrado desde Garantía',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'En Notificación',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'En Revisión de Descargos',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'Resolución Solicitada',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'Resolución Emitida',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'En Revisión Recurso de Reposición',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'Resolución Recurso de Reposición',
        ]);
        DB::table('estadotramitemulta')->insert([
            'estado_tramite'=>'Multa Pagada',
        ]);
        $unidades = ['Arriendo Analizador Hormonas',
        'Arriendo Analizador VHS',
        'Arriendo Mensual',
        'Cantidad Eco Abd',
        'Cantidad Eco Mamaria',
        'Cantidad Equipos',
        'Cantidad Exámenes',
        'Cantidad Funcionarios',
        'Cantidad Impresiones B y N',
        'Cantidad Impresiones Color'
        ,'Cantidad Informes Rx'
        ,'Cantidad Informes Rx Urgentes'
        ,'Cantidad Licencias FULL'
        ,'Cantidad Licencias MIXTA'
        ,'Cantidad Licencias Software'
        ,'Cantidad Licencias Software Comunitarias'
        ,'Cantidad Licencias Software APS'
        ,'Cantidad Matriculas'
        ,'Cantidad Mensualidades'
        ,'Cantidad Prueba Hidrostática'
        ,'Cantidad Transmisiones ECG'
        ,'Cantidad Transmisiones ECG Urgentes'
        ,'Días Arriendo'
        ,'Días Hábiles'
        ,'Días Hogar Protegido'
        ,'Días Rehabilitación'
        ,'Días Residencia Protegida'
        ,'Flete Cilindros'
        ,'Horas D/Ciudad'
        ,'Horas Extras'
        ,'Horas F/Ciudad'
        ,'Informe Fondo de Ojos'
        ,'Inspección Extintores'
        ,'Kg Residuos Especiales'
        ,'Kg Residuos Peligrosos'
        ,'Litros Combustible'
        ,'Mantención'
        ,'Mantención Extintores'
        ,'Mantención Correctiva Aire Acondicionado'
        ,'Mantención Correctiva Ascensor'
        ,'Mantención Correctiva Caldera'
        ,'Mantención Correctiva Calefacción Central'
        ,'Mantención Correctiva Chiller'
        ,'Mantención Correctiva Desfibriladores'
        ,'Mantención Correctiva Emergencia o Extraordinaria'
        ,'Mantención Correctiva Equipo Calefacción'
        ,'Mantención Correctiva Equipos Críticos'
        ,'Mantención Correctiva Equipos Imagenología'
        ,'Mantención Correctiva Grupo Electrógeno'
        ,'Mantención Correctiva Lavandería'
        ,'Mantención Correctiva Monitores Signos Vitales'
        ,'Mantención Correctiva Salas Térmicas'
        ,'Mantención Correctiva Tableros Eléctricos'
        ,'Mantención Correctiva Vehículo'
        ,'Mantención Correctiva Ventiladores Mecánicos'
        ,'Mantención Preventiva Aire Acondicionado'
        ,'Mantención Preventiva Alcantarillado'
        ,'Mantención Preventiva Ascensor'
        ,'Mantención Preventiva Caldera'
        ,'Mantención Preventiva Calefacción Central'
        ,'Mantención Preventiva Chiller'
        ,'Mantención Preventiva Desfibriladores'
        ,'Mantención Preventiva Equipo Calefacción'
        ,'Mantención Preventiva Equipos Críticos'
        ,'Mantención Preventiva Equipos Imagenología'
        ,'Mantención Preventiva Grupo Electrógeno'
        ,'Mantención Preventiva Lavandería'
        ,'Mantención Preventiva Monitores Signos Vitales'
        ,'Mantención Preventiva Salas Térmicas'
        ,'Mantención Preventiva Tableros Eléctricos'
        ,'Mantención Preventiva Vehículo'
        ,'Mantención Preventiva Ventiladores Mecánicos'
        ,'Mantención Red UMAS '
        ,'Mantención Reparativa Vehiculo'
        ,'Metros Cúbicos Chips'
        ,'Metros Cúbicos Leña'
        ,'N° Almuerzo'
        ,'N° Cenas'
        ,'N° Colaciones'
        ,'N° Cotización'
        ,'N° Cuota Arriendo'
        ,'N° Cuota Compra Equipo'
        ,'N° Cuota Seguro'
        ,'N° Desayunos'
        ,'N° Etapa'
        ,'N° Mantención'
        ,'N° Mantención Correctiva Autoclave'
        ,'N° Mantención Correctiva Cuna Procedimiento'
        ,'N° Mantención Correctiva Ecógrafo'
        ,'N° Mantención Correctiva Equipo Rx Dental'
        ,'N° Mantención Correctiva Equipo Rx Osteopulmonar'
        ,'N° Mantención Correctiva Incubadora'
        ,'N° Mantención Correctiva Unidad Dental'
        ,'N° Mantención Preventica Autoclave'
        ,'N° Mantención Preventica Equipo Rx Dental'
        ,'N° Mantención Preventica Equipo Rx Osteopulmonar'
        ,'N° Mantención Preventica Unidad Dental'
        ,'N° Mantención Preventiva Cuna Procedimiento'
        ,'N° Mantención Preventiva Ecógrafo'
        ,'N° Mantención Preventiva Incubadora'
        ];

        $unidades2 = ['N° OT'
        ,'Días Paciente AVI C/TENS'
        ,'Días Paciente AVI S/TENS'
        ,'Días Paciente AVIA L-V'
        ,'Días Paciente AVIA L-D'
        ,'Días Paciente AVNI C/TENS'
        ,'Días Paciente AVNI S/TENS'
        ,'Días Paciente AVNIA L-V'
        ,'Días Paciente AVNIA L-D'
        ,'N° Pacientes GES'
        ,'N° Pacientes NO GES'
        ,'N° Pre-Factura'
        ,'N° Tarjetas'
        ,'Valor Mensual'
        ,'Recarga Cilindros 0,4m3'
        ,'Recarga Cilindros 0,7m3'
        ,'Recarga Cilindros 10m3'
        ,'Recarga Cilindros 6m3'
        ,'Recarga Cilindros Particulares'
        ,'Recarga Extintores'
        ,'Retiro m3 Aguas Servidas'
        ,'Retiro m3 Alcantarillado'
        ,'Retiro m3 Grasas'
        ,'Servicio Aseo Parcial'
        ,'Servicio Aseo Completo'
        ,'Servicio Bombeo Agua'
        ,'Servicio Destape Ducto y Alcantarillado'
        ,'Servicio Mantención Software RRHH'
        ,'Servicio Monitoreo Agua'
        ,'Servicio Soporte Software RRHH'
        ,'Unidades Andador 2 Ruedas'
        ,'Unidades Andador 4 Ruedas'
        ,'Unidades Andador S/Ruedas'
        ,'Unidades Bastón Codera Fija'
        ,'Unidades Bastón Codera Móvil'
        ,'Unidades Bastón Simple'
        ,'Unidades Bata Desechable'
        ,'Unidades Cinta Glicemia'
        ,'Unidades Cojín Antiescaras'
        ,'Unidades Colchón Antiescaras'
        ,'Unidades Equipo de Glicemia'
        ,'Unidades Equipos en Arriendo'
        ,'Unidades Guantes Nitrilo L'
        ,'Unidades Guantes Nitrilo M'
        ,'Unidades Guantes Nitrilo S'
        ,'Unidades Kit Colon Check N/Usuarios'
        ,'Unidades Kit Colon Check Seguimiento'
        ,'Unidades Kit Test VPH'
        ,'Unidades Lancetas'
        ,'Unidad'
        ,'Unidades Silla Ruedas Bariátricas'
        ,'Unidades Silla Ruedas Estándar'
        ,'Unidades Silla Ruedas Traumatológicas'
        ,'Valor Horas Hombre'
        ,'Valor Kilometros'
        ,'Valor Pasajero'];

        //dd(count($unidades));
        $contadorunidades = count($unidades);
        $contadorunidades2 = count($unidades2);

        for ($i = 0; $i <= $contadorunidades-1; $i++){
            DB::table('unidadesmedidas')->insert([
                'unidad'=>$unidades[$i],
            ]);
        }

        for ($i = 0; $i <= $contadorunidades2-1; $i++){
            DB::table('unidadesmedidas2')->insert([
                'unidad'=>$unidades2[$i],
            ]);
        }


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
