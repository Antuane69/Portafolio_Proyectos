<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePivoteNomina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivote_nomina', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nomina');
            $table->string('curp');
            $table->float('uniforme',6,2);
            $table->boolean('exportado')->default(false);
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
        Schema::dropIfExists('pivote_nomina');
    }
}
