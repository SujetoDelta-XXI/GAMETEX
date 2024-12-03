<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EquiposModel;
use App\Models\TorneosModel;
use App\Models\FasesModel;
use App\Models\PartidasModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquipoTorneoFasePartidaModel>
 */
class EquipoTorneoFasePartidaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equipo_id' => EquiposModel::all()->random()->id,
            'torneo_id' => TorneosModel::all()->random()->id,
            'fase_id' => FasesModel::all()->random()->id,
            'partida_id' => PartidasModel::all()->random()->id,
        ];
    }
}
