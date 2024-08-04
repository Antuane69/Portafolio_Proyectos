<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Upload;
use App\Models\Usuarios;
use App\Models\Proyectos;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Models\ProyectosPixel;
use Illuminate\Support\Facades\Storage;

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

    public function solicitudes_pendientes($nombre){
        if(auth()->user()->hasRole('admin')){
            $solicitudes = Solicitudes::where('estatus','Sin Atender')->orderBy('created_at', 'asc')->get();
        }else{
            $solicitudes = Solicitudes::where('estatus','Sin Atender')->orderBy('created_at', 'desc')->where('nombre_usuario',$nombre)->get();
        }

        return view('proyectos.mostrarSolicitudesPendientes',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function solicitudes($nombre){
        if(auth()->user()->hasRole('admin')){
            $solicitudes = Solicitudes::where('estatus','En Proceso')->orderBy('created_at', 'asc')->get();
        }else{
            $solicitudes = Solicitudes::where('estatus','En Proceso')->orderBy('created_at', 'desc')->where('nombre_usuario',$nombre)->get();
        }

        return view('proyectos.mostrarSolicitudes',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function eliminar_solicitud($id){
        $archivos = Upload::where('solicitud_id',$id)->get();

        foreach ($archivos as $archivo) {
            Storage::delete($archivo->ubicacion);
            $archivo->delete();
        }

        Solicitudes::find($id)->delete();

        return redirect()->route('proyectos.mostrarSolicitudesPendientes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Eliminada Con éxito');
    }

    public function solicitudes_historico($nombre){
        if(auth()->user()->hasRole('admin')){
            $solicitudes = Solicitudes::where('estatus','Finalizada')->orWhere('estatus','Rechazada')->get();
        }else{
            $solicitudes = Solicitudes::where('estatus','Finalizada')->orWhere('estatus','Rechazada')->where('nombre_usuario',$nombre)->get();
        }

        return view('proyectos.historicoSolicitudes',[
            'solicitudes' => $solicitudes
        ]);
    }

    public function solicitudes_autorizar($id){
        $solicitud = Solicitudes::find($id);
        $solicitud->estatus = 'En Proceso';
        $solicitud->save();

        return redirect()->route('proyectos.mostrarSolicitudes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Autorizada Con éxito');
    }

    public function solicitudes_rechazar($id){
        $solicitudes = Solicitudes::find($id);
        $solicitudes->estatus = 'Rechazada';
        $solicitudes->save();

        return redirect()->route('proyectos.mostrarSolicitudesPendientes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Rechazada Con éxito');
    }

    public function solicitudes_evidencias($id){
        $archivos = Upload::where('solicitud_id',$id)->get();

        foreach ($archivos as $archivo) {            
            return response()->file(storage_path('app/' . $archivo->ubicacion), [
                'Content-Disposition' => 'inline; filename="' . $archivo->nombre . '"'
            ]);
        }
    }
}
