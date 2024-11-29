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
            ['nombre' => 'Left 4 Dead 2'],
            ['nombre' => 'Counter Strike 2'],
            ['nombre' => 'League of Legends'],
            ['nombre' => 'Call of Duty Mobile'],
            ['nombre' => 'Call of Duty Warzone'],
            ['nombre' => 'Clash Royale'],
            ['nombre' => 'Brawl Stars'],
            ['nombre' => 'Dragon Fighter Z'],
            ['nombre' => 'Plantas VS Zombies'],
            ['nombre' => 'Age of empires'],
        ]);
    }
}
