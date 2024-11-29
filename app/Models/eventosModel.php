<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eventosModel extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'reglas',
        'imagen',
        'fecha_inicio',
        'fecha_fin',
        'created_at',
        'updated_date',
        'evento_tipo_id', 
        'moderador_id',
    ];
    public function eventosTipo() 
    { 
        return $this->belongsTo(eventosTipoModel::class, 'evento_tipo_id'); 
    } 
    public function moderador() 
    { 
        return $this->belongsTo(ModerModel::class, 'moderador_id');
    }
    public function recompensa() 
    { 
        return $this->belongsTo(RecompensasModel::class, 'recompensas_id');
    }

    public static function search($search, $searchType)
    {
        $query = self::with(['eventosTipo', 'moderador']);

        if (!empty($search) && !empty($searchType)) {
            if ($searchType == 'nombre') {
                $query->whereHas('eventosTipo', function($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%");
                });
            } elseif ($searchType == 'moderador') {
                $query->whereHas('moderador', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            }
        }

        return $query;
    }
}
