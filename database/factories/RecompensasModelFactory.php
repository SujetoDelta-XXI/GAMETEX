<?php

namespace Database\Factories;

use App\Models\RecompensasModel;
use App\Models\RecompensasTipoModel;
use App\Models\TorneosModel;
use App\Models\eventosModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecompensasModelFactory extends Factory
{
    protected $model = RecompensasModel::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word(), // Nombre aleatorio para la recompensa
            'cantidad' => $this->faker->numberBetween(1, 100), // Cantidad aleatoria entre 1 y 100
            'recompensa_tipo_id' => RecompensasTipoModel::all()->random()->id, // Relación con RecompensasTipoModel
            'torneo_id' => TorneosModel::all()->randon()->id, // Relación con TorneosModel
            'evento_id' => eventosModel::all()->randon()->id, // Relación con eventosModel
        ];
    }
}
