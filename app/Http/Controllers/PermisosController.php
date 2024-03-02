<?php

namespace App\Http\Controllers;

use App\Models\Permisos;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Models\Incapacidades;
use Illuminate\Support\Carbon;

class PermisosController extends Controller
{
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

        $Ultimopermiso = Permisos::where('curp',$request->curp)->orderBy('created_at', 'desc')->first();

        if($Ultimopermiso == null){
            $fechaAnterior = $fechaInicio;
        }else{
            $fechaAnterior = $Ultimopermiso->fecha_inicio;
        }

        Permisos::create([
            'curp' => $request->curp,
            'fecha_solicitud' => $fechaSoli,
            'fecha_inicio' => $fechaInicio,
            'fecha_regreso' => $fechaRegreso,
            'dias_totales' => $request->dias_totales,
            'motivo' => $request->motivo,
            'fecha_anteriorPermiso' => $fechaAnterior,
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

        $test = Permisos::where('curp',$empleado->curp)->first();

        if($test != null){
            $permiso_anterior = "";
        }else{
            $permiso_anterior = "No existe";
        };

        return response()->json([
            'success' => true,
            'empleado' => $empleado,
            'permiso_anterior' => $permiso_anterior,
        ]);
    }

    public function edit_show($id)
    {
        $permiso = Permisos::find($id);

        return view('gestion.editPermisos',[
            'permiso' =>$permiso,
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $permiso = Permisos::with('empleado')->find($id);

        $permiso->curp = $request->curp;
        $permiso->fecha_solicitud = $request->fecha_solicitud;
        $permiso->fecha_inicio = $request->fecha_inicio;
        $permiso->fecha_regreso = $request->fecha_regreso;
        $permiso->dias_totales = $request->dias_totales;
        $permiso->motivo = $request->motivo;

        $fechaInicio = Carbon::parse($request->input('fecha_inicio'))->format('Y-m-d');

        $Ultimopermiso = Permisos::where('curp',$request->curp)->orderBy('created_at', 'desc')->first();

        if($Ultimopermiso == null){
            $fechaAnterior = $fechaInicio;
        }else{
            $fechaAnterior = $Ultimopermiso->fecha_inicio;
        }

        $permiso->fecha_anteriorPermiso = $fechaAnterior;

        $permiso->save();

        return redirect()->route('mostrarPermisos.show');
    }  

    public function eliminar($id)
    {
        Permisos::find($id)->delete();

        return back()->with('success', 'Registro de Permiso Eliminado con éxito.');
    }
    
}