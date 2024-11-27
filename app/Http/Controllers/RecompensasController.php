<?php

namespace App\Http\Controllers;
use App\Models\RecompensasModel;
use Illuminate\Http\Request;

class RecompensasController extends Controller
{
    public function showListado(){
        $recompensas = RecompensasModel::all();
        return view('recompensas', compact('recompensas'));

    }
}
