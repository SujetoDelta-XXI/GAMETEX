<?php


namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\RecompensasModel;
use App\Models\RecompensasTipoModel;
use Illuminate\Http\Request;

class RecompensasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    public function showListado(Request $request)
    {
        $recompensas = RecompensasModel::all();
        $totalQuantity = $recompensas->sum('cantidad');
        $recompensasTipos = RecompensasTipoModel::all();
        return view('admin.crud.recompensas', compact('recompensas', 'totalQuantity', 'recompensasTipos'));
    }
    
    public function create()
    {
        $recompensasTipos = RecompensasTipoModel::all();
        return view('admin.crud.recompensaCreate', compact('recompensasTipos'));
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

        return redirect()->route('admin.crud.recompensas')->with('success', 'Recompensa creada exitosamente.');
    }

  
    public function edit($id)
    {
        $recompensa = RecompensasModel::with('tipo')->find($id);
        $recompensasTipos = RecompensasTipoModel::all(); 

        if (!$recompensa) {
            return redirect()->route('admin.crud.recompensas')->with('error', 'Recompensa no encontrada.');
        }

        return view('admin.crud.recompensasEdit', compact('recompensa', 'recompensasTipos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'recompensa_tipo_id' => 'required|exists:recompensas_tipo,id',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $recompensa = RecompensasModel::find($id);

        if (!$recompensa) {
            return redirect()->route('admin.crud.recompensas')->with('error', 'Recompensa no encontrada.');
        }

        $recompensa->nombre = $request->nombre;
        $recompensa->recompensa_tipo_id = $request->recompensa_tipo_id;
        $recompensa->cantidad = $request->cantidad;
        $recompensa->precio = $request->precio;
        $recompensa->save();

        return redirect()->route('admin.crud.recompensas')->with('success', 'Recompensa actualizada exitosamente.');
    }

    public function delete($id)
    {
        $recompensa = RecompensasModel::find($id);

        if (!$recompensa) {
            return redirect()->route('admin.crud.recompensas')->with('error', 'Recompensa no encontrada.');
        }

        $recompensa->delete();
        return redirect()->route('admin.crud.recompensas')->with('success', 'Recompensa eliminada exitosamente.');
    }

}