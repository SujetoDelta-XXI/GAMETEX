<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecompensasTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recompensas_tipo')->insert([ 
            'nombre'=>'targeta regalo $50',
            'cantidad'=>5,
            
        ]);
        DB::table('recompensas_tipo')->insert([ 
            'nombre'=>'targeta regalo $5',
            'cantidad'=>10,
            
        ]);
        DB::table('recompensas_tipo')->insert([ 
            'nombre'=>'targeta regalo $50',
            'cantidad'=>2,
            
        ]);
    }
}
