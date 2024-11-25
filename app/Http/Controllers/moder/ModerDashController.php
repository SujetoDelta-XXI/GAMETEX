<?php

namespace App\Http\Controllers\moder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModerDashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.moder'); 
    }

    public function index()
    {
        return view('moder.dashboard');
    }
}
