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
use Illuminate\Support\Facades\Log;


class RecompensasTorneosController extends Controller
{
    public function guardarRecompensaId(Request $request)
    {
        $recompensa_id = $request->input('recompensa_id');
        session(['temp_recompensa_id' => $recompensa_id]);

        // Añadir mensaje de registro
        Log::info('ID de la recompensa guardada: ' . $recompensa_id);

        return response()->json(['success' => true]);
    }

    public function recompensasDisponibles()
    {
        $recompensas = RecompensasModel::where('asignada', false)->get();
        return response()->json($recompensas);
    }
    public function showTorneo($id)
    {
        $torneos = TorneosModel::with('torneoJuego')->get();
        $torneosJuegos = TorneosJuegoModel::all();
        $recompensas = RecompensasModel::all(); // Recuperar todas las recompensas disponibles

        return view('admin.crud.recompensasTorneos', compact('torneos', 'torneosJuegos', 'recompensas'));
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

    public function obtenerRecompensaId()
    {
        $recompensa_id = session('temp_recompensa_id');

        // Añadir mensaje de registro
        Log::info('ID de la recompensa obtenida: ' . $recompensa_id);

        return response()->json(['recompensa_id' => $recompensa_id]);
    }

    public function asignarRecompensa(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'recompensa_id' => 'required|exists:recompensas,id',
            'estado' => 'required|string',
        ]);

        // Asignar la recompensa
        UsuariosHasRecompensasModel::create([
            'usuario_id' => $validated['usuario_id'],
            'recompensa_id' => $validated['recompensa_id'],
            'estado' => $validated['estado']
        ]);

        // Eliminar la ID de la recompensa temporal
        session()->forget('temp_recompensa_id');

        return response()->json(['success' => true]);
    }
    
}
