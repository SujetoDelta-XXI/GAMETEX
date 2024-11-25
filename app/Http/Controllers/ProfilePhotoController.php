<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ModerModel;


class ProfilePhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'auth:moder', 'auth:user']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'max:2048'] // 2MB Max
        ]);

        try {
            $user = $this->getAuthenticatedUser();
            $guard = $this->getCurrentGuard();

            // Procesar y guardar la imagen
            $image = $request->file('photo');
            $filename = $this->saveImage($image, $guard);

            // Actualizar el modelo del usuario
            $user->profile_photo_path = $filename;
            $user->save();

            return response()->json([
                'message' => 'Foto de perfil actualizada correctamente',
                'path' => Storage::url($filename)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al subir la imagen: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy()
    {
        $user = $this->getAuthenticatedUser();

        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return response()->json(['message' => 'Foto de perfil eliminada']);
    }

    public function show()
    {
        $user = $this->getAuthenticatedUser();

        if (!$user->profile_photo_path) {
            return view('profile.show', ['message' => 'No hay foto de perfil']);
        }

        return view('profile.show', [
            'url' => Storage::url($user->profile_photo_path),
            'user' => $user
        ]);
    }


    private function saveImage($image, $guard)
    {
        // Crear un nombre único para la imagen
        $filename = $guard . '/' . Str::uuid() . '.' . $image->getClientOriginalExtension();

        // Guardar la imagen
        Storage::putFileAs('public/profile-photos', $image, $filename);

        return 'profile-photos/' . $filename;
    }

    private function getAuthenticatedUser()
    {
        if (Auth::guard('admin')->check()) {
            return Auth::guard('admin')->user();
        }
        if (Auth::guard('moder')->check()) {
            return Auth::guard('moder')->user();
        }
        return Auth::guard('user')->user();
    }

    private function getCurrentGuard()
    {
        if (Auth::guard('admin')->check()) return 'admin';
        if (Auth::guard('moder')->check()) return 'moder';
        return 'user';
    }
}
