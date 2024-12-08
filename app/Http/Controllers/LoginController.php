<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserModel;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        
        $this->showLoadingScreen();
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        if (Auth::guard('moder')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/moder/dashboard');
        }

        if (Auth::guard('user')->attempt( $credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended(route('dashboard'));
        }
        $this->hideLoadingScreen();
        
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->except('password'));

    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('moder')->check()) {
            Auth::guard('moder')->logout();
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }




    //Esta funcion es solo para desarrollo (DEV)
    public function loginFazt(Request $request, $id)
    {
        $user = UserModel::find($id);
        if ($user) {
            Auth::guard('user')->login($user);
            $request->session()->regenerate();
            return redirect()->intended('users-torneos');
        }

        
    }
}
