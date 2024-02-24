<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Herramientas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HerramientasPivote;

class HerramientasController extends Controller
{
    public function create()
    {
        $nombres = Empleados::query()->get();

        $nombres = $nombres->pluck('nombre')->toArray();

        $opciones = ['Cocina','Servicio','Barra','Producción'];

        return view('almacen.crearHerramienta',[
            'nombres' => $nombres,
            'opciones' => $opciones
        ]);
    }

    public function show(){

        $herramientas = Herramientas::all();

        foreach($herramientas as $herramienta){

            $nombres = $herramienta->nombre;
    
            $herramienta->nombre_real = substr(str_replace('_', ', ', $nombres),1);

        }

        return view('almacen.mostrarHerramientas',[
            'herramientas' => $herramientas
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nombresreg' => 'required',
            'fecha_registro' => 'required|date',
            'imagen_perfil' => 'mimes:jpg,jpeg,png|max:10240',
            'descripcion' => 'required|max:80',
            'area' => 'required',
            'precio' => 'required|numeric', 
            'cantidad' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $datos = $request->input('nombresreg');
        $herramienta['nombre'] = "";

        $ruta = public_path() . '/img/almacen/Herramientas';

        $imagen = $request->file('imagen');
        $nombreImagen =  time()."_".$imagen->getClientOriginalName();
        $imagen->move($ruta,$nombreImagen);

        foreach ($datos as $nombre) {
            //dd($datos);
            $herramienta['nombre'] = $herramienta['nombre'] . '_' . $nombre;
        }

        $herramienta['fecha_registro'] = $request->fecha_registro;
        $herramienta['imagen'] = $nombreImagen;
        $herramienta['descripcion'] = $request->descripcion;
        $herramienta['area'] = $request->area;
        $herramienta['precio'] = $request->precio;
        $herramienta['cantidad'] = $request->cantidad;
        $herramienta['total'] = $request->total;
        
        Herramientas::insert($herramienta);

        return redirect()->route('mostrarHerramientas.show');
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

    public function generate_pdf($id)//Funcion para generar el pdf de resguardo
    {
        $herramienta =  Herramientas::find($id)->first();

        $nombres = $herramienta->nombre;
        $herramienta->nombre_real = substr(str_replace('_', ', ', $nombres),1);

        $fecha_actual = Carbon::now(); // Obtiene la fecha y hora actual

        //$resg = DB::table('resguardos')->orderBy('id','desc')->first();
        $pdf = Pdf::loadView('PDF.crearHerramientaPDF',['herramienta'=>$herramienta,'fecha_actual'=>$fecha_actual])->setPaper('letter', 'portrait');

        // Nombre del archivo PDF
        $nombreArchivo = 'ReciboHerramientas_' . $id . '.pdf';

        // Devolver la respuesta con el archivo adjunto
        return $pdf->stream($nombreArchivo); 
    }
}
