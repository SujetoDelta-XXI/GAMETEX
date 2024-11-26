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
    public function create() 
    { 
        $moderadores = ModerModel::all();  
        return view('admin.crud.eventoCreate', compact('moderadores'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'reglas' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'evento_tipo_nombre' => 'required|string|max:50',
            'moderador_id' => 'required|exists:moders,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('', 'eventos');
        }

        $evento = new eventosTipoModel();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->categoria = $request->categoria;
        $evento->reglas = $request->reglas;
        $evento->imagen = $rutaImagen;
        $evento->save();

        return redirect()->route('admin.crud.evento');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type');
        $eventos = eventosModel::search($search, $searchType)->paginate(10);
        
        return view('evento.search', compact('eventos'));
    }
    public function deleteEventos($id)
    {
        $evento = eventosModel::findOrFail($id);
        $evento->delete();

        return redirect()->route('evento.delete');
    }

    public function editEventos($id)
    {
        $evento = eventosModel::find($id);
        $moderadores = ModerModel::all();

        return view('evento-edit', compact('evento', 'moderadores'));
    }

    public function updateEventos(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'moderador_id' => 'required|exists:moderadores,id',
            'evento_tipo_nombre' => 'required|string|max:50',
            'descripcion_tipo' => 'required|string',
            'categoria_tipo' => 'required|string',
            'reglas_tipo' => 'required|string|max:255',
        ]);
        eventosModel::updateEvent($id, $validatedData);
        return redirect()->route('admin.dinamicas.eventos')->with('success', 'Evento actualizado');
    }


}
