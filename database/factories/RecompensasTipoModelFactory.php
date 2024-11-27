<?php

namespace Database\Factories;

use App\Models\RecompensasTipoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecompensasTipoModelFactory extends Factory
{
    protected $model = RecompensasTipoModel::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Medalla', 'Trofeo', 'Certificado', 'Punto']), // Solo 4 tipos de recompensa
            'cantidad' => $this->faker->numberBetween(1, 100), // Cantidad aleatoria entre 1 y 100
        ];
    }
}
