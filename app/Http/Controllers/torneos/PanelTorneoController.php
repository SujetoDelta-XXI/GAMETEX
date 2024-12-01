<?php

namespace App\Http\Controllers\torneos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class PanelTorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }

    public function index()
    {
        return view('torneos.dashboard');
    }

    public function descripcion()
    {
        return view('torneos.panel.descripcion');
    }

    public function partidas()
    {
        return view('torneos.panel.partidas');
    }

    public function equipo()
    {
        return view('torneos.panel.equipo');
    }
}
