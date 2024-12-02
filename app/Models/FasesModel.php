<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasesModel extends Model
{
    /** @use HasFactory<\Database\Factories\FasesModelFactory> */
    use HasFactory;

    protected $table = 'fases_models';
    protected $fillable = [
        'torneo_id',
        'numFase',
        'estado'
    ];

}
