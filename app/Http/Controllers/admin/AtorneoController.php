<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use App\Models\ModerModel;
use App\Models\RecompensasModel;
use App\Models\RecompensasTipoModel;
use App\Models\TorneosJuegoModel;
use App\Models\torneoModel;
use App\Models\TorneosModel;
use Illuminate\Http\Request;
use Discord\Discord;

class AtorneoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show()
    {
        $torneos = TorneoModel::with(['torneoJuego', 'moderador', 'recompensas'])->paginate(5);
        return view('admin.crud.torneo', compact('torneos'));
    }

    public function create()
    {
        $moderadores = ModerModel::all();
        $administradores = AdminModel::all();
        $juegos = TorneosJuegoModel::all();
        $recompensas = RecompensasModel::with('tipo')->get()->unique('tipo.nombre');
    
        return view('admin.crud.torneoCreate', compact('moderadores', 'administradores', 'juegos', 'recompensas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'moderador' => 'required|exists:moders,id',
            'administrador' => 'required|exists:admins,id',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'recompensas_id' => 'required|exists:recompensas,id', // Cambio aquí
            'juego' => 'required|exists:torneos_juegos,id',
            'reglas' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Crear el nuevo torneo
        $torneo = new TorneosModel();
        $torneo->nombre = $request->nombre;
        $torneo->moderador_id = $request->moderador;
        $torneo->administrador_id = $request->administrador;
        $torneo->descripcion = $request->descripcion;
        $torneo->fecha_inicio = $request->fecha_inicio;
        $torneo->fecha_fin = $request->fecha_fin;
        $torneo->recompensas_id = $request->recompensas_id; // Cambio aquí
        $torneo->torneo_juego_id = $request->juego;
        $torneo->reglas = $request->reglas;

        // Guardar la imagen de fondo si se ha cargado una
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->extension();
            $imagen->move(public_path('images'), $nombreImagen);
            $torneo->imagen = $nombreImagen;
        }

        $torneo->save();

        return redirect()->route('admin.crud.torneo')->with('success', 'Torneo creado exitosamente.');
    }

    // Método para asignar atributos al modelo de Torneo
    private function assignTorneoAttributes($torneo, $request)
    {
        $torneo->nombre = $request->name;
        $torneo->moderador_id = $request->moderator ?? null;  // Asignar null si no se proporciona
        $torneo->administrador_id = $request->administrator;
        $torneo->descripcion = $request->description;
        $torneo->fecha_inicio = $request->start_date;
        $torneo->fecha_fin = $request->end_date;
        $torneo->recompensas_id = $request->reward;
        $torneo->torneo_juego_id = $request->game;

        // Asumimos que el campo 'entrada' es null por defecto
        $torneo->entrada = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/eventos');
            $torneo->imagen = $imagePath;
        } else {
            $torneo->imagen = null;
        }
    }




    private function crearCanalDiscord(TorneoModel $torneo)
    {
        $discord = new Discord([
            'token' => env('DISCORD_BOT_TOKEN'), // Carga el token desde .env
        ]);

        $discord->on('ready', function ($discord) use ($torneo) {
            // ID del servidor donde se creará el canal (reemplaza con tu ID de servidor)
            $guildId = '1314002945628704800'; // Asegúrate de obtener el ID de tu servidor

            // Obtener el servidor (guild)
            $guild = $discord->guilds->get('id', $guildId);

            if ($guild) {
                // Crear el canal con el nombre del torneo
                $guild->channels->create([
                    'name' => $torneo->nombre, // Nombre del canal con el nombre del torneo
                    'type' => 0, // 0 para canal de texto, 2 para canal de voz
                ])->done(function ($channel) use ($torneo) {
                    // Imprimir en consola (o realizar otras acciones)
                    echo "Canal '{$torneo->nombre}' creado en Discord con ID: {$channel->id}" . PHP_EOL;
                }, function ($e) {
                    echo "Error al crear el canal: {$e->getMessage()}" . PHP_EOL;
                });
            } else {
                echo "No se encontró el servidor con ID {$guildId}" . PHP_EOL;
            }
        });

        $discord->run();
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
        $recompensasTipos = RecompensasTipoModel::all();

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

        $recompensa = RecompensasTipoModel::find($request->recompensas_tipo_id);
        if ($recompensa) {
            $recompensa->cantidad -= $request->recompensas_cantidad;
            $recompensa->save();
            $torneo->recompensas_id = $recompensa->id;
        }

        $torneo->save();

        return redirect()->route('admin.crud.torneo')->with('success', 'Torneo actualizado exitosamente.');
    }
}
