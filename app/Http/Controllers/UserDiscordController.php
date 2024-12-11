<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TorneosHasUsuariosModel;
use App\Models\TorneosModel;
class UserDiscordController extends Controller
{
    public function setDiscord(Request $request, $id)
    {
        $request->validate([
            'password' => ['required'],
        ]);
    
        // Verificar la contraseña del usuario
        if (!Hash::check($request->password, Auth()->guard('user')->user()->password)) {
            return back()->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    
        $usuario = Auth()->guard('user')->user();
    
        // Actualizar el campo Discord del usuario
        $usuario->discord = $request->input('discord');
        $usuario->save();
    
        // Verificar si el usuario ya está en la tabla intermedia
        $registroExistente = TorneosHasUsuariosModel::where('usuario_id', $usuario->id)
            ->where('torneo_id', $id)
            ->exists();
    
        if ($registroExistente) {
            // Si ya está registrado, redirigir al usuario
            return redirect()->route('torneos-equipos', $id)->with('status', 'Ya estás registrado en este torneo.');
        }
    
        // Obtener el torneo y un equipo disponible
        $torneo = TorneosModel::find($id);
    
        if (!$torneo) {
            return back()->withErrors(['torneo' => 'El torneo no existe.']);
        }
    
        $equipoDisponible = $torneo->equipos->filter(function ($equipo) {
            return !$equipo->estaLleno();
        })->first();
    
        if (!$equipoDisponible) {
            return back()->withErrors(['equipo' => 'No hay equipos disponibles en este torneo.']);
        }
    
        // Agregar al usuario en la tabla intermedia
        TorneosHasUsuariosModel::create([
            'torneo_id' => $id,
            'usuario_id' => $usuario->id,
            'equipo_id' => $equipoDisponible->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('torneos-equipos', $id)->with('status', 'Te has registrado exitosamente en el torneo.');
    }
    
}



