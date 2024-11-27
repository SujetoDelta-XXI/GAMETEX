<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosModel extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención pluralizada)
    protected $table = 'torneos';

    // Campos asignables masivamente
    protected $fillable = [
        'nombrej',
        'fecha_inicio',
        'fecha_fin',
        'exp',
        'descripcion',
        'imagen',
        'torneo_juego_id',
        'recompensas_id',
        'moderador_id',
        'administrador_id',
    ];

    /**
     * Relación con TorneoJuego (torneos_juegos).
     */
    public function torneoJuego()
    {
        return $this->belongsTo(TorneosJuegoModel::class, 'torneo_juego_id');
    }

    /**
     * Relación con RecompensasTipo (recompensas_tipo).
     */
    public function recompensa()
    {
        return $this->belongsTo(RecompensasTipoModel::class, 'recompensas_id');
    }

    /**
     * Relación con Moderador (moders).
     */
    public function moderador()
    {
        return $this->belongsTo(ModerModel::class, 'moderador_id');
    }

    /**
     * Relación con Administrador (admins).
     */
    public function administrador()
    {
        return $this->belongsTo(AdminModel::class, 'administrador_id');
    }
}
