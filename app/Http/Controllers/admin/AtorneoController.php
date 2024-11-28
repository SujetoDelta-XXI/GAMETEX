<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ModerModel;
use App\Models\recompensasTipoModel;
use App\Models\torneoJuegoModel;
use App\Models\torneoModel;
use Illuminate\Http\Request;

class AtorneoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin'); 
    }

    public function show()
    {
        $torneos = TorneoModel::with(['torneoJuego', 'moderador', 'recompensas'])->paginate(10);
        return view('admin.crud.torneo', compact('torneos'));
    }

    public function create()
    {
        $moderadores = ModerModel::all();
        $recompensasTipos = RecompensasTipoModel::all();
        $juegos = TorneoJuegoModel::all();
        $administrador = Auth::user(); // Obtener el usuario actual

        return view('admin.crud.torneoCreate', compact('moderadores', 'recompensasTipos', 'juegos', 'administrador'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'entrada' => 'required|integer',
            'exp' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'torneo_juego_id' => 'required|exists:torneos_juegos,id',
            'recompensas_cantidad' => 'required|integer|min:1|max:5', // Validar que la cantidad esté entre 1 y 5
            'moderador_id' => 'required|exists:moders,id',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_torneos', 'public');
        }

        // Restar la cantidad de recompensa seleccionada
        $recompensa = RecompensasTipoModel::first(); // Aquí asumimos que se usa un tipo de recompensa predeterminado
        $recompensa->cantidad -= $request->recompensas_cantidad;
        $recompensa->save();

        $torneo = new TorneoModel();
        $torneo->nombre = $request->nombre;
        $torneo->fecha_inicio = $request->fecha_inicio;
        $torneo->fecha_fin = $request->fecha_fin;
        $torneo->entrada = $request->entrada;
        $torneo->exp = $request->exp;
        $torneo->descripcion = $request->descripcion;
        $torneo->imagen = $rutaImagen;
        $torneo->torneo_juego_id = $request->torneo_juego_id;
        $torneo->recompensas_id = $recompensa->id; // Asignar la recompensa
        $torneo->moderador_id = $request->moderador_id;
        $torneo->administrador_id = $request->user()->id; // Asignar el usuario actual como administrador
        $torneo->save();

        return redirect()->route('admin.crud.torneo');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type');
        $torneos = TorneoModel::when($search, function ($query, $search) use ($searchType) {
            if ($searchType == 'nombre') {
                return $query->where('nombre', 'like', "%$search%");
            } elseif ($searchType == 'juego') {
                return $query->whereHas('torneoJuego', function ($query) use ($search) {
                    $query->where('nombre', 'like', "%$search%");
                });
            }
        })->paginate(10);

        return view('admin.crud.torneo', compact('torneos'));
    }

    public function deleteTorneos($id)
    {
        $torneo = TorneoModel::findOrFail($id);
        $torneo->delete();

        return redirect()->route('admin.crud.torneo');
    }

    public function editTorneos($id)
    {
        $torneo = TorneoModel::find($id);
        $moderadores = ModerModel::all();
        $recompensasTipos = RecompensasTipoModel::all();
        $administrador = Auth::user();

        return view('admin.crud.torneo-edit', compact('torneo', 'moderadores', 'recompensasTipos', 'administrador'));
    }

    public function updateTorneos(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'entrada' => 'required|integer',
            'exp' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'torneo_juego_id' => 'required|exists:torneos_juegos,id',
            'recompensas_cantidad' => 'required|integer|min:1|max:5', // Validar que la cantidad esté entre 1 y 5
            'moderador_id' => 'required|exists:moders,id',
        ]);

        $torneo = TorneoModel::findOrFail($id);
        $torneo->fill($validatedData);

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_torneos', 'public');
            $torneo->imagen = $rutaImagen;
        }

        // Restar la cantidad de recompensa seleccionada (opcional en actualización)
        $recompensa = RecompensasTipoModel::first();
        if ($recompensa) {
            $recompensa->cantidad -= $request->recompensas_cantidad;
            $recompensa->save();
            $torneo->recompensas_id = $recompensa->id;
        }

        $torneo->save();

        return redirect()->route('admin.crud.torneo')->with('success', 'Torneo actualizado');
    }
}
