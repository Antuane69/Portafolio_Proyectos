<?php

namespace App\Http\Controllers;

use validate;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bajas;

class EmpleadosController extends Controller
{
    public function dashboard(){
            $activos = Empleados::query()->count();
            $inactivos = Bajas::query()->count();

        return view('gestion.inicioGestion',[
            'activos' => $activos,
            'inactivos' => $inactivos,
        ]);
    }

    public function show(){

        $empleados = Empleados::all();
        
        return view('gestion.mostrarEmpleado',[
            'empleados' => $empleados
        ]);
    }

    public function create()
    {
        return view('gestion.crearEmpleado');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           // ... tus reglas de validación ...
            'nombre' => 'required|max:60',
            'curp' => 'required|min:18',
            'puesto' => 'required',
            'fecha_ingreso' => 'required|date',
            'fecha_nacimiento' => 'required|date',
            'fecha_2doContrato' => 'date',
            'fecha_3erContrato' => 'date',
            'fecha_indefinido' => 'date',
            'telefono' => 'max:12',
            'salario_dia' => 'required|numeric|min:100',
            'imagen_perfil' => 'mimes:jpg,jpeg,png|max:10240',
        ]);

        // $this->validate($request,[
        // ]);

        $ruta = public_path() . '/img/gestion/Empleados';

        $perfil = $request->file('imagen_perfil');
        $nombreImagen =  time()."_".$perfil->getClientOriginalName();
        $perfil->move($ruta,$nombreImagen);

        Empleados::create([
            
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'rfc' => $request->rfc,
            'nss' => $request->nss,
            'puesto' => $request->puesto,
            'fecha_ingreso' => $request->fecha_ingreso,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'fecha_2doContrato' => $request->fecha_2doContrato,
            'fecha_3erContrato' => $request->fecha_3erContrato,
            'fecha_indefinido' => $request->fecha_indefinido,
            'telefono' => $request->telefono,
            'num_clinicaSS' => $request->num_clinicaSS,
            'salario_dia' => $request->salario_dia,
            'imagen_perfil' => $nombreImagen,

        ]);

        return redirect()->route('mostrarEmpleado.show');
    }

    public function detalles($id){

        $empleado = Empleados::query()->find($id);

        return view('gestion.detallesEmpleado',[
            'empleado' => $empleado,
        ]);
    }
}
