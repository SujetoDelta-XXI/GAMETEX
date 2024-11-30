<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TorneosModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class Torneos_UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }

    public function index()
    {
        $fechaActual = \Carbon\Carbon::now();

        $torneosConcluidos = TorneosModel::where('fecha_fin', '<', $fechaActual)->get();
        $torneosActivos = TorneosModel::where('fecha_fin', '>=', $fechaActual)->get();

        return view('users.acciones.users-torneos', compact('torneosConcluidos', 'torneosActivos'));
    }
}
