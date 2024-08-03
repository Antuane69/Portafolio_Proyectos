<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use App\Models\ProyectosPixel;
use App\Models\Solicitudes;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use PDO;

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

    public function crear_solicitud($id = null){
        if($id){
            $solicitud = Solicitudes::with('Evidencias')->find($id);
        }else{
            $solicitud = new Solicitudes();
        }
        $respuestas = ['Si','No'];
        return view('proyectos.crearSolicitud',[
            'respuestas' => $respuestas,
            'solicitud' => $solicitud
        ]);
    }

    public function guardar_solicitud(Request $request){

        Solicitudes::create([
            'nombre' => $request->nombre,
            'adaptable' => $request->adaptable,
            'archivos' => $request->archivos,
            'commerce' => $request->commerce,
            'pagos' => $request->pagos,
            'servidor' => $request->servidor,
            'usuarios' => $request->usuarios,
            'requerimientos' => $request->requerimientos,
            'nombre_usuario' => auth()->user()->nombre_usuario,
        ]);

        $nombre = auth()->user()->nombre_usuario;

        return redirect()->route('proyectos.mostrarSolicitudesPendientes',[
            'nombre' => $nombre
        ])->with('success', 'Solicitud Registrada Con éxito');
    }

    public function solicitudes_pendientes(){
        $solicitudes = Solicitudes::where('nombre_usuario',auth()->user()->nombre_usuario)->get();

        return view('proyectos.mostrarSolicitudesPendientes',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function eliminar_solicitud($id){
        Solicitudes::find($id)->delete();

        return redirect()->route('proyectos.mostrarSolicitudesPendientes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Eliminada Con éxito');
    }
}
