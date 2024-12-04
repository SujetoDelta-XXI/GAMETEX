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
        Schema::create('equipo_torneo_fase_partida_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_id')->constrained('equipos_models')->onDelete('cascade');
            $table->foreignId('torneo_id')->constrained('torneos')->onDelete('cascade');
            $table->foreignId('fase_id')->constrained('fases_models')->onDelete('cascade');
            $table->foreignId('partida_id')->constrained('partidas_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_torneo_fase_partida_models');
    }
};
