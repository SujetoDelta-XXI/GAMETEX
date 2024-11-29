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
        $torneos = TorneosModel::all();
        return view('users.acciones.users-torneos', compact('torneos'));
    }
}
