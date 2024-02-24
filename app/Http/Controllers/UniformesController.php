<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Herramientas;
use App\Models\Uniformes;
use Illuminate\Http\Request;
use App\Models\StockUniformes;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class UniformesController extends Controller
{
    public function dashboard(){

        $herramientas = Herramientas::query()->count();
        $uniformes_uso = Uniformes::query()->sum('cantidad');
        $uniformes_nuevos = StockUniformes::query()->sum('nuevos_existencia');
        $uniformes_usados = StockUniformes::query()->sum('usados_existencia');

        return view('almacen.inicioAlmacen',[
            'herramientas' => $herramientas,
            'uniformes_uso' => $uniformes_uso,
            'uniformes_nuevos' => $uniformes_nuevos,
            'uniformes_usados' => $uniformes_usados
        ]);
    }

    public function show(){

        $uniformes = Uniformes::all();
        
        return view('almacen.mostrarUniformes',[
            'uniformes' => $uniformes
        ]);
    }

    public function create()
    {
        return view('almacen.crearUniforme');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'curp' => 'required|min:18',
            'fecha_solicitud' => 'required|date',
            'tipo_uniforme' => 'required',
            'codigo' => 'required',
            'cantidad' => 'required',
            'total' => 'required|numeric',
        ]);

        Uniformes::create([
            'curp' => $request->curp,
            'fecha_solicitud' => $request->fecha_solicitud,
            'tipo_uniforme' => $request->tipo_uniforme,
            'codigo' => $request->codigo,
            'talla' => $request->talla,
            'cantidad' => $request->cantidad,
            'total' => $request->total
        ]);

        return redirect()->route('mostrarUniformes.show');
    }

    public function detalles($id){

        $empleado = Empleados::query()->find($id);

        return view('gestion.detallesEmpleado',[
            'empleado' => $empleado,
        ]);
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE' , $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }

    public function search_codigo(Request $request){

        $tipo = $request->tipo;

        if($tipo == 'Nuevo'){
            $tallasDiferentes = StockUniformes::query()
            ->select('nuevos_codigo')
            ->distinct()
            ->get();

            $lcodigos = $tallasDiferentes->pluck('nuevos_codigo')->toArray();
        }else{
            $tallasDiferentes = StockUniformes::query()
            ->select('usados_codigo')
            ->distinct()
            ->get();

            $lcodigos = $tallasDiferentes->pluck('usados_codigo')->toArray();
        }
    
        return response()->json([
            'success' => true,
            'lcodigos' => $lcodigos
        ]);
    }

    public function search_talla(Request $request){

        $codigo = $request->codigo;
        $tipo = $request->tipo;

        
        if($tipo == 'Nuevo'){
            
            $tallasDiferentes = StockUniformes::where('nuevos_codigo', $codigo)
            ->select('nuevos_talla as tallas') // Selecciona la columna de tallas correspondiente
            ->distinct()
            ->get();

            $ltallas = $tallasDiferentes->pluck('tallas')->toArray();
            
        }else{

            $tallasDiferentes = StockUniformes::where('usados_codigo', $codigo)
            ->select('usados_talla as tallas') // Selecciona la columna de tallas correspondiente
            ->distinct()
            ->get();

            $ltallas = $tallasDiferentes->pluck('tallas')->toArray();
        }
    
        return response()->json([
            'success' => true,
            'ltallas' => $ltallas
        ]);
    }

    public function search_cantidad(Request $request){

        $codigo = $request->codigo;
        $tipo = $request->tipo;
        $talla = $request->talla;

        if($tipo == 'Nuevo'){
            
            $totalCantidades = StockUniformes::where('nuevos_codigo', $codigo)
            ->where('nuevos_talla', $talla)
            ->sum('nuevos_existencia');
            
        }else{

            $totalCantidades = StockUniformes::where('usados_codigo', $codigo)
            ->where('usados_talla', $talla)
            ->sum('usados_existencia');

        }

        return response()->json([
            'success' => true,
            'cantidad' => $totalCantidades
        ]);
    }

    public function search_total(Request $request){

        $tipo = $request->tipo;
        $codigo = $request->codigo;
        $talla = $request->talla;
        $cantidad = $request->cantidad;

        if($tipo == 'Nuevo'){
            
            $query = StockUniformes::where('nuevos_codigo', $codigo)
            ->where('nuevos_talla', $talla)
            ->select('nuevos_precio as precio')
            ->orderBy('created_at', 'desc') // Agrega esta línea para ordenar por fecha de creación descendente
            ->first();

            $total = $cantidad * $query->precio;
            
        }else{

            $query = StockUniformes::where('usados_codigo', $codigo)
            ->where('usados_talla', $talla)
            ->select('usados_precio as precio')
            ->orderBy('created_at', 'desc') // Agrega esta línea para ordenar por fecha de creación descendente
            ->first();

            $total = $cantidad * $query->precio;

        }

        return response()->json([
            'success' => true,
            'total' => $total
        ]);
    }

    public function generate_pdf($id)//Funcion para generar el pdf de resguardo
    {
        $uniforme =  Uniformes::where('id',$id)->with('empleado')->first();

        if($uniforme->tipo_uniforme == "Nuevo"){
            $stock = StockUniformes::where('nuevos_codigo',$uniforme->codigo)->where('nuevos_talla',$uniforme->talla)
            ->select('nuevos_descripcion as descripcion', 'nuevos_precio as precio')
            ->orderBy('created_at', 'desc')->first();
        }else{
            $stock = StockUniformes::where('usados_codigo',$uniforme->codigo)->where('usados_talla',$uniforme->talla)
            ->select('usados_descripcion as descripcion','usados_precio as precio')
            ->orderBy('created_at', 'desc')->first();
        }
        
        $nomina = $uniforme->total / 2;
        
        $fecha_actual = Carbon::now(); // Obtiene la fecha y hora actual
        $pdf = Pdf::loadView('PDF.crearUniformePDF',['uniforme'=>$uniforme,'stock'=>$stock,'nomina'=>$nomina,'fecha_actual'=>$fecha_actual])->setPaper('letter', 'portrait');

        // Nombre del archivo PDF
        $nombreArchivo = 'ReciboUniformes_' . $id . '.pdf';
        return $pdf->stream($nombreArchivo); 
    }
}




