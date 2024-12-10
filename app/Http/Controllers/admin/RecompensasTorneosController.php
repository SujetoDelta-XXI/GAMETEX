<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use App\Models\torneoJuegoModel;
use App\Models\torneoModel;
use App\Models\TorneosHasUsuariosModel;
use App\Models\TorneosJuegoModel;
use App\Models\TorneosModel;
use App\Models\UserModel;
use App\Models\UsuariosHasRecompensasModel;
use Database\Seeders\UsuariosHasRecompensasSeed;
use Illuminate\Http\Request;

class RecompensasTorneosController extends Controller
{
    public function showTorneo()
    {
        $torneos = TorneosModel::with('torneoJuego')->get();
        $torneosJuegos = TorneosJuegoModel::all();
        return view('admin.crud.recompensasTorneos', compact('torneos', 'torneosJuegos'));
    }

    public function searchTorneo(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $filterType = $request->input('filterType');

        $query = TorneosHasUsuariosModel::query();

        if ($filterType === 'juego') {
            $query->whereHas('torneo.torneoJuego', function($query) use ($searchTerm) {
                $query->where('nombre', 'like', '%' . $searchTerm . '%');
            });
        } elseif ($filterType === 'nombre_torneo') {
            $query->whereHas('torneo', function($query) use ($searchTerm) {
                $query->where('nombre', 'like', '%' . $searchTerm . '%');
            });
        }

        $resultados = $query->with(['torneo', 'torneo.torneoJuego', 'equipo'])->get();

        return response()->json($resultados);
    }

    public function getDetalles($torneo_id)
    {
        $torneos = TorneosModel::with('torneoJuego')->get();
        $torneosJuegos = TorneosJuegoModel::all();
        $detalles = TorneosHasUsuariosModel::where('torneo_id', $torneo_id)->with(['usuario', 'equipo'])->get();
        
        $torneo = TorneosModel::with('recompensas')->find($torneo_id);
        $recompensas = $torneo ? $torneo->recompensas : collect(); 

        return view('admin.crud.recompensasTorneos', compact('torneos', 'torneosJuegos', 'detalles', 'recompensas'));
    }

    public function asignarRecompensa(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'recompensa_id' => 'required|exists:recompensas,id',
            'estado' => 'required|string',
        ]);

        UsuariosHasRecompensasModel::create($validated);

        return response()->json(['success' => true]);
    }
    
}
