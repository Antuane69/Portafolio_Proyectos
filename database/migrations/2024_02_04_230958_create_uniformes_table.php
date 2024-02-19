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
            $table->date('fecha_solicitud');
            $table->string('tipo_uniforme');
            $table->string('codigo');
            $table->string('talla');
            $table->integer('cantidad');
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
