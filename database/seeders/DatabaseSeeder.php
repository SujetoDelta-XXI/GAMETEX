<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecompensasTipoModel;
use App\Models\RecompensasModel;
use App\Models\ModerModel;
use App\Models\AdminModel;
use App\Models\TorneosModel;
use App\Models\eventosModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([ UserSeeder::class, ]);
        /* $this->call([ ModerSeeder::class, ]); */
        /* $this->call([ AdminSeeder::class, ]); */
        /* $this->call([ eventosSeeder::class, ]); */
        /* $this->call([ eventosTipoSeeder::class, ]); */
        /* $this->call([ RecompensasTipoSeeder::class, ]); */
        $this->call([ TorneosJuegosSeeder::class]);
        $this->call([ RecompensasTipoSeeder::class]);

                // Ejecutar todos los factories necesarios para poblar las tablas

        // Factori anterior para recompensas tipo
        /* $recompensaTipo = RecompensasTipoModel::factory(5)->create(); */


        // Crear moderador y administrador
        $moderador = ModerModel::factory(5)->create();
        $administrador = AdminModel::factory(2)->create();
        $torneos = TorneosModel::factory(20)->create();
        $recompensas = RecompensasModel::factory(30)->create();

    }
}
