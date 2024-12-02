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
    ];
}
