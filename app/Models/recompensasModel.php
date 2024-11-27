<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recompensasModel extends Model
{
    protected $table = 'recompensas';
    protected $fillable = [
        'id',
        'nombre',
        'cantidad',
    ];
    public function recompensasTipo() 
    { 
        return $this->belongsTo(recompensasTipoModel::class, 'recompensas_tipo_id'); 
    }
    public function torneo() { 
        return $this->belongsTo(torneoModel::class, 'torneo_id'); 
    } 
    public function evento() { 
        return $this->belongsTo(eventosModel::class, 'evento_id');
    }
    
}
