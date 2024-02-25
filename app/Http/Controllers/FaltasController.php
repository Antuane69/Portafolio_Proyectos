<?php

namespace App\Http\Controllers;

use App\Models\Faltas;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class FaltasController extends Controller
{

    public function show(){

        $faltas = Faltas::query()->orderBy('created_at', 'desc')->get();

        return view('gestion.mostrarFaltas',[
            'faltas' => $faltas
        ]);
    }

    public function create()
    {
        $opciones = ['Amonestación','Acta Administrativa'];

        return view('gestion.crearFaltas',[
            'opciones' => $opciones
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'curp' => 'required',
            'fecha_solicitud' => 'required|date',
            'falta_cometida' => 'required|max:60',
        ]);

        $faltasTotal = Faltas::query()
        ->where('curp',$request->curp)
        ->select('curp','amonestacion','acta_administrativa','created_at')
        ->orderBy('created_at', 'desc')
        ->first();

        if($faltasTotal){
            $amonestacion = $faltasTotal->amonestacion;
            $acta = $faltasTotal->acta_administrativa;
        }else{
            $amonestacion = 0;
            $acta = 0;
        }

        if($request->falta == 'Amonestación'){
            $amonestacion = $amonestacion + 1;
        }else{
            $acta = $acta + 1;
        }

        if($amonestacion == 4){
            $acta = $acta + 1;
            $amonestacion = 0;
        }

        $empleado = Empleados::where('curp',$request->curp)->first();

        Faltas::create([
            'nombre' => $empleado->nombre,
            'curp' => $request->curp,
            'fecha_solicitud' => $request->fecha_solicitud,
            'falta_cometida' => $request->falta_cometida,
            'amonestacion' => $amonestacion,
            'acta_administrativa' => $acta,
        ]);

        return redirect()->route('mostrarFaltas.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE' , $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }

    public function crear_datosPDF($curp){
        $nombres = Empleados::query()->get();

        $nombres = $nombres->pluck('nombre')->toArray();

        $opciones = ['Cocina','Servicio','Barra','Producción'];

        return view('gestion.crearActa',[
            'opciones' => $opciones,
            'nombres' => $nombres,
            'curp' => $curp
        ]);
    }

    public function datos_pdf(Request $request, $curp){

        $testigo1 = $request->nombresreg[0];
        $testigo2 = $request->nombresreg[1];
        $testigo3 = $request->nombresreg[2];
        
        $fecha_actual = Carbon::now(); // Obtiene la fecha y hora actual

        $empleado =  Faltas::where('curp',$curp)->where('acta_administrativa','!=','0')
        ->where('acta_realizada','No')->orderBy('created_at', 'desc')->first();

        $area = $request->area;

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $fecha_falta = $request->fecha_falta;
        $horario = $request->horario;

        //$resg = DB::table('resguardos')->orderBy('id','desc')->first();
        $pdf = Pdf::loadView('PDF.crearActaPDF',[
            'empleado' => $empleado,
            'fecha' => $fecha_actual,
            'testigo1' => $testigo1,
            'testigo2' => $testigo2,
            'testigo3' => $testigo3,
            'area' => $area,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'fecha_falta' => $fecha_falta,
            'horario' => $horario,
            ])->setPaper('letter', 'portrait');

        // Nombre del archivo PDF
        $nombreArchivo = 'ActaAdministrativa_' . $empleado->nombre . '.pdf';

        // Devolver la respuesta con el archivo adjunto
        return $pdf->stream($nombreArchivo); 
    }

    public function subir_pdf(Request $request,$id)
    {

        $this->validate($request, [
            'acta_PDF' => 'required|file|mimes:pdf|max:8192',
        ]);

        $falta = Faltas::find($id);
        $total = Faltas::all();

        $archivopdf = $request->file('acta_PDF')->store('public/Actas Administrativas');
        $nombreOriginal = $id . '_Acta Administrativa_' . $falta->curp . '.pdf';

        $ruta = 'public/Actas Administrativas/' . $nombreOriginal;

        Storage::move($archivopdf,$ruta);

        $falta->acta_realizada = $nombreOriginal;
        $falta->save();

        foreach($total as $unitaria){
            if(($falta->acta_administrativa == $unitaria->acta_administrativa) && ($falta->curp == $unitaria->curp) && ($unitaria->acta_realizada != $nombreOriginal)){
                $unitaria->acta_realizada = $nombreOriginal;
                $unitaria->save();
            }
        }


        return redirect()->back();
    }   

    public function ver_pdf($id)
    {
        $faltas =  Faltas::find($id);

        $filename = $faltas->acta_realizada;

        $path = storage_path('app/public/Actas Administrativas/' . $filename);
        
        if (file_exists($path)) {
            // Configurar el tipo de respuesta como PDF
            $headers = ['Content-Type' => 'application/pdf'];
    
            // Descargar el archivo
            return response()->file($path, $headers);
        };
    }   

    public function mostrar_pdf(){
        $faltas = Faltas::where('acta_realizada', '!=', 'No')
        ->groupBy('acta_administrativa', 'curp')
        ->orderBy('created_at', 'desc')
        ->get();    

        return view('PDF.mostrarActasPDF',[
            'faltas' => $faltas
        ]);
    }
}
