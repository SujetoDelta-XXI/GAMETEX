<?php

namespace App\Http\Controllers\eventos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class PanelEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user'); 
    }

    public function detalle()
    {
        return view('eventos.panel.detalle');
    }

    public function ranking()
    {
        return view('eventos.panel.ranking');
    }
}