<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'clave_producto' => Str::random(16),
            'precio' => $this->faker->numberBetween(100, 300),
            'recompensa_tipo_id' => RecompensasTipoModel::all()->random()->id,
            /* 'torneo_id' => TorneosModel::all()->random()->id,  */
            /* 'evento_id' => eventosModel::all()->random()->id,  */
        ];
    }

}
