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
        Schema::create('usuarios_has_recompensas', function (Blueprint $table) {
            $table->id();
            $table->boolean("estado")->default(false);
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('recompensa_id')->constrained('recompensas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
