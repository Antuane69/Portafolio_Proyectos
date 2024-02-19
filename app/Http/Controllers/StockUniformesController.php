<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Models\StockUniformes;

class StockUniformesController extends Controller
{
    public function create()
    {

        $opciones = ['Extra Chica','Chica','Mediana','Grande','Extra Grande'];
        $opciones2 = ['Nuevos','Usados','Los Dos'];

        return view('almacen.stockUniformes',[
            'opciones' => $opciones,
            'opciones2' => $opciones2
        ]);
    }

    public function show(){

        $uniformes = StockUniformes::all();
        
        return view('almacen.mostrarStock',[
            'uniformes' => $uniformes
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_solicitud' => 'date',
        ]);

        StockUniformes::create([
            'fecha_solicitud' => $request->fecha_solicitud,
            'nuevos_existencia' => $request->nuevos_existencia, 
            'usados_existencia' => $request->usados_existencia, 
            'nuevos_codigo' => $request->nuevos_codigo, 
            'usados_codigo' => $request->usados_codigo, 
            'nuevos_talla' => $request->nuevos_talla, 
            'usados_talla' => $request->usados_talla, 
            'nuevos_precio' => $request->nuevos_precio, 
            'usados_precio' => $request->usados_precio, 
            'nuevos_descripcion' => $request->nuevos_descripcion, 
            'usados_descripcion' => $request->usados_descripcion, 
        ]);

        return redirect()->route('mostrarStock.show');
    }

    public function detalles($id){

        $empleado = Empleados::query()->find($id);

        return view('gestion.detallesEmpleado',[
            'empleado' => $empleado,
        ]);
    }
}
