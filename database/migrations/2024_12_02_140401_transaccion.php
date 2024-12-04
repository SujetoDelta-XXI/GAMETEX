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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('torneo_id')->constrained('torneos');
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->timestamp('transaccion_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('cliente_email');
            $table->enum('status', ['completed', 'pending', 'failed'])->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
