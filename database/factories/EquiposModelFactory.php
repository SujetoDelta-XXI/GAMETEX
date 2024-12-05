<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EquiposModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EquiposModel>
 */
class EquiposModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = EquiposModel::class;

    public function definition(): array
    {
        $adjetivos = ['Letales', 'Rápidos', 'Oscuros', 'Invencibles', 'Tácticos', 'Virtuales', 'Explosivos', 'Furtivos'];
        $sustantivos = ['Gamers', 'Pixels', 'Escuadrones', 'Cazadores', 'Gladiadores', 'Clanes', 'Fantasmas'];

        $nombreBase = $this->faker->randomElement($sustantivos) . ' ' . $this->faker->randomElement($adjetivos);
        $sufijoUnico = $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}');
        $nombreUnico = $nombreBase . ' ' . $sufijoUnico;

        return [
            'nombre' => $nombreUnico
        ];
    }
}
