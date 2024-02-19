<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStockUniformes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_uniformes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_solicitud');
            $table->integer('nuevos_existencia')->nullable();
            $table->integer('usados_existencia')->nullable();
            $table->string('nuevos_codigo')->nullable();
            $table->string('usados_codigo')->nullable();
            $table->string('nuevos_talla')->nullable();
            $table->string('usados_talla')->nullable();
            $table->double('nuevos_precio',6,2)->nullable();
            $table->double('usados_precio',6,2)->nullable();
            $table->string('nuevos_descripcion')->nullable();
            $table->string('usados_descripcion')->nullable();
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
        Schema::dropIfExists('stock_uniformes');
    }
}
