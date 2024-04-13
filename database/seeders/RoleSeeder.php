<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleCoordinador = Role::create(['name' => 'coordinador']);
        // $roleSuper = Role::create(['name'=> 'supervisor']);
        // $roleDir = Role::create(['name'=> 'Director']);
        //$roleUser = Role::create(['name' => 'usuario']);
        
    }
}
