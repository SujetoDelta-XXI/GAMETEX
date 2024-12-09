<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
class UserModel extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'actividad',
        'discord',
        'estado',
        'descripcion',
        'password',
        'current_team_id', 
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return Storage::url($this->profile_photo_path);
        }
        return $this->defaultProfilePhotoUrl();
    }

    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    public function torneos()
    {
        return $this->belongsToMany(TorneosModel::class, 'torneos_has_usuarios', 'usuario_id', 'torneo_id')
                    ->withTimestamps(); // Si necesitas los timestamps
    }

    public function recompensas()
    {
        return $this->belongsToMany(RecompensasModel::class, 'usuarios_has_recompensas', 'usuario_id', 'recompensa_id')->withTimestamps();
    }

    public function equipos()
    {
        return $this->belongsToMany(EquiposModel::class, 'torneos_has_usuarios', 'usuario_id', 'equipo_id')
                    ->withTimestamps(); // Si necesitas los timestamps
    }

}
