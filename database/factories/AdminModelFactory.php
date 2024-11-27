<?php

namespace Database\Factories;

use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminModelFactory extends Factory
{
    protected $model = AdminModel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(), // Nombre aleatorio
            'email' => $this->faker->unique()->safeEmail(), // Correo electrónico único
            'password' => bcrypt('password123'), // Contraseña encriptada
        ];
    }
}
