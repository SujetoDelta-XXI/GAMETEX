<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecompensasModel extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención pluralizada)
    protected $table = 'recompensas';

    // Campos asignables masivamente
    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'recompensa_tipo_id',
        'torneo_id',
        /* 'evento_id', */
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];


    /**
     * Relación con RecompensasTipo (recompensas_tipo).
     */
    public function tipo()
    {
        return $this->belongsTo(RecompensasTipoModel::class, 'recompensa_tipo_id');
    }

    /**
     * Relación con Torneo (torneos).
     */
    public function torneo()
    {
        return $this->belongsTo(TorneosModel::class, 'torneo_id');
    }

    /**
     * Relación con Evento (eventos).
     */
/*     public function evento()
    {
        return $this->belongsTo(eventosModel::class, 'evento_id');
    } */
   
}
