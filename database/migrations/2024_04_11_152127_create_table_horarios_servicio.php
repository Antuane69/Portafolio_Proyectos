<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHorariosServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_servicio', function (Blueprint $table) {
            $table->id();
            $table->string('servicio_lunes', 500)->nullable();
            $table->string('servicio_martes', 500)->nullable();
            $table->string('servicio_miercoles', 500)->nullable();
            $table->string('servicio_jueves', 500)->nullable();
            $table->string('servicio_viernes', 500)->nullable();
            $table->string('servicio_sabado', 500)->nullable();
            $table->string('servicio_domingo', 500)->nullable();
            $table->string('barra_lunes', 500)->nullable();
            $table->string('barra_martes', 500)->nullable();
            $table->string('barra_miercoles', 500)->nullable();
            $table->string('barra_jueves', 500)->nullable();
            $table->string('barra_viernes', 500)->nullable();
            $table->string('barra_sabado', 500)->nullable();
            $table->string('barra_domingo', 500)->nullable();
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
        Schema::dropIfExists('horarios_servicio');
    }
}