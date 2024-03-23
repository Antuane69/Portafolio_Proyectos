<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        foreach($uniformes as $uniforme){
            $auxf = new Carbon($uniforme->fecha_solicitud);
            $uniforme->solicitud = $auxf->format('d/m/Y');
        }
        
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

    public function edit_show($id)
    {
        $stock = StockUniformes::find($id);
        $opciones = ['Extra Chica','Chica','Mediana','Grande','Extra Grande','Unitalla'];
        $opciones2 = ['Nuevos','Usados','Los Dos'];
        $opciones3 = ['Filipina','Mandil','Camisa','Falda','Pantalon','Cofia'];

        return view('almacen.editStockUniformes',[
            'stock' => $stock,
            'opciones' => $opciones,
            'opciones2' => $opciones2,
            'opciones3' => $opciones3
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $stock = StockUniformes::find($id);

        if($request->tipo == "Nuevos"){
            $stock->fecha_solicitud = $request->fecha_solicitud;
            $stock->nuevos_existencia = $request->nuevos_existencia;
            $stock->nuevos_codigo = $request->nuevos_codigo;
            $stock->nuevos_talla = $request->nuevos_talla;
            $stock->nuevos_precio = $request->nuevos_precio;
            $stock->nuevos_descripcion = $request->nuevos_descripcion;
        }elseif($request->tipo == "Usados"){
            $stock->fecha_solicitud = $request->fecha_solicitud;
            $stock->usados_existencia = $request->usados_existencia;
            $stock->usados_codigo = $request->usados_codigo;
            $stock->usados_talla = $request->usados_talla;
            $stock->usados_precio = $request->usados_precio;
            $stock->usados_descripcion = $request->usados_descripcion;
        }else{
            $stock->fecha_solicitud = $request->fecha_solicitud;
            $stock->nuevos_existencia = $request->nuevos_existencia;
            $stock->usados_existencia = $request->usados_existencia;
            $stock->nuevos_codigo = $request->nuevos_codigo;
            $stock->usados_codigo = $request->usados_codigo;
            $stock->nuevos_talla = $request->nuevos_talla;
            $stock->usados_talla = $request->usados_talla;
            $stock->nuevos_precio = $request->nuevos_precio;
            $stock->usados_precio = $request->usados_precio;
            $stock->nuevos_descripcion = $request->nuevos_descripcion;
            $stock->usados_descripcion = $request->usados_descripcion;
        };

        $stock->save();

        return redirect()->route('mostrarStock.show');
    }  

    public function eliminar($id)
    {
        StockUniformes::find($id)->delete();

        return back()->with('success', 'Registro de Stock de Uniformes Eliminado con éxito.');
    }
}
