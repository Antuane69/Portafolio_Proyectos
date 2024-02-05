<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('curp');
            $table->string('rfc');
            $table->string('nss')->nullable();
            $table->string('puesto');
            $table->date('fecha_ingreso');
            $table->date('fecha_nacimiento');
            $table->date('fecha_2doContrato')->nullable();
            $table->date('fecha_3erContrato')->nullable();
            $table->date('fecha_indefinido')->nullable();
            $table->bigInteger('telefono')->nullable();
            $table->Integer('num_clinicaSS')->nullable();
            $table->double('salario_dia',7,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
