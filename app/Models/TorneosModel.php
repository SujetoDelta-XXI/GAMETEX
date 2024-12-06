<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Discord\Discord;
use App\Services\DiscordService;
use Exception;


class TorneosModel extends Model
{
    use HasFactory;

    protected $table = 'torneos';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'entrada',
        'descripcion',
        'reglas',
        'imagen',
        'torneo_juego_id',
        'recompensas_id',
        'moderador_id',
        'administrador_id',
    ];

    public function torneoJuego()
    {
        return $this->belongsTo(TorneosJuegoModel::class, 'torneo_juego_id');
    }

    public function recompensa()
    {
        return $this->belongsTo(RecompensasTipoModel::class, 'recompensas_id');
    }

    public function moderador()
    {
        return $this->belongsTo(ModerModel::class, 'moderador_id');
    }

    public function administrador()
    {
        return $this->belongsTo(AdminModel::class, 'administrador_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(UserModel::class, 'torneos_has_usuarios', 'torneo_id', 'usuario_id')
                    ->withTimestamps();
    }

    public function equipos()
    {
        return $this->belongsToMany(EquiposModel::class, 'equipo_torneo_fase_partida_models', 'torneo_id', 'equipo_id')
                    ->withTimestamps();
    }

    public function fases()
    {
        return $this->belongsToMany(FasesModel::class, 'equipo_torneo_fase_partida_models', 'torneo_id', 'fase_id')
                    ->withTimestamps();
    }
    public function partidas()
    {
        return $this->belongsToMany(PartidasModel::class, 'equipo_torneo_fase_partida_models', 'torneo_id', 'partida_id')
                    ->withTimestamps();
    }
    

    public function crearCanalDiscord()
    {
        $discordService = new DiscordService();
        dump($discordService);

        return $discordService->crearCanal('1314002945628704800', 'Prueba_2');
    }
}
