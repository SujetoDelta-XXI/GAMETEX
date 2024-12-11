<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\UserModel;
use App\models\TorneosModel;

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



    public function torneos()
    {
        return $this->belongsToMany(
            TorneosModel::class,
            'torneos_has_usuarios', // Nombre de la tabla intermedia
            'equipo_id',           // Llave foránea hacia equipos
            'torneo_id'            // Llave foránea hacia torneos
        );
    }
    
    
    public function usuarios()
    {
        return $this->belongsToMany(
            UserModel::class,
            'torneos_has_usuarios', 
            'equipo_id',            
            'usuario_id'            
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
