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
            'cantidad' => $this->faker->numberBetween(1, 15),
            'precio' => $this->faker->numberBetween(100, 300),
            'recompensa_tipo_id' => RecompensasTipoModel::all()->random()->id,
            'torneo_id' => TorneosModel::all()->random()->id, 
            /* 'evento_id' => eventosModel::all()->random()->id,  */
        ];
    }

}
