<?php

namespace App\Observers;

use App\Models\TorneosModel;
use App\Models\EquiposModel;
use App\Models\TorneosHasUsuariosModel;

class TorneoObservador
{
    /**
     * Handle the TorneosModel "created" event.
     */
    public function created(TorneosModel $torneosModel): void
    {
        echo('Pasa por el observador');
        for ($i = 1; $i <= 5; $i++) {
            $equipos[] = EquiposModel::create([
                'nombre' => "Equipo $i",
                'numero_equipo' => $i,
                'torneo_id' => $torneosModel->id,
            ]);
        }
    }

    /**
     * Handle the TorneosModel "updated" event.
     */
    public function updated(TorneosModel $torneo)
    {
        // Verificar si el torneo está lleno
        if ($torneo->estaLleno()) {
            // Obtener los 25 usuarios que participan en el torneo
            $usuarios = $torneo->usuarios()->whereNull('equipo_id')->take(25)->get();

            // Obtener los 5 grupos del torneo
            $equipos = $torneo->equipos()->take(5)->get();

            // Asignar a los usuarios a los grupos de forma equitativa
            $usuarioCount = $usuarios->count();
            $equiposCount = $equipos->count();
            $usuariosPorGrupo = ceil($usuarioCount / $equiposCount); // Distribuir usuarios equitativamente

            $usuariosIndex = 0; // Índice para recorrer los usuarios

            foreach ($grupos as $grupo) {
                // Seleccionar los usuarios para el grupo actual
                $usuariosAsignados = $usuarios->slice($usuariosIndex, $usuariosPorGrupo);
                
                foreach ($usuariosAsignados as $usuario) {
                    // Asignar al usuario al grupo en la tabla intermedia torneos_has_usuarios
                    $usuario->TorneosHasUsuariosModel()->update([
                        'equipo_id' => $grupo->id
                    ]);
                }
                
                // Actualizar el índice de los usuarios asignados
                $usuariosIndex += $usuariosPorGrupo;
            }
        }
    }

    /**
     * Handle the TorneosModel "deleted" event.
     */
    public function deleted(TorneosModel $torneosModel): void
    {
        //
    }

    /**
     * Handle the TorneosModel "restored" event.
     */
    public function restored(TorneosModel $torneosModel): void
    {
        //
    }

    /**
     * Handle the TorneosModel "force deleted" event.
     */
    public function forceDeleted(TorneosModel $torneosModel): void
    {
        //
    }
}
