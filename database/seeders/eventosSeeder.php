<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class eventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recompensaTipoId = DB::table('recompensas_tipo')->insertGetId([
            'nombre' => 'targeta regalo $20',
            'cantidad' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $eventoTipoId = DB::table('eventos_tipo')->insertGetId([
            'nombre' => 'CONVENCION',
            'descripcion' => 'Evento de conferencia anual',
            'categoria' => 'gaming',
            'reglas' => 'Respetar horarios y normas del evento',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $moderadorId = DB::table('moders')->insertGetId([
            'name' => 'casparrin',
            'email' => 'casp@mail.com',
            'password' => bcrypt('123'),
            'created_at' => Carbon::now(),
            'sueldo'=>1500,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('eventos')->insert([
            'fecha_inicio' => Carbon::create('2024', '10', '15'),
            'fecha_fin' => Carbon::create('2024', '11', '24'),
            'evento_tipo_id' => $eventoTipoId,
            'moderador_id' => $moderadorId,
            'recompensa_tipo_id' => $recompensaTipoId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
