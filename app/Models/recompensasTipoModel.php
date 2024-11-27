<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recompensasTipoModel extends Model
{
    public function recompensasTipo() { 
        return $this->hasMany(recompensasModel::class, 'recompensas_id');
    }
}
