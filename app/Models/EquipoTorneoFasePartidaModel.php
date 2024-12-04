<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoTorneoFasePartidaModel extends Model
{
    /** @use HasFactory<\Database\Factories\EquipoTorneoFasePartidaModelFactory> */
    use HasFactory;

    protected $table = 'equipo_torneo_fase_partida_models';

    public function equipo()
    {
        return $this->belongsTo(EquiposModel::class, 'equipo_id');
    }

    public function torneo()
    {
        return $this->belongsTo(TorneosModel::class, 'torneo_id');
    }

    public function fase()
    {
        return $this->belongsTo(FasesModel::class, 'fase_id');
    }

    public function partida()
    {
        return $this->belongsTo(PartidasModel::class, 'partida_id');
    }

    // Si deseas personalizar el nombre de las columnas de timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'equipo_id',
        'torneo_id',
        'fase_id',
        'partida_id',
    ];

    // Si solo necesitas los campos de las relaciones
    protected $guarded = [
        // Aquí puedes especificar qué campos no se deben permitir para asignación masiva
    ];

}
