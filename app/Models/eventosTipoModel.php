<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eventosTipoModel extends Model
{
    protected $table = 'eventos_tipo';
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'categoria',
        'reglas',
        'image',
        'updated_date',
    ];
    public function eventos() { 
        return $this->hasMany(eventosModel::class, 'evento_tipo_id');
    }
}
