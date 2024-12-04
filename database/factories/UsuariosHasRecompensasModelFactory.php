<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UsuariosHasRecompensasModel;
use App\Models\RecompensasModel;
use App\Models\UserModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsuariosHasRecompensasModel>
 */
class UsuariosHasRecompensasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UsuariosHasRecompensasModel::class;

    public function definition(): array
    {
        return [
            'recompensa_id' => RecompensasModel::all()->random()->id,
            'usuario_id' => UserModel::all()->random()->id, 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
