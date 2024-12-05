<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosHasRecompensasModel extends Model
{
    use HasFactory;
    protected $table = 'usuarios_has_recompensas';

    public function usuario()
    {
        return $this->belongsTo(UserModel::class, 'usuario_id');
    }
    public function recompensa()
    {
        return $this->belongsTo(RecompensasModel::class, 'recompensa_id');
    }
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'usuario_id',
        'recompensa_id',
        'estado'
    ];

    // Si solo necesitas los campos de las relaciones
    protected $guarded = [
        // Aquí puedes especificar qué campos no se deben permitir para asignación masiva
    ];
}
