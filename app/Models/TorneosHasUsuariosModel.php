<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosHasUsuariosModel extends Model
{
    use HasFactory;

    // Nombre de la tabla si no sigue la convención plural de Eloquent
    protected $table = 'torneos_has_usuarios';

    // Definir las relaciones con otras tablas (si es necesario)
    public function torneo()
    {
        return $this->belongsTo(TorneosModel::class, 'torneo_id');
    }

    public function usuario()
    {
        return $this->belongsTo(UserModel::class, 'usuario_id');
    }

    // Si deseas personalizar el nombre de las columnas de timestamps
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'torneo_id',
        'usuario_id',
    ];

    // Si solo necesitas los campos de las relaciones
    protected $guarded = [
        // Aquí puedes especificar qué campos no se deben permitir para asignación masiva
    ];
}
