<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNomina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomina', function (Blueprint $table) {
            $table->id();
            $table->string('curp');
            $table->string('horas');
            $table->string('minutos');
            $table->double('total',10,3)->nullable();
            $table->double('imss',6,2)->nullable();
            $table->double('prima_v',6,2)->nullable();
            $table->double('festivos',6,2)->nullable();
            $table->double('descuentos',6,2)->nullable();
            $table->double('comida',6,2)->nullable();
            $table->double('prima_d',6,2)->nullable();
            $table->double('bonos',6,2)->nullable();
            $table->double('host',6,2)->nullable();
            $table->double('gasolina',6,2)->nullable();
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
        Schema::dropIfExists('nomina');
    }
}
