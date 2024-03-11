<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDocumentacionToEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('antecedentes')->nullable(); 
            $table->string('recomendacion')->nullable(); 
            $table->string('estudios')->nullable(); 
            $table->string('nacimiento')->nullable(); 
            $table->string('domicilio')->nullable(); 
            $table->string('ine')->nullable(); 
            $table->string('nomina')->nullable(); 
            $table->string('ine_trasera')->nullable(); 
            $table->string('ine_delantera')->nullable(); 
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
            $table->dropColumn('antecedentes');
            $table->dropColumn('recomendacion');
            $table->dropColumn('estudios');
            $table->dropColumn('nacimiento');
            $table->dropColumn('domicilio');
            $table->dropColumn('ine');
            $table->dropColumn('nomina');
            $table->dropColumn('ine_trasera');
            $table->dropColumn('ine_delantera');
        });
    }
}
