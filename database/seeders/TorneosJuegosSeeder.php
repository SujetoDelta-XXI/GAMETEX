<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneosJuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos_juegos')->insert([
            ['nombre' => 'Left4 Dead2'],
            ['nombre' => 'plantas vs zoombies'],
            ['nombre' => 'Empirer Earth'],
            ['nombre' => 'Age of Mitology'],
        ]);
    }
}
