<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bajas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('curp');
            $table->string('nss')->nullable();
            $table->string('puesto');
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->date('fecha_baja');
            $table->string('antiguedad');
            $table->string('causa_baja');
            $table->string('tiempo_anticipacion');
            $table->string('telefono');
            $table->Integer('num_clinicaSS')->nullable();
            $table->integer('total_bajas')->nullable();
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
        Schema::dropIfExists('bajas');
    }
}
