<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecompensasTipoModel extends Model
{
    public function recompensasTipo() { 
        return $this->hasMany(recompensasModel::class, 'recompensas_id');
    }
}
