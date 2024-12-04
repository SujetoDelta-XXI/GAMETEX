<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasesModel extends Model
{
    /** @use HasFactory<\Database\Factories\FasesModelFactory> */
    use HasFactory;

    protected $table = 'fases_models';
    protected $fillable = [
        'torneo_id',
        'numFase',
        'estado'
    ];

    public function equipos()
    {
        return $this->belongsToMany(EquiposModel::class, 'equipo_torneo_fase_partida_models', 'fase_id', 'equipo_id')
                    ->withTimestamps();
    }

    public function torneos()
    {
        return $this->belongsToMany(TorneosModel::class, 'equipo_torneo_fase_partida_models', 'fase_id', 'torneo_id')
                    ->withTimestamps(); // Si necesitas los timestamps
    }

    public function partidas()
    {
        return $this->belongsToMany(PartidasModel::class, 'equipo_torneo_fase_partida_models', 'fase_id', 'partida_id')
                    ->withTimestamps();
    }

}
