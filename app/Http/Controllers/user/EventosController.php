<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user'); 
    }

    public function index()
    {
        return view('users.acciones.users-eventos');
    }
}
