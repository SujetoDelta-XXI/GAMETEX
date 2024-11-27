<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TorneosJuegoModel>
 */
class TorneosJuegoModelFactory extends Factory
{
    protected $model = \App\Models\TorneosJuegoModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(), // Genera un nombre aleatorio.
        ];
    }
}
