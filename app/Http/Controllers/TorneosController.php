<?php

namespace App\Http\Controllers;

use App\Models\TorneosModel;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function index()
    {
        // Captura el parámetro 'game' de la URL
        $gameFilter = request()->query('game', 'all'); // Por defecto, muestra "all"

        // Filtrar los torneos por juego si se seleccionó uno
        $torneos = TorneosModel::all();
        /* dump('paso por index'); */
        
        return view('torneos.index', compact('torneos', 'gameFilter'));
    }
    
    public function register()
    {
        /* dump('paso por register'); */
        $this->middleware('auth.user');
        
        return view('torneos.register_torneos');
    }
    
    public function registerId($id)
    {
        /* dump('paso por registerId'); */
        $this->middleware('auth.user');
        $torneo = TorneosModel::find($id);

        

        return view('torneos.register_torneos', compact('torneo'))->with('torneoLleno', $torneo->estaLleno());

    }
}
