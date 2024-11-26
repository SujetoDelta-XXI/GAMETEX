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
    {Schema::create('eventos_tipo', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('descripcion');
        $table->string('categoria');
        $table->string('reglas');
        $table->string('imagen')->nullable();  
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_tipo');
    }
};
