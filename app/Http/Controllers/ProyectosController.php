<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\ProyectosPixel;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function proyectos(){
        $proyectos = ProyectosPixel::all();

        return view('proyectos',[
            'proyectos' => $proyectos
        ]);
    }

    public function cotizacion_store(Request $request){
        Proyectos::create([
            'nombre_empresa' => $request->nombre_empresa,
            'nombre_usuario' => $request->nombre_usuario,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->back();
    }

    public function crear_solicitud(){
        $respuestas = ['Si','No'];
        return view('proyectos.crearSolicitud',[
            'respuestas' => $respuestas
        ]);
    }
}
