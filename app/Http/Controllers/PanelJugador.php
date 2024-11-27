<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelJugador extends Controller
{
    public function show(){

    }
    public function index(){
        return view('torneos.index');
    }
}
