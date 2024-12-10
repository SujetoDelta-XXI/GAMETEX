<?php

namespace App\Observers;

use App\Models\TorneosModel;
use App\Models\EquiposModel;

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
    public function updated(TorneosModel $torneosModel): void
    {
        //
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
