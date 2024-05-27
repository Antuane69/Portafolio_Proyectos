<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Faltas;
use App\Models\Empleados;
use App\Models\Uniformes;
use App\Models\Herramientas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HerramientasPivote;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HerramientasController extends Controller
{
    public function dashboard(){

        $herramientas = Herramientas::where('reporte_pdf','!=','')->count();
        $uniformes = Uniformes::where('reporte_pdf','!=','')->count();
        $actas = Faltas::where('acta_realizada', '!=', 'No')
        ->groupBy('acta_administrativa', 'curp')
        ->count();    

        return view('PDF.inicioPDF',[
            'herramientas' => $herramientas,
            'uniformes' => $uniformes,
            'actas' => $actas
        ]);
    }

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

        $herramientas = Herramientas::orderBy('created_at', 'desc')->get();

        foreach($herramientas as $herramienta){
            $nombres = $herramienta->nombre;
            $herramienta->nombre_real = substr(str_replace('_', ', ', $nombres),1);

            $auxf = new Carbon($herramienta->fecha_registro);           
            $herramienta->registro = $auxf->format('d/m/Y');
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

    public function subir_pdf(Request $request,$id)
    {
        $this->validate($request, [
            'herramienta_PDF' => 'required|file|mimes:pdf|max:8192',
        ]);

        $herramienta = Herramientas::find($id);
        
        if($herramienta->reporte_pdf != ""){
            // Obtener la ruta del archivo en storage
            $ruta = 'public/Reportes Herramientas/' . $herramienta->reporte_pdf;

            // Eliminar el registro en la base de datos
            $herramienta->reporte_pdf = '';

            // Eliminar el archivo en storage
            Storage::delete($ruta);
        }

        $archivopdf = $request->file('herramienta_PDF')->store('public/Reportes Herramientas');
        $nombreOriginal = $id . '_Reporte Herramienta_' . $herramienta->area . '.pdf';

        $ruta = 'public/Reportes Herramientas/' . $nombreOriginal;

        Storage::move($archivopdf,$ruta);

        $herramienta->reporte_pdf = $nombreOriginal;
        $herramienta->save();

        return redirect()->back();
    }   

    public function ver_pdf($id)
    {
        $herramienta =  Herramientas::find($id);

        $filename = $herramienta->reporte_pdf;

        $path = storage_path('app/public/Reportes Herramientas/' . $filename);
        
        if (file_exists($path)) {
            // Configurar el tipo de respuesta como PDF
            $headers = ['Content-Type' => 'application/pdf'];
    
            // Descargar el archivo
            return response()->file($path, $headers);
        };
    } 

    public function mostrar_pdf(){

        $herramientas = Herramientas::where('reporte_pdf', '!=', '')
        ->orderBy('created_at', 'desc')
        ->get();    

        foreach($herramientas as $herramienta){
            $nombres = $herramienta->nombre;
            $herramienta->nombre_real = substr(str_replace('_', ', ', $nombres),1);

            $auxf = new Carbon($herramienta->updated_at);
            $herramienta->solicitud = $auxf->format('d/m/Y');
        }
        
        return view('PDF.mostrarHerramientasPDF',[
            'herramientas' => $herramientas
        ]);
    }

    public function eliminar_pdf($id)
    {
        $herramienta = Herramientas::find($id);
        
        // Obtener la ruta del archivo en storage
        $ruta = 'public/Reportes Herramientas/' . $herramienta->reporte_pdf;

        // Eliminar el registro en la base de datos
        $herramienta->reporte_pdf = "";

        // Eliminar el archivo en storage
        Storage::delete($ruta);

        $herramienta->save();

        return back()->with('success', 'PDF de Herramientas Eliminado con éxito.');
    }   

    public function eliminar($id)
    {
        $herramienta = Herramientas::find($id);

        if($herramienta->reporte_pdf != ""){
            // Obtener la ruta del archivo en storage
            $ruta = 'public/Reportes Herramientas/' . $herramienta->reporte_pdf;

            // Eliminar el registro en la base de datos
            $herramienta->reporte_pdf = '';

            // Eliminar el archivo en storage
            Storage::delete($ruta);

            $herramienta->save();
        }        

        $herramienta->delete();

        return back()->with('success', 'Registro de Herramientas Eliminado con éxito.');
    }

    public function edit_show($id)
    {
        $herramienta = Herramientas::find($id);

        $nombres = Empleados::query()->get();
        $nombres = $nombres->pluck('nombre')->toArray();

        $nombresString = $herramienta->nombre;
        $nombresArray = explode("_", $nombresString);       
        // Filtrar los elementos vacíos del array
        $nombresArray = array_filter($nombresArray);

        // Reindexar el array para asegurarte de que los índices sean consecutivos
        $nombresArray = array_values($nombresArray); 

        $opciones = ['Cocina','Servicio','Barra','Producción'];

        return view('almacen.editHerramienta',[
            'herramienta' => $herramienta,
            'opciones' => $opciones,
            'nombres' => $nombres,
            'nombresSeleccionados' => $nombresArray,
            'id' => $id,
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $this->validate($request, [
            'nombresreg' => 'required',
            'fecha_registro' => 'required|date',
            'imagen' => 'mimes:jpg,jpeg,png|max:10240',
            'descripcion' => 'required|max:80',
            'area' => 'required',
            'precio' => 'required|numeric', 
            'cantidad' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $datos = $request->input('nombresreg');

        $ruta = public_path() . '/img/almacen/Herramientas';

        $herramienta = Herramientas::find($id);
        $originalValues = $herramienta->getOriginal();

        if($request->file('imagen') != ""){
            $imagen = $request->file('imagen');
            $nombreImagen =  time()."_".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreImagen);

            if($herramienta->imagen != ''){
                File::delete($ruta . '/' . $herramienta->imagen);
            }

        }else{
            if($herramienta->imagen != ''){
                $nombreImagen = $herramienta->imagen;        
            }else{
                $nombreImagen = '';        
            }
        }
        
        $bandera = '';
        foreach ($datos as $nombre) {
            $bandera = $bandera . '_' . $nombre;
        }

        $herramienta->nombre = $bandera;
        $herramienta->fecha_registro = $request->fecha_registro;
        $herramienta->imagen = $nombreImagen;
        $herramienta->descripcion = $request->descripcion;
        $herramienta->area = $request->area;
        $herramienta->precio = $request->precio;
        $herramienta->cantidad = $request->cantidad;
        $herramienta->total = $request->total;
        $herramienta->save();

        // Registrar los cambios en la tabla de auditoría
        $changes = $herramienta->getChanges();
        $campos = '';
        foreach ($changes as $field => $newValue) {
            if ($field == 'updated_at') {
                continue;
            }
            if ($originalValues[$field] != $newValue) {
                $campos .= $field . '|';
            }
        }

        Audit::create([
            'nombre_usuario' => auth()->user()->nombre,
            'campos' => $campos,
            'fecha_cambio' => now(),
            'tipo' => 'Herramienta',
        ]);
        
        return redirect()->route('mostrarHerramientas.show');
    }  
}
