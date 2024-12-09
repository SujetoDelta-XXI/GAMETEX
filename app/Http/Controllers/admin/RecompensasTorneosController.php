<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use App\Models\torneoJuegoModel;
use App\Models\TorneosHasUsuariosModel;
use App\Models\TorneosJuegoModel;
use Illuminate\Http\Request;

class RecompensasTorneosController extends Controller
{
    public function showTorneo($id)
    {
        $recompensa = RecompensasModel::findOrFail($id);
        $torneos = TorneosHasUsuariosModel::with(['torneo', 'torneo.torneoJuego', 'equipo'])->get();
        $torneosJuegos = torneoJuegoModel::all();

        return view('admin.crud.recompensasTorneos', compact('recompensa', 'torneos', 'torneosJuegos'));
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

    public function getEquipos($id)
    {
        $equipos = TorneosHasUsuariosModel::where('torneo_id', $id)
            ->with('equipo.usuarios')
            ->get()
            ->pluck('equipo')
            ->unique();

        return response()->json($equipos);
    }
}
