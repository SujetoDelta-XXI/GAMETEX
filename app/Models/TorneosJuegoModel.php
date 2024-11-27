<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TorneosJuegoModel extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si coincide con el nombre pluralizado del modelo)
    protected $table = 'torneos_juegos';

    // Campos asignables para la asignación masiva
    protected $fillable = ['nombre'];

    // Si deseas usar timestamps (created_at y updated_at), no necesitas hacer nada, ya que están habilitados por defecto.

    public function torneos()
    {
         return $this->hasMany(TorneosModel::class);
    }
}
