<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\RecompensasModel;
use App\Models\TorneosModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class UserDashController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('auth.user'); 
    } */
   public function userLog(){
        $usuario = Auth::guard('user')->user();
        if (!$usuario) {
            abort(403, 'No autorizado');
        }
        return [
            'usuario' => $usuario,
            'id' => $usuario->id,
        ];
   }

    public function index()
    {
/*         $usuario = Auth::guard('user')->user();
        if (!$usuario) {
            abort(403, 'No autorizado');
        } */
        
        $usuario = $this->userLog()['usuario'];
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

    public function torneos_activos()
    {
        $userId = $this->userLog()['id'];
        $fechaActual = \Carbon\Carbon::now();
    
        $torneosActivos = UserModel::find($userId)
        ->torneos()
        ->where('fecha_fin', '>=', $fechaActual)
        ->get();

        return view('users.acciones.users-torneos', compact('torneosActivos'));
    }

    public function torneos_concluidos()
    {
        $userId = $this->userLog()['id'];
        $fechaActual = \Carbon\Carbon::now();

        $torneosConcluidos = UserModel::find($userId)
        ->torneos()
        ->where('fecha_fin', '<', $fechaActual)
        ->get();

        return view('users.acciones.users-torneos-concluidos', compact('torneosConcluidos'));
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
