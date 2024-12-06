<?php

namespace Database\Factories;

use App\Models\TorneosModel;
use App\Models\TorneosJuegoModel;
use App\Models\RecompensasTipoModel;
use App\Models\ModerModel;
use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TorneosModelFactory extends Factory
{
    protected $model = TorneosModel::class;

    public function definition()
    {

        $juegoRandom = TorneosJuegoModel::all()->random();
        $imageId = $this->faker->unique()->numberBetween(1, 1000); 
        return [
            'nombre' => $this->faker->word(), // Un nombre de juego aleatorio
            'fecha_inicio' => $this->faker->dateTimeBetween('-1 month', 'now'), // Fecha de inicio aleatoria dentro del último mes
            'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 month'), // Fecha de fin aleatoria dentro del próximo mes
            'entrada' => 'gratis', // Nivel de experiencia aleatorio
            'descripcion' => $this->faker->sentence(),
            'reglas' => $this->faker->sentence(),
/*             'imagen' => 'referencia.jpeg', */
            'imagen' => $juegoRandom->imagen,
            'torneo_juego_id' => $juegoRandom->id,
            /* 'torneo_juego_id' => TorneosJuegoModel::all()->random()->id, */ 
            'recompensas_id' => RecompensasTipoModel::all()->random()->id,
            'moderador_id' => ModerModel::all()->random()->id, 
            'administrador_id' => AdminModel::all()->random()->id, 
        ];
    }
}
