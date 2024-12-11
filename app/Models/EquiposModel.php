<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquiposModel extends Model
{
    /** @use HasFactory<\Database\Factories\EquiposModelFactory> */
    use HasFactory;
    protected $table = 'equipos_models';
    protected $fillable = [
        'nombre',
        'numero_equipo',
        'capacidad_maxima',
        'inscritos_actuales',
        'torneo_id',
    ];

    protected $guarded = [''];



    public function torneo()
    {
        return $this->belongsTo(TorneosModel::class, 'torneo_id');
    }
    
    public function usuarios()
    {
        return $this->belongsToMany(
            UserModel::class,
            'torneos_has_usuarios', // Nombre de la tabla intermedia
            'equipo_id',            // Llave foránea hacia equipos
            'usuario_id'            // Llave foránea hacia usuarios
        );
    }
    
    public function estaLleno()
    {
        return $this->usuarios()->count() >= $this->capacidad_maxima;
    }
    

/*     public function partidas()
    {
        return $this->belongsToMany(PartidasModel::class, 'equipo_torneo_fase_partida_models', 'equipo_id', 'partida_id')
                    ->withTimestamps();
    }

    public function fases()
    {
        return $this->belongsToMany(FasesModel::class, 'equipo_torneo_fase_partida_models', 'equipo_id', 'fase_id')
                    ->withTimestamps();
    } */


}
