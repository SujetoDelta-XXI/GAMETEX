<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Importar DB
use Illuminate\Support\Carbon;

class EquiposModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('equipos_models')->insert([
            [
                'nombre' => 'Equipo Alpha',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Equipo Bravo',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Equipo Charlie',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Equipo Delta',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Equipo Echo',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
