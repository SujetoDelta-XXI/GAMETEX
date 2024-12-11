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
        // Filtrar torneos que no están llenos
        $torneo = TorneosModel::all()->filter(function ($torneo) {
            return !$torneo->estaLleno();
        })->random();
        
        // Filtrar equipos del torneo que no están llenos
        $equipo = $torneo->equipos->filter(function ($equipo) {
            return !$equipo->estaLleno();
        })->random();
        // Filtrar usuarios que aún no estén asignados a un equipo del torneo

        $usuario = UserModel::all()->filter(function ($usuario) use ($torneo) {
            return !$torneo->usuarios->contains($usuario);
        })->random();

        // Verificar si no hay torneos, equipos o usuarios disponibles que cumplan la condición
        if (!$torneo || !$equipo || !$usuario) {
            throw new \Exception('No hay torneos, equipos o usuarios disponibles que cumplan las condiciones.');
        }

        return [
            'torneo_id' => $torneo->id,   // Torneo no lleno
            'usuario_id' => $usuario->id, // Usuario no asignado a un equipo del torneo
            'equipo_id' => $equipo->id,   // Equipo no lleno
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
