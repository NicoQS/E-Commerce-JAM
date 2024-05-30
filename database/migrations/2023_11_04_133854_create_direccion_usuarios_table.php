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
        Schema::create('direccion_usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('direccion_1');
            $table->string('direccion_2')->nullable();
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal');
            $table->foreignId('usuario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccion_usuarios');
    }
};
