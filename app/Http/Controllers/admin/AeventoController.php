<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\eventosModel;
use App\Models\ModerModel;
use App\Models\recompensasTipoModel;
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
        $recompensasTipos = recompensasTipoModel::all(); // Obtener todos los tipos de recompensas
        return view('admin.crud.eventoCreate', compact('moderadores', 'recompensasTipos'));
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
            'recompensa_tipo_id' => 'required|exists:recompensas_tipo,id', // Validar que el tipo de recompensa existe
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Manejar la carga de la imagen
        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('', 'eventos');
        }

        // Crear el evento tipo
        $eventoTipo = new eventosTipoModel();
        $eventoTipo->nombre = $request->nombre;
        $eventoTipo->descripcion = $request->descripcion;
        $eventoTipo->categoria = $request->categoria;
        $eventoTipo->reglas = $request->reglas;
        $eventoTipo->imagen = $rutaImagen;
        $eventoTipo->save();

        // Restar la cantidad de recompensa seleccionada
        $recompensa = recompensasTipoModel::find($request->recompensa_tipo_id);
        $recompensa->cantidad -= 1;
        $recompensa->save();

        // Crear el evento
        $evento = new eventosModel();
        $evento->fecha_inicio = $request->fecha_inicio;
        $evento->fecha_fin = $request->fecha_fin;
        $evento->evento_tipo_id = $eventoTipo->id; // Relacionar con el evento tipo
        $evento->moderador_id = $request->moderador_id;
        $evento->recompensa_tipo_id = $request->recompensa_tipo_id; // Asignar el tipo de recompensa
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