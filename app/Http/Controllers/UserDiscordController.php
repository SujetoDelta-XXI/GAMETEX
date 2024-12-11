<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDiscordController extends Controller
{
    public function  setDiscord (Request $request, $id){
        $request->validate([
            'password' => ['required'],
        ]);

        // Verificar la contraseña del usuario
        if (!Hash::check($request->password, Auth()->guard('user')->user()->password)) {
            return back()->withErrors(['password' => 'La contraseña es incorrecta.']);
        }

        $usuario = Auth()->guard('user')->user();
        $usuario->discord = $request->input('discord');
        $usuario->save();
        return redirect()->route('torneos-equipos', $id);
    }
}
