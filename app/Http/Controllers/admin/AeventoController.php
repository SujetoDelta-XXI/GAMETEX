<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\eventosModel;
use App\Models\ModerModel;
use App\Models\eventosTipoModel;
use Illuminate\Http\Request;

class AeventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    
    public function show()
    {
        $eventos = eventosModel::with(['eventosTipo', 'moderador'])->paginate(10);
        
        return view('admin.crud.evento', compact('eventos'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type');
        $eventos = eventosModel::search($search, $searchType)->paginate(10);
        
        return view('admin.crud.evento', compact('eventos'));
    }
}
