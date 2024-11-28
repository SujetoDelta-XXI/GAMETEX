<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosModel extends Model
{
    use HasFactory;

    protected $table = 'torneos';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'entrada',
        'exp',
        'descripcion',
        'imagen',
        'torneo_juego_id',
        'recompensas_id',
        'moderador_id',
        'administrador_id',
    ];

    public function torneoJuego()
    {
        return $this->belongsTo(TorneosJuegoModel::class, 'torneo_juego_id');
    }

    public function recompensa()
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
