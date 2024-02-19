<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Models\Incapacidades;
use Illuminate\Support\Carbon;

class PermisosController extends Controller
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

        $permisos = Permisos::query()->orderBy('created_at', 'desc')->with('empleado')->get();
        
        return view('gestion.mostrarPermisos',[
            'permisos' => $permisos
        ]);
    }

    public function create()
    {
        return view('gestion.crearPermisos');
    }

    public function store(Request $request)
    {
    
        $this->validate($request, [
            'curp' => 'required|min:18',
            'fecha_solicitud' => 'required|date',
            'fecha_inicio' => 'required|date',
            'motivo' => 'required|max:100',
        ]);

        // Formatear las fechas utilizando Carbon

        $fechaSoli = Carbon::parse($request->input('fecha_solicitud'))->format('Y-m-d');
        $fechaInicio = Carbon::parse($request->input('fecha_inicio'))->format('Y-m-d');
        $fechaRegreso = Carbon::parse($request->input('fecha_regreso'))->format('Y-m-d');

        Permisos::create([
            'curp' => $request->curp,
            'fecha_solicitud' => $fechaSoli,
            'fecha_inicio' => $fechaInicio,
            'fecha_regreso' => $fechaRegreso,
            'dias_totales' => $request->dias_totales,
            'motivo' => $request->motivo,
            'fecha_anteriorPermiso' => $fechaInicio,
        ]);

        return redirect()->route('mostrarPermisos.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE', $request->nombre . '%')
        ->orderBy('created_at', 'desc')
        ->with(['permisos' => function ($query) {
            $query->latest()->first();
        }])
        ->first();

        return response()->json([
            'success' => true,
            'empleado' => $empleado,
        ]);
    }
    
}