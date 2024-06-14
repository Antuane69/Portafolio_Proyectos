<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokyoController extends Controller
{
    public function inicio(){
        if(Auth::check()){
            return view('dashboard');
        }else{
            return view('auth.login');
        };
    }

    public function create_faltas()
    {
        $opciones = ['Amonestación','Acta Administrativa'];

        return view('gestion.crearFaltas',[
            'opciones' => $opciones
        ]);
    }

    public function search(Request $request){

        $empleado = Empleados::where('nombre', 'LIKE' , $request->nombre . '%')->first();
    
        return response()->json([
            'success' => true,
            'empleado' => $empleado
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

    public function create_herramientas()
    {
        $nombres = Empleados::query()->get();

        $nombres = $nombres->pluck('nombre')->toArray();

        $opciones = ['Cocina','Servicio','Barra','Producción'];

        return view('almacen.crearHerramienta',[
            'nombres' => $nombres,
            'opciones' => $opciones
        ]);
    }

    public function show_horarios(){

        $horario = Horarios::orderBy('created_at', 'desc')->first();
        $horarioServicio = HorariosServicio::orderBy('created_at', 'desc')->first();

        $areas = ['COCINA','SERVICIO','BARRA'];

        if($horario){
            $nombreArea = 'COCINA';

            $nombres = $horario->cocinero_lunes;
            $clunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($clunes); $i++) {
                $clunes[$i] = ltrim($clunes[$i], ',');
            }
    
            $horario->clunes = $clunes;
    
            $nombres = $horario->cocinero_martes;
            $cmartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cmartes); $i++) {
                $cmartes[$i] = ltrim($cmartes[$i], ',');
            }
    
            $horario->cmartes = $cmartes;
    
            $nombres = $horario->cocinero_miercoles;
            $cmiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cmiercoles); $i++) {
                $cmiercoles[$i] = ltrim($cmiercoles[$i], ',');
            }
    
            $horario->cmiercoles = $cmiercoles;
    
            $nombres = $horario->cocinero_jueves;
            $cjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cjueves); $i++) {
                $cjueves[$i] = ltrim($cjueves[$i], ',');
            }
    
            $horario->cjueves = $cjueves;
    
            $nombres = $horario->cocinero_viernes;
            $cviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cviernes); $i++) {
                $cviernes[$i] = ltrim($cviernes[$i], ',');
            }
    
            $horario->cviernes = $cviernes;
    
            $nombres = $horario->cocinero_sabado;
            $csabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($csabado); $i++) {
                $csabado[$i] = ltrim($csabado[$i], ',');
            }
    
            $horario->csabado = $csabado;
    
            $nombres = $horario->cocinero_domingo;
            $cdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cdomingo); $i++) {
                $cdomingo[$i] = ltrim($cdomingo[$i], ',');
            }
    
            $horario->cdomingo = $cdomingo;

            $auxf = new Carbon($horario->created_at);           
            $horario->registro = $auxf->format('d/m/Y');
            
            $horario->turno = ['12-00 AM a 18-00 PM','15-00 PM a 23 -00 AM','18-00 PM a 00-00 AM','Descansos'];
            $horario->turnoBarra = ['10-00 AM a 18-00 PM','18-00 PM a 00-00 AM'];

            return view('horarios.mostrarRegistroHorarios',[
                'horario' => $horario,
                'areas' => $areas,
                'nombreArea' => $nombreArea
            ]);

        }else if($horarioServicio){
            $nombreArea = 'SERVICIO';

            $nombres = $horarioServicio->servicio_lunes;
            $slunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($slunes); $i++) {
                $slunes[$i] = ltrim($slunes[$i], ',');
            }
    
            $horarioServicio->slunes = $slunes;
    
            $nombres = $horarioServicio->servicio_martes;
            $smartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($smartes); $i++) {
                $smartes[$i] = ltrim($smartes[$i], ',');
            }
    
            $horarioServicio->smartes = $smartes;
    
            $nombres = $horarioServicio->servicio_miercoles;
            $smiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($smiercoles); $i++) {
                $smiercoles[$i] = ltrim($smiercoles[$i], ',');
            }
    
            $horarioServicio->smiercoles = $smiercoles;
    
            $nombres = $horarioServicio->servicio_jueves;
            $sjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sjueves); $i++) {
                $sjueves[$i] = ltrim($sjueves[$i], ',');
            }
    
            $horarioServicio->sjueves = $sjueves;
    
            $nombres = $horarioServicio->servicio_viernes;
            $sviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sviernes); $i++) {
                $sviernes[$i] = ltrim($sviernes[$i], ',');
            }
    
            $horarioServicio->sviernes = $sviernes;
    
            $nombres = $horarioServicio->servicio_sabado;
            $ssabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($ssabado); $i++) {
                $ssabado[$i] = ltrim($ssabado[$i], ',');
            }
    
            $horarioServicio->ssabado = $ssabado;
    
            $nombres = $horarioServicio->servicio_domingo;
            $sdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sdomingo); $i++) {
                $sdomingo[$i] = ltrim($sdomingo[$i], ',');
            }
    
            $horarioServicio->sdomingo = $sdomingo;
    
            $nombres = $horarioServicio->barra_lunes;
            $blunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($blunes); $i++) {
                $blunes[$i] = ltrim($blunes[$i], ',');
            }
    
            $horarioServicio->blunes = $blunes;
    
            $nombres = $horarioServicio->barra_martes;
            $bmartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bmartes); $i++) {
                $bmartes[$i] = ltrim($bmartes[$i], ',');
            }
    
            $horarioServicio->bmartes = $bmartes;
    
            $nombres = $horarioServicio->barra_miercoles;
            $bmiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bmiercoles); $i++) {
                $bmiercoles[$i] = ltrim($bmiercoles[$i], ',');
            }
    
            $horarioServicio->bmiercoles = $bmiercoles;
    
            $nombres = $horarioServicio->barra_jueves;
            $bjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bjueves); $i++) {
                $bjueves[$i] = ltrim($bjueves[$i], ',');
            }
    
            $horarioServicio->bjueves = $bjueves;
    
            $nombres = $horarioServicio->barra_viernes;
            $bviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bviernes); $i++) {
                $bviernes[$i] = ltrim($bviernes[$i], ',');
            }
    
            $horarioServicio->bviernes = $bviernes;
    
            $nombres = $horarioServicio->barra_sabado;
            $bsabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bsabado); $i++) {
                $bsabado[$i] = ltrim($bsabado[$i], ',');
            }
    
            $horarioServicio->bsabado = $bsabado;
    
            $nombres = $horarioServicio->barra_domingo;
            $bdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bdomingo); $i++) {
                $bdomingo[$i] = ltrim($bdomingo[$i], ',');
            }
    
            $horarioServicio->bdomingo = $bdomingo;

            $auxf = new Carbon($horarioServicio->created_at);           
            $horarioServicio->registro = $auxf->format('d/m/Y');
            
            $horarioServicio->turno = ['12-00 AM a 18-00 PM','15-00 PM a 23-00 AM','18-00 PM a 00-00 AM','Descansos'];
            $horarioServicio->turnoBarra = ['10-00 AM a 18-00 PM','18-00 PM a 00-00 AM'];

            return view('horarios.mostrarRegistroHorarios',[
                'horario' => $horarioServicio,
                'areas' => $areas,
                'nombreArea' => $nombreArea
            ]);
        }else{
            return view('horarios.mostrarRegistroHorarios',[
                'horario' => '',
                'areas' => $areas,
                'nombreArea' => 'COCINA'
            ]);
        }
    }

    public function create_incapacidades()
    {
        return view('gestion.crearIncapacidad');
    }

    public function create_permisos()
    {
        if(auth()->user()->hasRole('admin')){
            $nombres = Empleados::all();
        }else{
            $nombres = Empleados::where('puesto',auth()->user()->puesto)->get();
        }
        $nombres = $nombres->pluck('nombre')->toArray();

        return view('gestion.crearPermisos',[
            'nombres' => $nombres
        ]);
    }
}

