<?php

namespace App\Http\Controllers;

use validate;
use App\Models\Bajas;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\ElseIf_;

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
            'ine_trasera' => 'mimes:jpg,jpeg,png|max:10240',
            'ine_delantera' => 'mimes:jpg,jpeg,png|max:10240',
            'antecedentes' => 'file|mimes:pdf|max:8192',
            'recomendacion' => 'file|mimes:pdf|max:8192',
            'estudios' => 'file|mimes:pdf|max:8192',
            'nacimiento' => 'file|mimes:pdf|max:8192',
            'domicilio' => 'file|mimes:pdf|max:8192',
        ]);

        $ine_trasera = '';
        $ine_delantera = '';
        $antecedentes = '';
        $recomendacion = '';
        $estudios = '';
        $nacimiento = '';
        $domicilio = '';

        $ruta = public_path() . '/img/gestion/Empleados';

        if ($request->hasFile('imagen_perfil')) {
            $perfil = $request->file('imagen_perfil');
            $nombreImagen =  "PP_" . $request->nombre  . "." . $perfil->getClientOriginalExtension();
            $perfil->move($ruta,$nombreImagen);
        }

        if ($request->hasFile('antecedentes')) {
            $archivopdf = $request->file('antecedentes')->store('public/Documentación');
            $antecedentes = 'antecedentes_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $antecedentes;
    
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('recomendacion')) {
            $archivopdf = $request->file('recomendacion')->store('public/Documentación');
            $recomendacion = 'recomendacion_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $recomendacion;
    
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('estudios')) {
            $archivopdf = $request->file('estudios')->store('public/Documentación');
            $estudios = 'estudios_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $estudios;
    
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('nacimiento')) {
            $archivopdf = $request->file('nacimiento')->store('public/Documentación');
            $nacimiento = 'nacimiento_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $nacimiento;
    
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('domicilio')) {
            $archivopdf = $request->file('domicilio')->store('public/Documentación');
            $domicilio = 'domicilio_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $domicilio;
    
            Storage::move($archivopdf,$ruta);
        }

        $ruta = public_path() . '/img/gestion/Empleados';

        if ($request->hasFile('ine_trasera')) {
            $archivo = $request->file('ine_trasera');
            $ine_trasera = 'ine_trasera_' . $request->nombre . "." . $archivo->getClientOriginalExtension();
            $archivo->move($ruta,$ine_trasera);
        }

        if ($request->hasFile('ine_delantera')) {
            $archivo = $request->file('ine_delantera');
            $ine_delantera = 'ine_delantera_' . $request->nombre . "." . $archivo->getClientOriginalExtension();
            $archivo->move($ruta,$ine_delantera);
        }

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

            'antecedentes' => $antecedentes,
            'recomendacion' => $recomendacion,
            'estudios' => $estudios,
            'nacimiento' => $nacimiento,
            'domicilio' => $domicilio,
            'ine' => $request->ine,
            'nomina' => $request->nomina,
            'ine_trasera' => $ine_trasera,
            'ine_delantera' => $ine_delantera
        ]);

        return redirect()->route('mostrarEmpleado.show');
    }

    public function detalles($id){

        $empleado = Empleados::query()->find($id);

        return view('gestion.detallesEmpleado',[
            'empleado' => $empleado,
        ]);
    }

    public function edit_show($id)
    {
        $empleado = Empleados::find($id);

        return view('gestion.editEmpleado',[
            'empleado' => $empleado,
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $this->validate($request, [
            'imagen_perfil' => 'mimes:jpg,jpeg,png|max:10240',
            'ine_trasera' => 'mimes:jpg,jpeg,png|max:10240',
            'ine_delantera' => 'mimes:jpg,jpeg,png|max:10240',
            'antecedentes' => 'file|mimes:pdf|max:8192',
            'recomendacion' => 'file|mimes:pdf|max:8192',
            'estudios' => 'file|mimes:pdf|max:8192',
            'nacimiento' => 'file|mimes:pdf|max:8192',
            'domicilio' => 'file|mimes:pdf|max:8192',
        ]);
 
        // $ine_trasera = '';
        // $ine_delantera = '';
        // $antecedentes = '';
        // $recomendacion = '';
        // $estudios = '';
        // $nacimiento = '';
        // $domicilio = '';

        $ruta = public_path() . '/img/gestion/Empleados';

        $empleado = Empleados::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->curp = $request->curp;
        $empleado->rfc = $request->rfc;
        $empleado->nss = $request->nss;
        $empleado->puesto = $request->puesto;
        $empleado->fecha_ingreso = $request->fecha_ingreso;
        $empleado->fecha_nacimiento = $request->fecha_nacimiento;
        $empleado->fecha_2doContrato = $request->fecha_2doContrato;
        $empleado->fecha_3erContrato = $request->fecha_3erContrato;
        $empleado->fecha_indefinido = $request->fecha_indefinido;
        $empleado->telefono = $request->telefono;
        $empleado->num_clinicaSS = $request->num_clinicaSS;
        $empleado->salario_dia = $request->salario_dia;
        $empleado->ine = $request->ine;  
        $empleado->nomina = $request->nomina;  

        if ($request->hasFile('imagen_perfil')) {
            $perfil = $request->file('imagen_perfil');
            $nombreImagen =  "PP_" . $request->nombre  . "." . $perfil->getClientOriginalExtension();
            $perfil->move($ruta,$nombreImagen);
            $empleado->imagen_perfil = $nombreImagen;
        }

        if ($request->hasFile('antecedentes')) {
            $archivopdf = $request->file('antecedentes')->store('public/Documentación');
            $antecedentes = 'antecedentes_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $antecedentes;
            $empleado->antecedentes = $antecedentes;
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('recomendacion')) {
            $archivopdf = $request->file('recomendacion')->store('public/Documentación');
            $recomendacion = 'recomendacion_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $recomendacion;
            $empleado->recomendacion = $recomendacion;  
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('estudios')) {
            $archivopdf = $request->file('estudios')->store('public/Documentación');
            $estudios = 'estudios_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $estudios;
            $empleado->estudios = $estudios;  
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('nacimiento')) {
            $archivopdf = $request->file('nacimiento')->store('public/Documentación');
            $nacimiento = 'nacimiento_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $nacimiento;
            $empleado->nacimiento = $nacimiento;  
            Storage::move($archivopdf,$ruta);
        }

        if ($request->hasFile('domicilio')) {
            $archivopdf = $request->file('domicilio')->store('public/Documentación');
            $domicilio = 'domicilio_' . $request->nombre . ".pdf";
            $ruta = 'public/Documentación/' . $domicilio;
            $empleado->domicilio = $domicilio;  
            Storage::move($archivopdf,$ruta);
        }

        $ruta = public_path() . '/img/gestion/Empleados';

        if ($request->hasFile('ine_trasera')) {
            $archivo = $request->file('ine_trasera');
            $ine_trasera = 'ine_trasera_' . $request->nombre . "." . $archivo->getClientOriginalExtension();
            $archivo->move($ruta,$ine_trasera);
            $empleado->ine_trasera = $ine_trasera;  
        }

        if ($request->hasFile('ine_delantera')) {
            $archivo = $request->file('ine_delantera');
            $ine_delantera = 'ine_delantera_' . $request->nombre . "." . $archivo->getClientOriginalExtension();
            $archivo->move($ruta,$ine_delantera);
            $empleado->ine_delantera = $ine_delantera; 
        } 

        $empleado->save();

        return redirect()->route('mostrarEmpleado.show');
    }  

    public function eliminar($id)
    {
        $empleado = Empleados::find($id);

        return view('gestion.crearBaja',[
            'empleado' => $empleado,
        ]);
    }

    public function ver_pdf($id,$tipo)
    {
        $empleado =  Empleados::find($tipo);

        if($id == 'antecedentes'){
            $filename = $empleado->antecedentes; 
        }
        elseif($id == 'recomendacion'){
            $filename = $empleado->recomendacion; 
        }
        elseif($id == 'estudios'){
            $filename = $empleado->estudios; 
        }
        elseif($id == 'nacimiento'){
            $filename = $empleado->nacimiento; 
        }
        elseif($id == 'domicilio'){
            $filename = $empleado->domicilio; 
        };

        $path = storage_path('app/public/Documentación/' . $filename);
        
        if (file_exists($path)) {
            // Configurar el id de respuesta como PDF
            $headers = ['Content-Type' => 'application/pdf'];
    
            // Descargar el archivo
            return response()->file($path, $headers);
        };
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

        $testigo1 = $request->nombresreg[0];
        $testigo2 = $request->nombresreg[1];
        $testigo3 = $request->nombresreg[2];
        
        $fecha_actual = Carbon::now(); // Obtiene la fecha y hora actual

        // $empleado =  Faltas::where('curp',$curp)->where('acta_administrativa','!=','0')
        // ->where('acta_realizada','No')->orderBy('created_at', 'desc')->first();

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
        ->orderBy('created_at', 'desc')
        ->get();    

        return view('PDF.mostrarActasPDF',[
            'faltas' => $faltas
        ]);
    }
}
