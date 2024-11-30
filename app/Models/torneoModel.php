<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class torneoModel extends Model
{
    protected $table = 'torneos';

    protected $fillable = [
        'nombrej',
        'creador',
        'fecha_inicio',
        'fecha_fin',
        'entrada',
        'imagen',
        'torneo_juego_id',
        'evento_tipo_id',
        'recompensas_id',
        'moderador_id',
        'administrador_id',
    ];

    public function torneoJuego()
    {
        return $this->belongsTo(torneoJuegoModel::class, 'torneo_juego_id');
    }

    public function eventoTipo()
    {
        return $this->belongsTo(EventosTipoModel::class, 'evento_tipo_id');
    }

    public function recompensas()
    {
        return $this->belongsTo(RecompensasTipoModel::class, 'recompensas_id');
    }

    public function moderador()
    {
        return $this->belongsTo(ModerModel::class, 'moderador_id');
    }

    public function administrador()
    {
        return $this->belongsTo(AdminModel::class, 'administrador_id');
    }




}
