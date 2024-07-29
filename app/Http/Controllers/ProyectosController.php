<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function cotizacion_store(Request $request){
        Proyectos::create([
            'nombre_empresa' => $request->nombre_empresa,
            'nombre_usuario' => $request->nombre_usuario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'comentarios' => $request->comentarios,
        ]);

        // mandar correo
        return redirect()->back();
    }
}
