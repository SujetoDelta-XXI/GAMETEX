<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function index()
    {
        return view('torneos.index');
    }
}
