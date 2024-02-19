<?php

namespace App\Http\Controllers;

use App\Models\Faltas;
use App\Models\Empleados;
use Illuminate\Http\Request;

class FaltasController extends Controller
{
    public function dashboard(){
        // if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular'))){

        //     $areaJefe = Datosuser::where('rpe' => $request->,auth()->user()->rpe)->first();
        //     $nombreArea = DB::table('areas')->where('area_clave' => $request->,$areaJefe->area)->first();

        //     $pendientes = SolicitudVehiculo::query()->where('Estatus' => $request->,'Pendiente')->where('Proceso' => $request->,$nombreArea->area_nombre)->count();
        //     $autorizadas = SolicitudVehiculo::query()->where('Estatus' => $request->,'Autorizada')->where('Proceso' => $request->,$nombreArea->area_nombre)->count();
        //     $aceptadas = SolicitudVehiculo::query()->where('Estatus' => $request->,'Aceptada')->where('Proceso' => $request->,$nombreArea->area_nombre)->count();
        //     $activas = SolicitudVehiculo::query()->where('Estatus' => $request->,'!=' => $request->,'Finalizada')->where('Proceso' => $request->,$nombreArea->area_nombre)->count();

        // }else{
        //     $pendientes = SolicitudVehiculo::query()->where('RPE' => $request->,auth()->user()->rpe)->where('Estatus' => $request->,'Pendiente')->count();
        //     $autorizadas = SolicitudVehiculo::query()->where('RPE' => $request->,auth()->user()->rpe)->where('Estatus' => $request->,'Autorizada')->count();
        //     $aceptadas = SolicitudVehiculo::query()->where('RPE' => $request->,auth()->user()->rpe)->where('Estatus' => $request->,'Aceptada')->count();
        //     $activas = SolicitudVehiculo::query()->where('RPE' => $request->,auth()->user()->rpe)->count();
        // }

        // return view('sives.solicitudes.inicioSolicitudes' => $request->,[
        //     'pendientes' => $pendientes,
        //     'autorizadas' => $autorizadas,
        //     'aceptadas' => $aceptadas,
        //     'activas' => $activas
        // ]);
    }

    public function show(){

        $faltas = Faltas::query()->orderBy('created_at', 'desc')->get();

        return view('gestion.mostrarFaltas',[
            'faltas' => $faltas
        ]);
    }

    public function create()
    {
        $opciones = ['Amonestación','Acta Administrativa'];

        return view('gestion.crearFaltas',[
            'opciones' => $opciones
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'curp' => 'required',
            'fecha_solicitud' => 'required|date',
            'falta_cometida' => 'required|max:60',
        ]);

        $faltasTotal = Faltas::query()
        ->selectRaw('curp, MAX(created_at) as latest_created_at, MAX(amonestacion) as latest_amonestacion, MAX(acta_administrativa) as latest_acta')
        ->whereIn('curp', (array) $request->curp)
        ->whereNull('faltas.deleted_at')
        ->groupBy('curp')
        ->orderBy('latest_created_at', 'desc')
        ->first();

        if($faltasTotal){
            $amonestacion = $faltasTotal->latest_amonestacion;
            $acta = $faltasTotal->latest_acta;
        }else{
            $amonestacion = 0;
            $acta = 0;
        }

        if($request->falta == 'Amonestación'){
            $amonestacion = $amonestacion + 1;
        }else{
            $acta = $acta + 1;
        }

        if($amonestacion == 4){
            $acta = $acta + 1;
            $amonestacion = 0;
        }

        $empleado = Empleados::where('curp',$request->curp)->first();

        Faltas::create([
            'nombre' => $empleado->nombre,
            'curp' => $request->curp,
            'fecha_solicitud' => $request->fecha_solicitud,
            'falta_cometida' => $request->falta_cometida,
            'amonestacion' => $amonestacion,
            'acta_administrativa' => $acta,
        ]);

        return redirect()->route('mostrarFaltas.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE' , $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }
}
