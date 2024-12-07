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
        $recompensas = RecompensasModel::all();
        $juegos = TorneosJuegoModel::all();

        return view('admin.crud.torneoCreate', compact('moderadores', 'administradores', 'recompensas', 'juegos'));
    }

    // Método para manejar el almacenamiento de datos
    public function store(Request $request)
    {
        // Validar la solicitud
        $this->validateRequest($request);

        // Crear una nueva instancia de Torneo
        $torneo = new TorneosModel();
        $this->assignTorneoAttributes($torneo, $request);
        
        // Guardar el torneo
        $torneo->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.crud.torneo')->with('success', 'Torneo creado exitosamente');
    }

    // Método para validar la solicitud
    private function validateRequest($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'moderator' => 'nullable|integer|exists:moders,id',  // Permitir que moderador sea opcional
            'administrator' => 'required|integer|exists:admins,id',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reward' => 'required|integer|exists:recompensas,id',
            'game' => 'required|integer|exists:torneos_juegos,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
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
