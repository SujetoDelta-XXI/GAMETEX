<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FasesModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('fases_models')->insert([
            [
                'torneo_id' => 1,
                'numFase' => 1,
                'estado' => 'Pendiente',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'torneo_id' => 1,
                'numFase' => 2,
                'estado' => 'En Proceso',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'torneo_id' => 2,
                'numFase' => 1,
                'estado' => 'Finalizado',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'torneo_id' => 2,
                'numFase' => 2,
                'estado' => 'Pendiente',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'torneo_id' => 3,
                'numFase' => 1,
                'estado' => 'En Proceso',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
