<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            // $table->foreignID('user_id')->nullable()->constrained()->onDelete('cascade');
            // $table->foreignID('post_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('usertajeta_id');
            $table->unsignedBigInteger('usercuenta_id');
            $table->unsignedBigInteger('useroferta_id');
            $table->foreign('usertajeta_id')->references('user_id')->on('comprar')->onDelete('cascade');
            $table->foreign('usercuenta_id')->references('user_id')->on('comprarcuenta')->onDelete('cascade');
            $table->foreign('useroferta_id')->references('user_id')->on('compraroferta')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};