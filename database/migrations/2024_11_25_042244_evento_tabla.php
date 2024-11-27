<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_inicio')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->timestamp('fecha_fin')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('evento_tipo_id')->constrained('eventos_tipo')->onDelete('cascade');
            $table->foreignId('recompensa_tipo_id')->constrained('recompensas_tipo')->onDelete('cascade');
            $table->foreignId('moderador_id')->constrained('moders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};