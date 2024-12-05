<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function showListado()
    {
        $usuarios = UserModel::paginate(10);
        return view('admin.crud.usuarios', compact('usuarios'));
    }

    
}
