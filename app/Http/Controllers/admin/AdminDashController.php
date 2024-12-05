<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    public function index()
    {   $this->showLoadingScreen();
        $this->hideLoadingScreen();
        $usuarios = UserModel::paginate(10);
        return view('admin.crud.usuarios', compact('usuarios'));
    }
}
