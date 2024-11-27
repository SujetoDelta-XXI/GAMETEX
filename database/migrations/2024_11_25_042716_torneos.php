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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->decimal('entrada',4,2);
            $table->string('exp');
            $table->string('descripcion');
            $table->string('imagen')->nullable();  
            $table->foreignId('torneo_juego_id')->constrained('torneos_juegos')->onDelete('cascade');
            $table->foreignId('recompensas_id')->constrained('recompensas_tipo')->onDelete('cascade');
            $table->foreignId('moderador_id')->constrained('moders')->onDelete('cascade');
            $table->foreignId('administrador_id')->constrained('admins')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
