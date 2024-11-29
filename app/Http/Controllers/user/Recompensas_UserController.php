<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class Recompensas_UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user'); 
    }

    public function index()
    {
        $recompensas = RecompensasModel::all();
        return view('users.acciones.users-recompensas', compact('recompensas'));
    }
}
