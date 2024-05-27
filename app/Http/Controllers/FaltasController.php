<?php

namespace App\Http\Controllers;

use App\Models\Audit;
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

        foreach($faltas as $falta){
            $auxf = new Carbon($falta->fecha_solicitud);
            $falta->solicitud = $auxf->format('d/m/Y');
        }

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

    public function buscarFaltas(Request $request){
        $tipo = $request->tipo;

        if($tipo == 'Acta Administrativa'){
            
            $faltas = [
                'I. Acumulación de amonestaciones',
                'II. Faltar a trabajar sin justificante',
                'III. Falta a las medidas de seguridad e higiene',
                'IV. Desestabilización del orden',
                'V. Negar el servicio o cerrar antes del horario establecido',
                'VI. Presentarse al trabajo en estado de embriaguez o bajo la influencia de algún narcótico',
                'VII. Divulgar o comentar los sueldos recibidos',
                'VIII. Abandonar el trabajo en medio de la jornada, sin autorización',
                'IX. Negarse a laborar en otro horario, tiempo extra o días festivos',
                'X. Atentar en contra de las buenas costumbres y la moral',
                'XI. Usar equipos, materiales e instalaciones del restaurante para negocios personales',
            ];
            
        }else{

            $faltas = [
                'I. No acatar el reglamento',
                'II. Llegar tarde',
                'V. No cumplir con la limpieza diaria',
                'VI. No cumplir con los procesos de calidad y seguridad alimentaria',
                'VII. Falta de higiene (Uniformes y, o Personal)',
                'VIII. Comer frente a los clientes',
                'IX. Agresión verbal o faltas de respeto a sus compañeros de trabajo',
                'X. Usar celular dentro de las áreas de servicio, y, o horas de trabajo',
                'XI. Jugar, ingerir o mermar insumos por descuido (Se descontará de nómina lo mermado)',
                'XII. Hacer mal uso de utensilios y, o equipos de trabajo',
                'XIII. Cambiar descansos u horario de trabajo sin autorización',
                'XIV. Dañar o rayar información de la empresa',
                'XV. Faltantes de efectivo',
                'XVI. No checar salidas o entradas'
            ];
        }
    
        return response()->json([
            'success' => true,
            'faltas' => $faltas
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

    public function crear_datosPDF($id){

        $nombres = Empleados::query()->get();
        $falta = Faltas::find($id);
        $curp = $falta->curp;

        $nombres = $nombres->pluck('nombre')->toArray();

        $opciones = ['Cocina','Servicio','Barra','Producción'];

        $faltas = [
            'I. Acumulación de amonestaciones',
            'II. Faltar a trabajar sin justificante',
            'III. Falta a las medidas de seguridad e higiene',
            'IV. Desestabilización del orden',
            'V. Negar el servicio o cerrar antes del horario establecido',
            'VI. Presentarse al trabajo en estado de embriaguez o bajo la influencia de algún narcótico',
            'VII. Divulgar o comentar los sueldos recibidos',
            'VIII. Abandonar el trabajo en medio de la jornada, sin autorización',
            'IX. Negarse a laborar en otro horario, tiempo extra o días festivos',
            'X. Atentar en contra de las buenas costumbres y la moral',
            'XI. Usar equipos, materiales e instalaciones del restaurante para negocios personales',
        ];

        $titulo = "Acta de Amonestación";

        for($i = 0; $i<11; $i++){
            if($faltas[$i] == $falta->falta_cometida){
                $titulo = "Acta Administrativa";
            }
        }

        return view('gestion.crearActa',[
            'opciones' => $opciones,
            'nombres' => $nombres,
            'curp' => $curp,
            'falta' => $falta,
            'titulo' => $titulo
        ]);
    }

    public function datos_pdf(Request $request, $id){
        $testigo1 = '';
        $testigo2 = '';
        $testigo3 = '';
 
        for($i=0;$i<count($request->nombresreg);$i++){
            if($i == 0){
                $testigo1 = $request->nombresreg[$i];
            }elseif($i == 1){
                $testigo2 = $request->nombresreg[$i];
            }else{
                $testigo3 = $request->nombresreg[$i];
            }
        }

        $fecha_actual = Carbon::now(); // Obtiene la fecha y hora actual

        $empleado = Faltas::find($id);

        $area = $request->area;

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $fecha_falta = $request->fecha_falta;
        $falta = $request->falta;
        $hechos = $request->hechos;

        $faltas = [
            'I. Acumulación de amonestaciones',
            'II. Faltar a trabajar sin justificante',
            'III. Falta a las medidas de seguridad e higiene',
            'IV. Desestabilización del orden',
            'V. Negar el servicio o cerrar antes del horario establecido',
            'VI. Presentarse al trabajo en estado de embriaguez o bajo la influencia de algún narcótico',
            'VII. Divulgar o comentar los sueldos recibidos',
            'VIII. Abandonar el trabajo en medio de la jornada, sin autorización',
            'IX. Negarse a laborar en otro horario, tiempo extra o días festivos',
            'X. Atentar en contra de las buenas costumbres y la moral',
            'XI. Usar equipos, materiales e instalaciones del restaurante para negocios personales',
        ];

        $tipo = "Falta de Primer Grado";
        $titulo = "Acta de Amonestación";

        for($i = 0; $i<11; $i++){
            if($faltas[$i] == $empleado->falta_cometida){
                $tipo = "Falta de Segundo Grado";
                $titulo = "Acta Administrativa";
            }
        }
        
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
            'falta' => $falta,
            'hechos' => $hechos,
            'tipo' => $tipo,
            ])->setPaper('letter', 'portrait');

        // Nombre del archivo PDF
        $nombreArchivo = $titulo . '_' . $empleado->nombre . '.pdf';

        // Devolver la respuesta con el archivo adjunto
        return $pdf->stream($nombreArchivo); 
    }

    public function subir_pdf(Request $request,$id)
    {

        $this->validate($request, [
            'acta_PDF' => 'required|file|mimes:pdf|max:8192',
        ]);

        $falta = Faltas::find($id);

        $faltas = [
            'I. Acumulación de amonestaciones',
            'II. Faltar a trabajar sin justificante',
            'III. Falta a las medidas de seguridad e higiene',
            'IV. Desestabilización del orden',
            'V. Negar el servicio o cerrar antes del horario establecido',
            'VI. Presentarse al trabajo en estado de embriaguez o bajo la influencia de algún narcótico',
            'VII. Divulgar o comentar los sueldos recibidos',
            'VIII. Abandonar el trabajo en medio de la jornada, sin autorización',
            'IX. Negarse a laborar en otro horario, tiempo extra o días festivos',
            'X. Atentar en contra de las buenas costumbres y la moral',
            'XI. Usar equipos, materiales e instalaciones del restaurante para negocios personales',
        ];

        $bandera = 0;

        for($i = 0; $i<11; $i++){
            if($faltas[$i] == $falta->falta_cometida){
                $titulo = "Acta Administrativa";
                $bandera = 1;
            }
        }

        if($bandera == 0){
            $tipo = "Acta de Amonestación";
        }

        $archivopdf = $request->file('acta_PDF')->store('public/Actas');
        $nombreOriginal = $id . '_' . $tipo . '_' . $falta->curp . '.pdf';

        $ruta = 'public/Actas/' . $nombreOriginal;

        if($falta->acta_realizada != "No"){
            // Eliminar el archivo en storage
            Storage::delete($ruta);
        }else{
            $falta->acta_realizada = $nombreOriginal;
        }   
        
        Storage::move($archivopdf,$ruta);
        $falta->save();

        return redirect()->back();
    }   

    public function ver_pdf($id)
    {
        $faltas =  Faltas::find($id);

        $filename = $faltas->acta_realizada;

        $path = storage_path('app/public/Actas/' . $filename);
        
        if (file_exists($path)) {
            // Configurar el tipo de respuesta como PDF
            $headers = ['Content-Type' => 'application/pdf'];
    
            // Descargar el archivo
            return response()->file($path, $headers);
        };
    }   

    public function mostrar_pdf(){
        $faltas = Faltas::where('acta_realizada', '!=', 'No')
        ->orderBy('updated_at', 'desc')
        ->get();    

        foreach($faltas as $falta){
            $auxf = new Carbon($falta->updated_at);
            $falta->solicitud = $auxf->format('d/m/Y');
        }        

        return view('PDF.mostrarActasPDF',[
            'faltas' => $faltas
        ]);
    }

    public function edit_show($id)
    {
        $falta = Faltas::with('empleado')->find($id);

        $faltasTotal = Faltas::query()
        ->where('curp',$falta->curp)
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

        return view('gestion.editFaltas',[
            'falta' => $falta,
            'amonestacion' => $amonestacion,
            'acta' => $acta
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $falta = Faltas::find($id);
        $originalValues = $falta->getOriginal();

        $this->validate($request, [
            'curp' => 'required',
            'fecha_solicitud' => 'required|date',
            'falta_cometida' => 'required|max:60',
        ]);

        $nombre = Empleados::where('curp',$request->curp)->pluck('nombre')->first();

        $falta->nombre = $nombre;
        $falta->curp = $request->curp;
        $falta->fecha_solicitud = $request->fecha_solicitud;
        $falta->falta_cometida = $request->falta_cometida;
        $falta->amonestacion = $request->amonestacion;
        $falta->acta_administrativa = $request->acta;

        $falta->save();

        // Registrar los cambios en la tabla de auditoría
        $changes = $falta->getChanges();
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
            'tipo' => 'Falta al Reglamento',
        ]);
        
        return redirect()->route('mostrarFaltas.show')->with('success', 'Registro de Faltas Editado con éxito.');
    } 

    public function eliminar_pdf($id)
    {
        $falta = Faltas::find($id);
        
        // Obtener la ruta del archivo en storage
        $ruta = 'public/Actas/' . $falta->acta_realizada;
        // Eliminar el archivo en storage
        Storage::delete($ruta);

        // Eliminar el registro en la base de datos
        $falta->acta_realizada = "No";
        $falta->save();

        return back()->with('success', 'PDF de Acta Eliminado con éxito.');
    }   

    public function eliminar($id)
    {
        $falta = Faltas::find($id);

        // Obtener la ruta del archivo en storage
        $ruta = 'public/Actas/' . $falta->acta_realizada;

        // Eliminar el registro en la base de datos
        $falta->acta_realizada = 'No';

        // Eliminar el archivo en storage
        Storage::delete($ruta);

        $falta->save();
        $falta->delete();

        return back()->with('success', 'Registro de Faltas al Reglamento Eliminado con éxito.');
    }
}
