<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function update(): void
    {
        Schema::create('card', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coluna_id')->constrained()->cascadeOnDelete();
            $table->integer('posicao');
            $table->string('nome');
            $table->string('tipo');
            $table->string('tamanho');
            $table->text('descricao')->nullable();
            $table->integer('qntd');
            $table->integer('qntd_limite');
            $table->string('cor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');
    }
};
