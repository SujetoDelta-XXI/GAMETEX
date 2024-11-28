<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use App\Models\recompensasTipoModel;
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
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'recompensa_tipo_id' => 'required|exists:recompensas_tipo,id',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $recompensa = new RecompensasModel();
        $recompensa->nombre = $request->nombre;
        $recompensa->recompensa_tipo_id = $request->recompensa_tipo_id;
        $recompensa->cantidad = $request->cantidad;
        $recompensa->precio = $request->precio;
        $recompensa->save();

        return redirect()->route('admin.crud.recompensas');
    }
}
