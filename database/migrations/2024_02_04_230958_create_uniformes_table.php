<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniformesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uniformes', function (Blueprint $table) {
            $table->id();
            $table->string('curp');
            $table->date('fecha_registro');
            $table->string('nueva_existencia');
            $table->string('entrada')->nullable();
            $table->string('usados')->nullable();
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('salida');
            $table->string('talla');
            $table->double('precio',6,2);
            $table->double('total',6,2);
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
        Schema::dropIfExists('uniformes');
    }
}
