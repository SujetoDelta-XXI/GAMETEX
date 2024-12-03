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
        Schema::table('torneos_has_usuarios', function (Blueprint $table) {
            $table->foreignId('equipo_id')->nullable()->constrained('equipos_models')->onDelete('cascade'); // Relación con equipos
            $table->enum('rol', ['jugador', '   apitan', 'entrenador'])->default('jugador'); // Rol del usuario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('torneos_has_usuarios', function (Blueprint $table) {
            $table->dropForeign(['equipo_id']); // Eliminar la clave foránea
            $table->dropColumn('equipo_id'); // Eliminar el campo equipo_id
            $table->dropColumn('rol'); // Eliminar el campo rol
        });
    }
};
