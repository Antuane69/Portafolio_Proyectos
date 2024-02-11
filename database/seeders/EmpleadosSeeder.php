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
        // Empleados::create(['nombre' => 'Pedro de jesus Delgado Bermejo','curp' => 'DEBP030305HJCLRDA8','rfc'=> 'ABCD123456789','nss' => '123456789','puesto' => 'SERVICIO 12-6', 
        // 'fecha_ingreso'=>'2024-01-19',  
        // 'fecha_nacimiento'=>'2003-03-05',  
        // 'fecha_2doContrato'=>'2024-02-18',  
        // 'fecha_3erContrato'=>'2024-03-19',  
        // 'fecha_indefinido'=>'2024-04-18', 'telefono' => '1234567890','num_clinicaSS' => '00','salario_dia' => '00','password' => bcrypt('password') ]);

        Empleados::create(['nombre' => 'Administradora Lorena','curp' => 'admin','rfc'=> 'N/A','nss' => '00','puesto' => 'Administracion', 
        'fecha_ingreso'=>'2000-01-01',  
        'fecha_nacimiento'=>'2000-01-01',  
        'fecha_2doContrato'=>'2000-01-01',  
        'fecha_3erContrato'=>'2000-01-01',  
        'fecha_indefinido'=>'2000-01-01', 'telefono' => '00','num_clinicaSS' => '00','salario_dia' => '00','password' => bcrypt('Littletokyo2024') ])->assignRole('admin');
    }
}
