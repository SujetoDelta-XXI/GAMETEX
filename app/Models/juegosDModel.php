<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class juegosDModel extends Model
{
    protected $table = 'juegos_diccionary';
    protected $fillable = [
        'nombre', 
        'genero',
        'created_at', 
        'updated_at', 
    ];
    public function torneos() { 
        return $this->hasMany(torneoModel::class, 'torneo_juego_id');}
}