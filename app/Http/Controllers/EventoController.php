<?php

namespace App\Http\Controllers;

use App\Models\TorneosModel;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function register()
    {
        $this->middleware('auth.user');
        return view('eventos.register-event');
    }
}
