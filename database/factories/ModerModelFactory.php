<?php

namespace Database\Factories;

use App\Models\ModerModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModerModelFactory extends Factory
{
    protected $model = ModerModel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Asigna una contraseña segura (puedes personalizarla)
            'remember_token' => Str::random(10), // Token de recordatorio (opcional)
        ];
    }
}
