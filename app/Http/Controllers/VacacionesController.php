<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Vacaciones;
use Illuminate\Http\Request;

class VacacionesController extends Controller
{
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

    public function edit_show($id)
    {
        $vacacion = Vacaciones::with('empleado')->find($id);

        return view('gestion.editVacaciones',[
            'vacacion' =>$vacacion,
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $vacacion = Vacaciones::find($id);

        $empleado = Empleados::where('curp',$request->curp)->first();

        if($request->curp == $vacacion->curp){
            $empleado->dias_vacaciones = $empleado->dias_vacaciones + $vacacion->dias_usados;
            $empleado->dias_vacaciones = $empleado->dias_vacaciones - $request->diasTomados;
            $empleado->save(); 
        };

        $vacacion->curp = $request->curp;
        $vacacion->fecha_solicitud = $request->fecha_solicitud;
        $vacacion->fecha_inicioVac = $request->fecha_inicioVac;
        $vacacion->fecha_regresoVac = $request->fecha_regresoVac;
        $vacacion->dias_usados = $request->diasTomados;
        $vacacion->save();

        return redirect()->route('mostrarVacaciones.show');
    }  

    public function eliminar($id)
    {
        Vacaciones::find($id)->delete();

        return back()->with('success', 'Registro de Vacación Eliminado con éxito.');
    }
    
}
