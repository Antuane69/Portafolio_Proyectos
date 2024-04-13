<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('cocinero_lunes', 500)->nullable();
            $table->string('cocinero_martes', 500)->nullable();
            $table->string('cocinero_miercoles', 500)->nullable();
            $table->string('cocinero_jueves', 500)->nullable();
            $table->string('cocinero_viernes', 500)->nullable();
            $table->string('cocinero_sabado', 500)->nullable();
            $table->string('cocinero_domingo', 500)->nullable();
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
        Schema::dropIfExists('horarios');
    }
}
