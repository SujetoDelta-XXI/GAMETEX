<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recompensasTipoModel extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención de nombres pluralizados)
    protected $table = 'recompensas_tipo';

    // Campos asignables masivamente
    protected $fillable = ['nombre', 'cantidad','categoria'];

    // Si deseas relaciones con otras tablas, las puedes agregar aquí.
    // Ejemplo de relación:
    // public function torneos()
    // {
    //     return $this->hasMany(Torneo::class);
    // }
}
