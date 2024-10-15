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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table ->text('descrição');
            $table->double('preco',10,2);
            $table->string('imagem');
            $table -> unsignedBigInteger('id_user');
            $table-> foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table -> unsignedBigInteger('id_produto');
            $table-> foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
