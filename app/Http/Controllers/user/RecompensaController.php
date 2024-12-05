<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use App\Models\UsuariosHasRecompensasModel;
use Illuminate\Http\Request;

class RecompensaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user'); 
    }

    public function showUserRecompensas()
    {
        $user = Auth::guard('user')->user();
        $userId = $user->id;

        $recompensasPendientes = UsuariosHasRecompensasModel::where('usuario_id', $userId)
            ->where('estado', false)
            ->with('recompensa')
            ->get();

        $recompensasReclamadas = UsuariosHasRecompensasModel::where('usuario_id', $userId)
            ->where('estado', true)
            ->with('recompensa')
            ->get();

        return view('users.acciones.users-recompensas', compact('recompensasPendientes', 'recompensasReclamadas'));
    }



    public function updateEstado(Request $request)
    {
        $recompensa = UsuariosHasRecompensasModel::find($request->id);
        $recompensa->estado = true;
        $recompensa->save();

        return response()->json(['success' => true]);
    }
    
}
