<?php

namespace Database\Factories;

use App\Models\TorneosHasUsuariosModel;
use App\Models\TorneosModel;
use App\Models\UserModel;
use App\Models\EquiposModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TorneosHasUsuariosModelFactory extends Factory
{
    /**
     * El nombre del modelo asociado.
     *
     * @var string
     */
    protected $model = TorneosHasUsuariosModel::class;

    /**
     * Define el estado por defecto para el factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'torneo_id' => TorneosModel::all()->random()->id, // Generar un torneo relacionado
            'usuario_id' => UserModel::all()->random()->id,   // Generar un usuario relacionado
            'equipo_id' => EquiposModel::all()->random()->id,   // Generar un usuario relacionado
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
