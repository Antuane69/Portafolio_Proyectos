<?php

namespace App\Http\Controllers;

use App\Models\Bajas;
use App\Models\Empleados;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BajasController extends Controller
{
    public function show(){

        $bajas = Bajas::all();

        foreach($bajas as $baja){
            $auxf = new Carbon($baja->fecha_ingreso);
            $auxf2 = new Carbon($baja->fecha_baja);
            $baja->ingreso = $auxf->format('d/m/Y');
            $baja->baja = $auxf2->format('d/m/Y');
        }
        
        return view('gestion.mostrarBajas',[
            'bajas' => $bajas
        ]);
    }

    public function detalles($id){

        $empleado = Bajas::query()->find($id);

        return view('gestion.detallesBajas',[
            'empleado' => $empleado,
        ]);
    }

    public function createExtraVista(){
        return view('gestion.crearBajaExtra');
    }

    public function createExtraStore(Request $request){
        $id = Empleados::where('curp',$request->curp)->pluck('id')->first();

        return redirect()->route('crearBajas.create',['id' => $id]);
    }

    public function create($id){
        $empleado = Empleados::withTrashed()->find($id);
        $fechaActual = Carbon::now(); // Obtiene la fecha y hora actual
        $diferencia = $fechaActual->diff($empleado->fecha_ingreso);

        // Obtener los componentes de la diferencia
        $anios = $diferencia->y;
        $meses = $diferencia->m;
        $dias = $diferencia->d;

        $antiguedad = $anios . " años, " . $meses . " meses y, " . $dias . " días.";

        //$fechaPeriodico_Real = $fechaCarbon2->format('Y-m-d');
        $fecha_baja = $fechaActual->format('Y-m-d');

        return view('gestion.crearBaja',[
            'empleado' => $empleado,
            'antiguedad' => $antiguedad,
            'fecha_baja' => $fecha_baja
        ]);
    }

    public function store(Request $request, $id){

        $empleado = Empleados::withTrashed()->find($id);

        $this->validate($request, [
            // ... tus reglas de validación ...
            'antiguedad' => 'required',
            'fecha_baja' => 'required|date',
            'anticipacion' => 'required',
            'causa' => 'required',
        ]);
        
        if($empleado->imagen_perfil != ''){
            $ruta = public_path() . '/img/gestion/Empleados/' . $empleado->imagen_perfil;
            $rutaDestino = public_path() . '/img/gestion/Bajas/' . $empleado->imagen_perfil;
            $nombreImagen = $empleado->imagen_perfil;
            // Mover la imagen
            File::move($ruta, $rutaDestino);
        }else{
            if($request->file('imagen_perfil') != ''){
                $ruta = public_path() . '/img/gestion/Empleados/' . $empleado->imagen_perfil;
                $perfil = $request->file('imagen_perfil');
                $nombreImagen =  time()."_".$perfil->getClientOriginalName();
                $perfil->move($ruta,$nombreImagen);
            }else{
                $nombreImagen = '';
            }
        }

        Bajas::create([
            'nombre' => $empleado->nombre,
            'curp' => $empleado->curp,
            'rfc' => $empleado->rfc,
            'nss' => $empleado->nss,
            'puesto' => $empleado->puesto,
            'fecha_ingreso' => $empleado->fecha_ingreso,
            'fecha_nacimiento' => $empleado->fecha_nacimiento,
            'fecha_baja' => $request->fecha_baja,
            'telefono' => $empleado->telefono,
            'num_clinicaSS' => $empleado->num_clinicaSS,
            'salario_dia' => $empleado->salario_dia,
            'imagen_perfil' => $nombreImagen,
            'antiguedad' => $request->antiguedad,
            'causa' => $request->causa,
            'anticipacion' => $request->anticipacion,
        ]);

        $empleado->delete();
        
        return redirect()->route('mostrarBajas.show')->with('success', 'Empleado Dado de Baja con éxito.');
        // return redirect()->route('mostrarFaltas.show')->with('success', 'Registro de Faltas Editado con éxito.');
    }

    public function restaurar($id)
    {
        $baja = Bajas::find($id);
        $id = Empleados::withTrashed()->where('nombre',$baja->nombre)->pluck('id')->first(); 

        // Buscar el modelo eliminado con el ID
        $elemento = Empleados::withTrashed()->find($id);

        // Verificar si el elemento existe
        if ($elemento) {
            if($baja->imagen_perfil != ''){
                $ruta = public_path() . '/img/gestion/Bajas/' . $baja->imagen_perfil;
                $rutaDestino = public_path() . '/img/gestion/Empleados/' . $baja->imagen_perfil;
                // Mover la imagen
                File::move($ruta, $rutaDestino);
            }
            // Restaurar el elemento
            $elemento->restore();

            $baja->delete();

            return redirect()->route('mostrarEmpleado.show')->with('success', 'Registro de Empleado Restaurado con éxito.');
        } else {
            return redirect()->route('mostrarBajas.show')->with('success', 'Registro de Empleado No Encontrado.');
        }
    }
}
