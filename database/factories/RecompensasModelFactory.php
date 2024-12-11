<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\RecompensasModel;
use App\Models\RecompensasTipoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecompensasModelFactory extends Factory
{
    protected $model = RecompensasModel::class;

    public function definition()
    {
        $opciones = [
            'Tarjeta de regalo Steam',
            'Tarjeta de regalo Xbox',
            'Tarjeta de regalo PlayStation',
            'Tarjeta de regalo Epic Games',
            'Minecraft',
            'Grand Theft Auto V',
            'Fortnite Pack',
            'FIFA 24',
            'Call of Duty: Modern Warfare II',
            'The Legend of Zelda: Breath of the Wild'
        ];

        return [
            'nombre' => $this->faker->randomElement($opciones),
            'clave_producto' => Str::random(16),
            'precio' => $this->faker->numberBetween(100, 300),
            'recompensa_tipo_id' => RecompensasTipoModel::all()->random()->id,
            /* 'torneo_id' => TorneosModel::all()->random()->id,  */
            /* 'evento_id' => eventosModel::all()->random()->id,  */
        ];
    }
}
