<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventosTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eventos_tipo')->insert([ 
            'id'=> 2,
            'nombre'=>'otakon',
            'descripcion'=>'evento de tematica otaku',
            'categoria'=>'party,convencion , anime',
            'reglas'=>'respetar el libro de normas pdf del evento',
            
        ]);
        DB::table('eventos_tipo')->insert([ 
            'id'=> 3,
            'nombre'=>'gamin 6',
            'descripcion'=>'6 meses de full contenido gaming, enlistate y se uno de nuestros creadores de contenido destacados',
            'categoria'=>'torneos, gameplay, streamin',
            'reglas'=>'debes resgitrarte con anticipación, no se admiten juagdores con sansciones, debes de ser mayor de edad',
            
        ]);
        DB::table('eventos_tipo')->insert([ 
            'id'=> 4,
            'nombre'=>'sensei',
            'descripcion'=>'8 meses de full contenido gaming, enlistate y se uno de nuestros creadores de contenido destacados',
            'categoria'=>'torneos, gameplay, streamin',
            'reglas'=>'debes resgitrarte con anticipación, no se admiten juagdores con sansciones, debes de ser mayor de edad',
            
        ]);
    }
}
