<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncapacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incapacidad', function (Blueprint $table) {
            $table->id();
            $table->string('curp');
            $table->date('fecha_inicio');
            $table->date('fecha_regreso');
            $table->integer('dias_totales');
            $table->string('motivo');
            $table->string('comentarios')->nullable();       
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
        Schema::dropIfExists('incapacidad');
    }
}
