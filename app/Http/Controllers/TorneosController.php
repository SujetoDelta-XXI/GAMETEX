<?php

namespace App\Http\Controllers;

use App\Models\TorneosModel;
use Illuminate\Http\Request;
use App\Models\TorneosHasUsuariosModel;

class TorneosController extends Controller
{
    public function index()
    {
        $gameFilter = request()->query('game', 'all'); 

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
        $this->middleware('auth.user');
    
        $torneo = TorneosModel::find($id);
    
        if (!$torneo) {
            return back()->withErrors(['torneo' => 'El torneo no existe.']);
        }
    
        $usuario = Auth()->guard('user')->user();
    
        $usuarioInscrito = TorneosHasUsuariosModel::where('usuario_id', $usuario->id)
            ->where('torneo_id', $id)
            ->exists();
    
        return view('torneos.register_torneos', compact('torneo', 'usuarioInscrito'))
            ->with('torneoLleno', $torneo->estaLleno());
    }
}
