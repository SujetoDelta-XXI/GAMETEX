<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\eventosModel;
use App\Models\ModerModel;
use App\Models\RecompensasTipoModel;
use App\Models\eventosTipoModel;
use App\Models\RecompensasModel;
use Illuminate\Http\Request;

class AeventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    public function show()
    {
        $eventos = eventosModel::with(['eventosTipo', 'moderador'])->paginate(4);
        return view('admin.crud.evento', compact('eventos'));
    }

    public function create()
    {
        $moderadores = ModerModel::all();
        $recompensas = RecompensasModel::all();

        return view('admin.crud.eventoCreate', compact('moderadores', 'recompensas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'reglas' => 'required|string',
            'fecha_inicio' => 'required|date_format:Y-m-d\TH:i',
            'fecha_fin' => 'required|date_format:Y-m-d\TH:i',
            'moderador_id' => 'required|exists:moders,id',
            'recompensa_id' => 'required|exists:recompensas,id',
            'recompensas_cantidad' => 'required|integer|min:1|max:5',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_eventos', 'public');
        }

        $recompensa = RecompensasModel::find($request->recompensa_id);
        if ($recompensa && $request->recompensas_cantidad > 0) {
            $recompensa->cantidad -= $request->recompensas_cantidad;
            $recompensa->save();
        }

        $evento = new eventosModel();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->reglas = $request->reglas;
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->imagen = $rutaImagen;
        $evento->moderador_id = $request->moderador_id;
        $evento->recompensa_id = $request->recompensa_id;
        $evento->save();

        return redirect()->route('admin.crud.evento')->with('success', 'Evento creado exitosamente.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type');
        $eventos = eventosModel::when($search, function ($query, $search) use ($searchType) {
            if ($searchType == 'nombre') {
                return $query->where('nombre', 'like', "%$search%");
            } elseif ($searchType == 'moderador') {
                return $query->whereHas('moderador', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                });
            }
        })->paginate(10);
        
        return view('admin.crud.evento', compact('eventos'));
    }

    public function deleteEventos($id)
    {
        $evento = eventosModel::findOrFail($id);
        $evento->delete();

        return redirect()->route('admin.crud.evento');
    }

    public function editEventos($id)
    {
        $evento = eventosModel::find($id);
        $moderadores = ModerModel::all();

        return view('admin.crud.eventoEdit', compact('evento', 'moderadores'));
    }

    public function updateEventos(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'moderador_id' => 'required|exists:moders,id',
            'evento_tipo_nombre' => 'required|string|max:50',
            'descripcion_tipo' => 'required|string',
            'categoria_tipo' => 'required|string',
            'reglas_tipo' => 'required|string|max:255',
        ]);
        eventosModel::findOrFail($id)->update($validatedData);
        return redirect()->route('admin.crud.evento')->with('success', 'Evento actualizado');
    }


}
