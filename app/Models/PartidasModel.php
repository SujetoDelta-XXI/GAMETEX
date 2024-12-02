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
}
