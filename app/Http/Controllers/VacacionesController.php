<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Vacaciones;
use Illuminate\Http\Request;

class VacacionesController extends Controller
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

        $vacaciones = Vacaciones::query()->orderBy('created_at', 'desc')->with('empleado')->get();
        
        return view('gestion.mostrarVacaciones',[
            'vacaciones' => $vacaciones
        ]);
    }

    public function create()
    {
        return view('gestion.crearVacaciones');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'curp' => 'required|min:18',
            'fecha_solicitud' => 'required|date',
            'fecha_inicioVac' => 'required|date',
            'fecha_regresoVac' => 'required|date|after:fecha_inicioVac',
        ]);

        $empleado = Empleados::where('curp',$request->curp)->first();
        $empleado->dias_vacaciones = $empleado->dias_vacaciones - $request->diasTomados;
        $empleado->save(); 

        Vacaciones::create([
            'curp' => $request->curp,
            'fecha_solicitud' => $request->fecha_solicitud,
            'fecha_inicioVac' => $request->fecha_inicioVac,
            'fecha_regresoVac' => $request->fecha_regresoVac,
            'dias_usados' => $request->diasTomados,
        ]);

        return redirect()->route('mostrarVacaciones.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE', $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }
    
}
