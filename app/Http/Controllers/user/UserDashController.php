<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RecompensasModel;
use App\Models\TorneosModel;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserDashController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('auth.user'); 
    } */

    public function index()
    {
        $usuario = Auth::guard('user')->user();
        if (!$usuario) {
            abort(403, 'No autorizado');
        }
        

        return view('users.acciones.users-perfil', compact('usuario'));
    }

    public function perfil()
    {
        return view('users.acciones.users-perfil');
    }

    public function recompensas()
    {
        return redirect()->action([RecompensaController::class, 'showUserRecompensas']);
    }

    public function torneos()
    {
        $fechaActual = \Carbon\Carbon::now();

        $torneosConcluidos = TorneosModel::where('fecha_fin', '<', $fechaActual)->get();
        $torneosActivos = TorneosModel::where('fecha_fin', '>=', $fechaActual)->get();

        return view('users.acciones.users-torneos', compact('torneosConcluidos', 'torneosActivos'));
    }

    public function eventos()
    {
        return view('users.acciones.users-eventos');
    }

    public function show()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::guard('user')->user();
        if (!$user) {
            abort(403, 'No autorizado');
        }

        return view('profile.show', compact('user')); 
    }


}
