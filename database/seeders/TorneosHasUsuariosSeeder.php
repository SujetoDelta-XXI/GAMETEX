<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TorneosHasUsuariosModel;

class TorneosHasUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asignar usuarios a torneos específicos (en este caso con ids pequeños)
        TorneosHasUsuariosModel::create([
            'torneo_id' => 1,  // Torneo con id 1
            'usuario_id' => 1,  // Usuario con id 1
        ]);

        TorneosHasUsuariosModel::create([
            'torneo_id' => 1,  // Torneo con id 1
            'usuario_id' => 2,  // Usuario con id 2
        ]);

        TorneosHasUsuariosModel::create([
            'torneo_id' => 2,  // Torneo con id 2
            'usuario_id' => 1,  // Usuario con id 1
        ]);

        TorneosHasUsuariosModel::create([
            'torneo_id' => 2,  // Torneo con id 2
            'usuario_id' => 2,  // Usuario con id 2
        ]);

        // Si deseas agregar más datos, repite las líneas anteriores con los valores adecuados
    }
}
