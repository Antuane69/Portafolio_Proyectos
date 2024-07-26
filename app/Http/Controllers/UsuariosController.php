<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UsuariosController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario',
            'email' => 'required|unique:usuarios,email',
            'password' => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'password_confirmation' => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
        ]);

        if($request->password == $request->password_confirmation){
            Usuarios::create([
                'nombre_usuario' => $request->nombre_usuario,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->withErrors(['password' => 'The Password Validation is Incorrect.'])->withInput();
        }
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $usuario = Usuarios::where('email',$request->email)->first();
        
        if($usuario){
            if($usuario->password == bcrypt($request->password)){
                dd('epene');
                return redirect()->route('dashboard')->with('success', 'Bienvenido');
            }else{
                dd('p[ussi');
                return redirect()->route('dashboard')->with('reject', 'Claves Incorrectas');
            }
        }else{
            return redirect()->route('dashboard')->with('reject', 'Claves Incorrectas');
        }
    }
}
