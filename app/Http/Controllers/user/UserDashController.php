<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $usuarios = a::all();  
        return view('admin.crud.eventoCreate', compact('moderadores', 'recompensasTipos'));
        return view('profile.show');
    }
}
