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
        Schema::create('equipos_models', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('numero_equipo');
            $table->integer('capacidad_maxima')->default(5); // Capacidad máxima del equipo
            $table->integer('inscritos_actuales')->default(0); // Inscritos actualmente
            $table->foreignId('torneo_id')->constrained('torneos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos_models');
    }
};
