<?php

namespace Database\Seeders;

use App\Models\NumTrabajo;
use Illuminate\Database\Seeder;

class NumTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NumTrabajo::create(['numero' => '1','nombre' => 'Luis']);
        NumTrabajo::create(['numero' => '2','nombre' => 'Hannia Tovar']);
        NumTrabajo::create(['numero' => '3','nombre' => 'Yolanda Eloisa']);
        NumTrabajo::create(['numero' => '4','nombre' => 'Ruben']);
        NumTrabajo::create(['numero' => '5','nombre' => 'Kristian Daniel']);
        NumTrabajo::create(['numero' => '7','nombre' => 'Ana Paula']);
        NumTrabajo::create(['numero' => '8','nombre' => 'Jazael']);
        NumTrabajo::create(['numero' => '9','nombre' => 'Roberto']);
        NumTrabajo::create(['numero' => '10','nombre' => 'Hector Antonio']);
        NumTrabajo::create(['numero' => '11','nombre' => 'Nayeli Xiadana']);
        NumTrabajo::create(['numero' => '12','nombre' => 'Adalberto Navarro']);
        NumTrabajo::create(['numero' => '13','nombre' => 'Diego Isaid']);
        NumTrabajo::create(['numero' => '14','nombre' => 'Luis Javier']);
        NumTrabajo::create(['numero' => '15','nombre' => 'Gael']);
        NumTrabajo::create(['numero' => '16','nombre' => 'Jorge']);
        NumTrabajo::create(['numero' => '18','nombre' => 'Angel Daniel']);
        NumTrabajo::create(['numero' => '19','nombre' => 'Alan']);
        NumTrabajo::create(['numero' => '20','nombre' => 'Alex']);
        NumTrabajo::create(['numero' => '21','nombre' => 'Hanna Yael']);
        NumTrabajo::create(['numero' => '22','nombre' => 'Cesar Alejandro Cruz']);
        NumTrabajo::create(['numero' => '23','nombre' => 'Pedro de Jesus']);
        NumTrabajo::create(['numero' => '31','nombre' => 'Cesar Alejandro Ramirez']);
        NumTrabajo::create(['numero' => '32','nombre' => 'Zaira Lizeth']);
        NumTrabajo::create(['numero' => '35','nombre' => 'Juan Carlos']);
        NumTrabajo::create(['numero' => '41','nombre' => 'Roberto Rodriguez']);
        NumTrabajo::create(['numero' => '43','nombre' => 'Juan Jose Diaz']);
        NumTrabajo::create(['numero' => '45','nombre' => 'Leonardo Jahir']);
    }
}
