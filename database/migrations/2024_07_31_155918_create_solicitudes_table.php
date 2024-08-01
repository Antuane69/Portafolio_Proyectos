<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('adaptable');
            $table->string('archivos');
            $table->string('commerce');
            $table->string('pagos');
            $table->string('servidor');
            $table->string('usuarios');
            $table->string('requerimientos',400);
            $table->string('nombre_usuario');
            $table->string('estatus')->default('Sin Atender');
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
        Schema::dropIfExists('solicitudes');
    }
}
