<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionModel extends Model
{
    use HasFactory;

    protected $fillable = ['torneo_id', 'cantidad', 'total', 'cliente_email', 'status'];

    public function torneo()
    {
        return $this->belongsTo(TorneosModel::class, 'torneo_id');
    }
}
