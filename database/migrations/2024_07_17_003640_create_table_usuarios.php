<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre_usuario');
            $table->string('nombre_empresa')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('password')->default(bcrypt('password'));
            $table->rememberToken();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('usuarios');
    }
}
