<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartidasModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('partidas_models')->insert([
            [
                'resultado' => 'Equipo A 2 - 1 Equipo B',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'resultado' => 'Equipo C 3 - 0 Equipo D',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'resultado' => 'Equipo E 1 - 1 Equipo F',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'resultado' => 'Equipo G 0 - 2 Equipo H',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'resultado' => 'Equipo I 4 - 3 Equipo J',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
