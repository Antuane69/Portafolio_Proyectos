<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActaRealizadaToFaltas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faltas', function (Blueprint $table) {
            $table->string('acta_realizada')->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faltas', function (Blueprint $table) {
            $table->dropColumn('acta_realizada');
        });
    }
}
