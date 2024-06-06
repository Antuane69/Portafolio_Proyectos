<?php

namespace Database\Seeders;

use App\Models\NumTrabajo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleSeeder::class);
        // $this->call(EmpleadosSeeder::class);
        $this->call(NumTrabajoSeeder::class);
    }
}
