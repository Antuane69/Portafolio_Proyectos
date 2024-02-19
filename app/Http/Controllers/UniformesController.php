<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\StockUniformes;
use App\Models\Uniformes;
use Illuminate\Http\Request;

class UniformesController extends Controller
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
}




