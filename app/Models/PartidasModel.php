<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidasModel extends Model
{
    /** @use HasFactory<\Database\Factories\PartidasModelFactory> */
    use HasFactory;
    protected $table = 'partidas_models';
    protected $fillable = [
        'resultado'
    ];

    public function equipos()
    {
        return $this->belongsToMany(EquiposModel::class, 'equipo_torneo_fase_partida_models', 'partida_id', 'equipo_id')
                    ->withTimestamps();
    }

    public function torneos()
    {
        return $this->belongsToMany(TorneosModel::class, 'equipo_torneo_fase_partida_models', 'partida_id', 'torneo_id')
                    ->withTimestamps(); // Si necesitas los timestamps
    }

    public function fases()
    {
        return $this->belongsToMany(FasesModel::class, 'equipo_torneo_fase_partida_models', 'partida_id', 'fase_id')
                    ->withTimestamps();
    }
}
