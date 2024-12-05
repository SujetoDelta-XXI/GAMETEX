<?php

namespace App\Http\Controllers;
use App\Models\TorneosModel;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function index()
    {
        $torneos = TorneosModel::all();
        return view('torneos.index', compact('torneos'));
    }

    public function register()
    {
        $this->middleware('auth.user'); 
        return view('torneos.register_torneos');
    }
}
