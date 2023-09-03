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
        Schema::create('produto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->string('nm_produto');
            $table->decimal('vl_compra', 10, 2);
            $table->decimal('vl_venda', 10, 2);
            $table->foreignId('id_produto_grupo')->constrained('produto_grupo','id_produto_grupo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
