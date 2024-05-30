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
        Schema::create('item_carritos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->foreignId('carrito_id')->references('id')->on('carritos');
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_carritos');
    }
};
