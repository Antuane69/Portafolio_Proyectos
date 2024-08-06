<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use App\Models\EtapasNumero;
use PDO;
use App\Models\Upload;
use App\Models\Usuarios;
use App\Models\Proyectos;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use App\Models\ProyectosPixel;
use Carbon\Carbon;
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

    public function solicitudes_autorizar(Request $request, $id){
        $request->validate([
            'fecha_entrega' => 'date|required',
            'comentarios' => 'max:600',
        ]);

        $solicitud = Solicitudes::find($id);
        $solicitud->estatus = 'En Proceso';
        $solicitud->fecha_entrega = $request->fecha_entrega;
        $solicitud->save();

        if($request->comentarios){
            $comentario = $request->comentarios;
        }else{
            $comentario = 'Solicitud Autorizada Con Éxito';
        }

        Etapas::create([
            'solicitud_id' => $solicitud->id,
            'comentarios' => $comentario,
            'estatus' => 'En Proceso',
        ]);

        return redirect()->route('proyectos.mostrarSolicitudes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Autorizada Con éxito');
    }

    public function solicitudes_rechazar(Request $request, $id){
        $request->validate([
            'comentarios' => 'required|max:600',
        ]);

        $solicitud = Solicitudes::find($id);
        $solicitud->estatus = 'Rechazada';
        $solicitud->comentarios = $request->comentarios;
        $solicitud->save();

        return redirect()->route('proyectos.mostrarSolicitudesPendientes',auth()->user()->nombre_usuario)->with('success', 'Solicitud Rechazada Con éxito');
    }

    public function solicitudes_timeline_show($nombre,$id){
        $solicitud = Solicitudes::with('Etapas','ultimaEtapa','Etapas.Clasificacion')->find($id);
        $auxf = new Carbon($solicitud->fecha_entrega);
        $solicitud->FechaEntrega = $auxf->format('d/m/Y');
        $fechaActual = Carbon::now();

        $auxf2 = new Carbon($solicitud->updated_at);
        $diferenciaDias = $fechaActual->diffInDays($auxf2);
        $solicitud->dias = $diferenciaDias . " Días.";

        $fechaLimite = new Carbon($solicitud->fecha_entrega);
        $diferenciaDias = $fechaActual->diffInDays($fechaLimite);
        $solicitud->diasFaltantes = $diferenciaDias . " Días.";

        foreach ($solicitud->Etapas->reverse() as $etapa) {
            $auxf = new Carbon($etapa->created_at);
            $etapa->fecha = $auxf->format('d/m/Y');
            $auxf2 = new Carbon($etapa->updated_at);
            $diferenciaDias = $fechaActual->diffInDays($auxf2);
            $etapa->dias = $diferenciaDias . " Días.";
        }

        return view('proyectos.timelineSolicitudes',[
            'solicitud' => $solicitud
        ]);
    }

    public function solicitudes_timeline_update(Request $request,$id){
        $request->validate([
            'adicional' => 'max:500',
        ]);

        $solicitud = Solicitudes::with('Etapas','ultimaEtapa','Etapas.Clasificacion')->find($id);

        $idr = intval($solicitud->ultimaEtapa->Clasificacion->numero_etapa) + 1;
        $etapaNueva = EtapasNumero::where('numero_etapa',$idr)->first();

        $solicitud->estatus = $etapaNueva->nombre_etapa;

        if($solicitud->ultimaEtapa->Clasificacion->numero_etapa == 2){
            if($request->adicional){
                $comentario = $request->adicional;
            }else{
                $comentario = 'No Se Pidió Información Adicional';
            }
        }

        Etapas::create([
            'solicitud_id' => $solicitud->id,
            'comentarios' => $comentario,
            'estatus' => $etapaNueva->nombre_etapa,
        ]);

        $solicitud->save();

        return redirect()->route('proyectos.timeline',[auth()->user()->nombre_usuario,$solicitud->id])->with('success', 'Etapa Concluida Con Éxito');;
    }

}
