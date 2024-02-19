<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Incapacidades;
use App\Models\Vacaciones;
use Illuminate\Http\Request;

class IncapacidadesController extends Controller
{
    public function dashboard(){
        // if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('JefeParqueVehicular'))){

        //     $areaJefe = Datosuser::where('rpe',auth()->user()->rpe)->first();
        //     $nombreArea = DB::table('areas')->where('area_clave',$areaJefe->area)->first();

        //     $pendientes = SolicitudVehiculo::query()->where('Estatus','Pendiente')->where('Proceso',$nombreArea->area_nombre)->count();
        //     $autorizadas = SolicitudVehiculo::query()->where('Estatus','Autorizada')->where('Proceso',$nombreArea->area_nombre)->count();
        //     $aceptadas = SolicitudVehiculo::query()->where('Estatus','Aceptada')->where('Proceso',$nombreArea->area_nombre)->count();
        //     $activas = SolicitudVehiculo::query()->where('Estatus','!=','Finalizada')->where('Proceso',$nombreArea->area_nombre)->count();

        // }else{
        //     $pendientes = SolicitudVehiculo::query()->where('RPE',auth()->user()->rpe)->where('Estatus','Pendiente')->count();
        //     $autorizadas = SolicitudVehiculo::query()->where('RPE',auth()->user()->rpe)->where('Estatus','Autorizada')->count();
        //     $aceptadas = SolicitudVehiculo::query()->where('RPE',auth()->user()->rpe)->where('Estatus','Aceptada')->count();
        //     $activas = SolicitudVehiculo::query()->where('RPE',auth()->user()->rpe)->count();
        // }

        // return view('sives.solicitudes.inicioSolicitudes',[
        //     'pendientes' => $pendientes,
        //     'autorizadas' => $autorizadas,
        //     'aceptadas' => $aceptadas,
        //     'activas' => $activas
        // ]);
    }

    public function show(){

        $incapacidades = Incapacidades::query()->orderBy('created_at', 'desc')->with('empleado')->get();
        
        return view('gestion.mostrarIncapacidades',[
            'incapacidades' => $incapacidades
        ]);
    }

    public function create()
    {
        return view('gestion.crearIncapacidad');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'curp' => 'required|min:18',
            'motivo' => 'required|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_regreso' => 'required|date|after:fecha_inicio'
        ]);

        Incapacidades::create([
            'curp' => $request->curp,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_regreso' => $request->fecha_regreso,
            'dias_totales' => $request->dias_totales,
            'motivo' => $request->motivo,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->route('mostrarIncapacidades.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE', $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }
    
}