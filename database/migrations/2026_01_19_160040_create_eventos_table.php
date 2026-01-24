<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('site')->nullable();
            $table->text('descrição');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->string('localização');
            $table->integer('capacidade')->nullable();
            $table->string('imagem_capa')->nullable();
            $table->enum('categoria', ['musica', 'teatro', 'esportes', 'negocios', 'tecnologia', 'educacao']);
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->enum('status', ['ativo', 'encerrado'])->default('ativo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};