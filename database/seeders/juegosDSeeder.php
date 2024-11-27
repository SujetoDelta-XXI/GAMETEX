<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class juegosDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('juegos_diccionary')->insert([ 
            'id'=> 1,
            'nombre' => 'Left 4 Dead 2', 
            'genero'=>'shooter, zombies , tercera persona',
        ]);
        DB::table('juegos_diccionary')->insert([ 
            'id'=> 2,
            'nombre' => 'Counter Strike Global Ofensive', 
            'genero'=>'shooter,estrategia , primera persona',
        ]);
        DB::table('juegos_diccionary')->insert([ 
            'id'=> 3,
            'nombre' => 'Among US', 
            'genero'=>'party,deduccion, tercera persona',
        ]);
        DB::table('juegos_diccionary')->insert([ 
            'id'=> 4,
            'nombre' => 'Clash Royale', 
            'genero'=>'estrategia, mobile',
        ]);
        DB::table('juegos_diccionary')->insert([ 
            'id'=> 5,
            'nombre' => 'League of Leyends', 
            'genero'=>'multi player,estrategia,mmo',
        ]);
    }
}
