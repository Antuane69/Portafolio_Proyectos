<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function cambiar_contraseña(){
        return view('usuario.cambiarContraseña');
    }

    public function guardar_contraseña(Request $request){
        
        $request->validate([
            'contraseña_actual' => 'required',
            'contraseña_nueva' => 'required|string|min:8|confirmed',
        ], [
            'contraseña_nueva.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = Auth::user();
        
        if (!Hash::check($request->contraseña_actual, $user->password)) {
            return back()->with('error', 'La contraseña actual no es válida.');
        }
        
        $user->password = bcrypt($request->contraseña_nueva);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Contraseña cambiada exitosamente.');
    }
}
