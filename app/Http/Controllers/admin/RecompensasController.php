<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;

use Illuminate\Http\Request;

class RecompensasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    public function showListado()
    {
        $recompensas = RecompensasModel::all();
        $totalQuantity = $recompensas->sum('cantidad');
        return view('admin.crud.recompensas', compact('recompensas', 'totalQuantity'));
    }
}
