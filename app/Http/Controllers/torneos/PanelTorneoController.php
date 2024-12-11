<?php

namespace App\Http\Controllers\torneos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use App\Models\EquiposModel;
use App\Models\TorneosModel;


class PanelTorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }

    public function index($id)
    {
        $torneo = TorneosModel::findOrFail($id);
        return view('torneos.panel.descripcion', compact('torneo'));
    }

    public function descripcion($id)
    {
        $torneo = TorneosModel::findOrFail($id);
        return view('torneos.panel.descripcion', compact('torneo'));
    }

    public function partidas($id)
    {
        $torneo = TorneosModel::findOrFail($id);
        return view('torneos.panel.partidas', compact('torneo'));
    }

    public function equipos($id)
    {
        $torneo = TorneosModel::findOrFail($id);
        $equipos = EquiposModel::with('usuarios')
            ->whereHas('torneos', function ($query) use ($id) 
            {
                $query->where('torneo_id', $id); })
                ->get();

            return view('torneos.panel.equipos', compact('equipos', 'torneo'))->with('torneoLleno', $torneo->estaLleno());
    
    }
}
