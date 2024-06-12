<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsContratoToEmpleado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('civil')->nullable();
            $table->string('sexo')->nullable();
            $table->string('descanso')->nullable();
            $table->float('quincena',7,3)->nullable();
            $table->string('domicilio_contrato')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn('civil');
            $table->dropColumn('sexo');
            $table->dropColumn('descanso');
            $table->dropColumn('quincena');
            $table->dropColumn('domicilio_contrato');
        });
    }
}
