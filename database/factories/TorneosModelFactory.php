<?php

namespace Database\Factories;

use App\Models\TorneosModel;
use App\Models\TorneosJuegoModel;
use App\Models\RecompensasTipoModel;
use App\Models\ModerModel;
use App\Models\AdminModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;


class TorneosModelFactory extends Factory
{
    protected $model = TorneosModel::class;

    public function definition()
    {
        $adjetivos = ['Épicos', 'Intensos', 'Grandiosos', 'Legendarios', 'Desafiantes', 'Colosales', 'Furiosos', 'Inmortales'];
        $sustantivos = ['Desafíos', 'Combates', 'Retiros', 'Confrontaciones', 'Alianzas', 'Contiendas', 'Duelo', 'Conquistas'];
        
        $nombreCompuesto = $this->faker->randomElement($adjetivos) . ' ' . $this->faker->randomElement($sustantivos);
        
        

        
        $juegoRandom = TorneosJuegoModel::all()->random();
        $fechaInicio = $this->faker->dateTimeBetween('-3 month','now');
        $fechaFin = Carbon::instance($fechaInicio)->addMonth()->addDays(7);
        return [
            'nombre' => $nombreCompuesto, 
            'fecha_inicio' => $fechaInicio, // Fecha de inicio aleatoria dentro del último mes
            'fecha_fin' => $fechaFin, // Fecha de fin aleatoria dentro del próximo mes
            'entrada' => $this->faker->randomFloat(2, 10, 50), 
            'descripcion' => $this->faker->sentence(),
            'reglas' => $this->faker->sentence(),
/*             'imagen' => 'referencia.jpeg', */
            'imagen' => $juegoRandom->imagen,
            'torneo_juego_id' => $juegoRandom->id,
            /* 'torneo_juego_id' => TorneosJuegoModel::all()->random()->id, */ 
            'recompensas_id' => RecompensasTipoModel::all()->random()->id,
            'moderador_id' => ModerModel::all()->random()->id, 
            'administrador_id' => AdminModel::all()->random()->id, 
        ];
    }
}
