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
            $table->string('nombre')->nullable();
            $table->string('curp')->nullable();
            $table->string('nss')->nullable();
            $table->string('puesto')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('antiguedad')->nullable();
            $table->string('causa');
            $table->string('anticipacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('imagen_perfil')->nullable();
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
