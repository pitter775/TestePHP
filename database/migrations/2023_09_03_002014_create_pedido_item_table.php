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
        Schema::create('pedido_item', function (Blueprint $table) {
            $table->id('id_pedido_item');
            $table->integer('qt_produto');
            $table->foreignId('id_produto')->constrained('produto','id_produto');
            $table->foreignId('id_pedido')->constrained('pedido','id_pedido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_item');
    }
};
