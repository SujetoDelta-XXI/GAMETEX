<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\ModerModel;
use App\Models\recompensasTipoModel;
use App\Models\TorneosJuegoModel;
use App\Models\torneoModel;
use Illuminate\Http\Request;

class AtorneoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }

    public function show()
    {
        $torneos = TorneoModel::with(['torneoJuego', 'moderador', 'recompensas'])->paginate(10);
        return view('admin.crud.torneo', compact('torneos'));
    }

    public function create()
    {
        $moderadores = ModerModel::all();
        $recompensasTipos = recompensasTipoModel::all();
        $juegos = TorneosJuegoModel::all();

        return view('admin.crud.torneoCreate', compact('moderadores', 'recompensasTipos', 'juegos'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'entrada' => 'required|string',
                'exp' => 'required|string',
                'descripcion' => 'required|string',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'torneo_juego_id' => 'required|exists:torneos_juegos,id',
                'recompensas_tipo_id' => 'required|exists:recompensas_tipo,id',
                'recompensas_cantidad' => 'required|integer|min:1|max:5',
                'moderador_id' => 'required|exists:moders,id',
            ]);
    
            $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $rutaImagen = $request->file('imagen')->store('imagenes_torneos', 'public');
            }
    
            $recompensa = recompensasTipoModel::find($request->recompensas_tipo_id);
            if ($recompensa) {
                $recompensa->cantidad -= $request->recompensas_cantidad;
                $recompensa->save();
            }
    
            $torneo = new TorneoModel();
            $torneo->nombre = $request->nombre;
            $torneo->fecha_inicio = $request->fecha_inicio;
            $torneo->fecha_fin = $request->fecha_fin;
            $torneo->entrada = $request->entrada;
            $torneo->exp = $request->exp;
            $torneo->descripcion = $request->descripcion;
            $torneo->imagen = $rutaImagen;
            $torneo->torneo_juego_id = $request->torneo_juego_id;
            $torneo->recompensas_id = $recompensa->id;
            $torneo->moderador_id = $request->moderador_id;
            $torneo->save();
    
            return redirect()->route('admin.crud.torneo')->with('success', 'Torneo creado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
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
        })->paginate(4);

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
        $recompensasTipos = recompensasTipoModel::all();

        return view('admin.crud.torneoEdit', compact('torneo', 'moderadores', 'recompensasTipos'));
    }

    public function updateTorneos(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'entrada' => 'required|string',
            'exp' => 'required|string',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'torneo_juego_id' => 'required|exists:torneos_juegos,id',
            'recompensas_tipo_id' => 'required|exists:recompensas_tipo,id',
            'recompensas_cantidad' => 'required|integer|min:1|max:5',
            'moderador_id' => 'required|exists:moders,id',
        ]);

        $torneo = TorneoModel::findOrFail($id);
        $torneo->fill($validatedData);

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('imagenes_torneos', 'public');
            $torneo->imagen = $rutaImagen;
        }

        $recompensa = recompensasTipoModel::find($request->recompensas_tipo_id);
        if ($recompensa) {
            $recompensa->cantidad -= $request->recompensas_cantidad;
            $recompensa->save();
            $torneo->recompensas_id = $recompensa->id;
        }

        $torneo->save();

        return redirect()->route('admin.crud.torneo')->with('success', 'Torneo actualizado exitosamente.');
    }
}
