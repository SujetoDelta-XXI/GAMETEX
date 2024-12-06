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
    protected $fillable = [
        'usuario_id',
        'recompensa_id',
        'estado'
    ];
    protected $guarded = [
    ];
}
