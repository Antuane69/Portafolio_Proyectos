<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Audit;
use App\Models\Empleados;
use App\Models\Vacaciones;
use Illuminate\Http\Request;
use App\Models\Incapacidades;

class IncapacidadesController extends Controller
{
    public function show(){

        $incapacidades = Incapacidades::query()->orderBy('created_at', 'desc')->with('empleado')->get();
        
        foreach($incapacidades as $incapacidad){
            $auxf = new Carbon($incapacidad->fecha_inicio);
            $auxf2 = new Carbon($incapacidad->fecha_regreso);

            $incapacidad->inicio = $auxf->format('d/m/Y');
            $incapacidad->regreso = $auxf2->format('d/m/Y');
        }

        return view('gestion.mostrarIncapacidades',[
            'incapacidades' => $incapacidades
        ]);
    }

    public function create()
    {
        return view('gestion.crearIncapacidad');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'curp' => 'required|min:18',
            'motivo' => 'required|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_regreso' => 'required|date|after:fecha_inicio'
        ]);

        Incapacidades::create([
            'curp' => $request->curp,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_regreso' => $request->fecha_regreso,
            'dias_totales' => $request->dias_totales,
            'motivo' => $request->motivo,
            'comentarios' => $request->comentarios,
        ]);

        return redirect()->route('mostrarIncapacidades.show');
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE', $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
        ]);
    }

    public function edit_show($id)
    {
        $incapacidad = Incapacidades::find($id);

        return view('gestion.editIncapacidad',[
            'incapacidad' =>$incapacidad,
        ]);
    }

    public function edit_store(Request $request, $id)
    {
        $incapacidad = Incapacidades::with('empleado')->find($id);
        $originalValues = $incapacidad->getOriginal();

        $incapacidad->curp = $request->curp;
        $incapacidad->fecha_inicio = $request->fecha_inicio;
        $incapacidad->fecha_regreso = $request->fecha_regreso;
        $incapacidad->dias_totales = $request->dias_totales;
        $incapacidad->motivo = $request->motivo;
        $incapacidad->comentarios = $request->comentarios;
        $incapacidad->save();

        // Registrar los cambios en la tabla de auditoría
        $changes = $incapacidad->getChanges();
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
            'tipo' => 'Incapacidad',
        ]);

        return redirect()->route('mostrarIncapacidades.show');
    }  

    public function eliminar($id)
    {
        Incapacidades::find($id)->delete();

        return back()->with('success', 'Registro de Incapacidad Eliminado con éxito.');
    }
    
}