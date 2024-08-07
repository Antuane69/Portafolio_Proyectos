<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Usuarios;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class UsuariosController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'nombre_usuario' => [
                'required',
                'max:20',
                Rule::unique('usuarios', 'nombre_usuario')->whereNull('deleted_at')
            ],
            'email_register' => [
                'required',
                Rule::unique('usuarios', 'email')->whereNull('deleted_at')
            ],
            'password_register' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'password_confirmation' => 'required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
        ]);

        if($request->password_register == $request->password_confirmation){
            Usuarios::create([
                'nombre_usuario' => $request->nombre_usuario,
                'email' => $request->email_register,
                'password' => bcrypt($request->password_register),
            ]);

            $credentials = [
                'email' => $request->email_register,
                'password' => $request->password_register,
            ];
            
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard')->with('success', 'Bienvenido');
            } else {
                return back()->withErrors([
                    'email' => 'Las credenciales no son correctas.',
                ]);
            }

        }else{
            return redirect()->back()->withErrors(['password' => 'The Password Validation is Incorrect.'])->withInput();
        }
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Bienvenido');
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales no son correctas.',
            ]);
        }
    }

    public function profile($nombre){
        $usuario = Usuarios::where('nombre_usuario',$nombre)->first();
        
        return view('usuarios.mostrarUsuario',[
            'usuario' => $usuario
        ]);
    }

    public function profile_save(Request $request, $id){
        $this->validate($request, [
            'nombre_usuario' => [
                'max:20',
                Rule::unique('usuarios', 'nombre_usuario')->whereNull('deleted_at')
            ]
        ]);

        $ruta = public_path() . '/img/profile-pictures';
        $usuario = Usuarios::find($id);

        if ($request->hasFile('imagen_perfil')) {
            $archivo = $request->file('imagen_perfil');
            $imagen_perfil = 'perfil_' . $request->nombre_usuario . "." . $archivo->getClientOriginalExtension();
            $archivo->move($ruta,$imagen_perfil);
            $usuario->imagen_perfil = $imagen_perfil;  
        }

        $usuario->nombre = $request->nombre; 
        $usuario->apellido_materno = $request->apellido_materno; 
        $usuario->apellido_paterno = $request->apellido_paterno; 
        $usuario->telefono = $request->telefono; 
        $usuario->ubicacion = $request->ubicacion; 
        $usuario->nombre_empresa = $request->nombre_empresa; 
        $usuario->nombre_usuario = $request->nombre_usuario;  

        $usuario->save();

        return redirect()->route('perfil',$usuario->nombre_usuario);
    }

    public function profile_delete(Request $request, $id){
        $usuario = Usuarios::find($id);

        if (Hash::check($request->password, $usuario->password)) {
            if($request->password == $request->password_confirmation){
                $solicitudes = Solicitudes::where('nombre_usuario',$usuario->nombre_usuario)->get();
                foreach ($solicitudes as $solicitud) {
                    $archivos = Upload::where('solicitud_id',$solicitud->id)->get();
                    foreach ($archivos as $archivo) {
                        Storage::delete($archivo->ubicacion);
                        $archivo->delete();
                    }
                    $solicitud->delete();
                }
                $usuario->delete();
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->withErrors(['password' => 'The Password Validation is Incorrect.'])->withInput();
            }
        } else {
            return back()->withErrors([
                'password' => 'Las credenciales no son correctas.',
            ]);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $existingUser = Usuarios::where('email', $user->getEmail())->first();

        $fullName = $user->getName();
        $nameParts = explode(' ', $fullName);
    
        $firstName = $nameParts[0];
        $middleName = isset($nameParts[2]) ? $nameParts[1] : '';
        $lastName = end($nameParts);

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $usuario = Usuarios::create([
                'nombre_usuario' => $firstName,
                'nombre' => $firstName,
                'apellido_paterno' => $middleName,
                'apellido_materno' => $lastName,
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => ""
            ]);

            Auth::login($usuario);
        }

        return redirect()->intended('dashboard');
    }

    public function profile_password(Request $request){

        $request->validate([
            'new_password' => 'confirmed|required|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
        ], [
            'new_password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = Auth::user();
        if($request->current_password){
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('success', 'La contraseña actual no es válida.');
            }
        }
        
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('perfil',$user->nombre_usuario)->with('success', 'Contraseña Cambiada Exitosamente.');

    }
}
