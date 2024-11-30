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
            ['nombre' => 'Left 4 Dead 2', 'imagen' => 'imagenes_juegos/Left4Dead2.jpg'],
            ['nombre' => 'Counter Strike 2', 'imagen' => 'imagenes_juegos/CounterStrick2.jpg'],
            ['nombre' => 'League of Legends', 'imagen' => 'imagenes_juegos/leagueOfLegendsjpeg.jpeg'],
            ['nombre' => 'Call of Duty Mobile', 'imagen' => 'imagenes_juegos/call-of-duty-mobile.jpg'],
            ['nombre' => 'Call of Duty Warzone', 'imagen' => 'imagenes_juegos/callOfDutyWarzonejpg.jpg'],
            ['nombre' => 'Clash Royale', 'imagen' => 'imagenes_juegos/CrashRoyalljpeg.jpeg'],
            ['nombre' => 'Brawl Stars', 'imagen' => 'imagenes_juegos/BrawlStarsjpeg.jpeg'],
            ['nombre' => 'Dragon Fighter Z', 'imagen' => 'imagenes_juegos/DragonFighterZjpeg.jpeg'],
            ['nombre' => 'Plantas VS Zombies', 'imagen' => 'imagenes_juegos/PlantasVSZombies.jpeg'],
            ['nombre' => 'Age of empires', 'imagen' => 'imagenes_juegos/Ageofempiresjpeg.jpeg'],
        ]);
        
    }
}
