<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserDashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user'); 
    }

    public function index()
    {
        $actividades = []; 
        return view('dashboard', compact('actividades'));
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
