<?php

namespace Database\Seeders;

use App\Models\Empleados;
use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleados::create(['nombre' => 'Administradora Lorena','curp' => 'admin','rfc'=> 'N/A','nss' => '00','puesto' => 'Administracion', 
        'fecha_ingreso'=>'2000-01-01',  
        'fecha_nacimiento'=>'2000-01-01',  
        'fecha_2doContrato'=>'2000-01-01',  
        'fecha_3erContrato'=>'2000-01-01',  
        'fecha_indefinido'=>'2000-01-01', 'telefono' => '00','num_clinicaSS' => '00','salario_dia' => '00','password' => bcrypt('Littletokyo2024') ])->assignRole('admin');
    }
}
