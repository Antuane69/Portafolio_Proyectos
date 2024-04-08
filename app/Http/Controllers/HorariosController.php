<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Horarios;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\View\Components\Horario;

class HorariosController extends Controller
{
    public function show(){

        $horario = Horarios::orderBy('created_at', 'desc')->first();

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

        $nombres = $horario->servicio_lunes;
        $slunes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($slunes); $i++) {
            $slunes[$i] = ltrim($slunes[$i], ',');
        }

        $horario->slunes = $slunes;

        $nombres = $horario->servicio_martes;
        $smartes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($smartes); $i++) {
            $smartes[$i] = ltrim($smartes[$i], ',');
        }

        $horario->smartes = $smartes;

        $nombres = $horario->servicio_miercoles;
        $smiercoles = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($smiercoles); $i++) {
            $smiercoles[$i] = ltrim($smiercoles[$i], ',');
        }

        $horario->smiercoles = $smiercoles;

        $nombres = $horario->servicio_jueves;
        $sjueves = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($sjueves); $i++) {
            $sjueves[$i] = ltrim($sjueves[$i], ',');
        }

        $horario->sjueves = $sjueves;

        $nombres = $horario->servicio_viernes;
        $sviernes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($sviernes); $i++) {
            $sviernes[$i] = ltrim($sviernes[$i], ',');
        }

        $horario->sviernes = $sviernes;

        $nombres = $horario->servicio_sabado;
        $ssabado = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($ssabado); $i++) {
            $ssabado[$i] = ltrim($ssabado[$i], ',');
        }

        $horario->ssabado = $ssabado;

        $nombres = $horario->servicio_domingo;
        $sdomingo = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($sdomingo); $i++) {
            $sdomingo[$i] = ltrim($sdomingo[$i], ',');
        }

        $horario->sdomingo = $sdomingo;

        $nombres = $horario->barra_lunes;
        $blunes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($blunes); $i++) {
            $blunes[$i] = ltrim($blunes[$i], ',');
        }

        $horario->blunes = $blunes;

        $nombres = $horario->barra_martes;
        $bmartes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bmartes); $i++) {
            $bmartes[$i] = ltrim($bmartes[$i], ',');
        }

        $horario->bmartes = $bmartes;

        $nombres = $horario->barra_miercoles;
        $bmiercoles = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bmiercoles); $i++) {
            $bmiercoles[$i] = ltrim($bmiercoles[$i], ',');
        }

        $horario->bmiercoles = $bmiercoles;

        $nombres = $horario->barra_jueves;
        $bjueves = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bjueves); $i++) {
            $bjueves[$i] = ltrim($bjueves[$i], ',');
        }

        $horario->bjueves = $bjueves;

        $nombres = $horario->barra_viernes;
        $bviernes = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bviernes); $i++) {
            $bviernes[$i] = ltrim($bviernes[$i], ',');
        }

        $horario->bviernes = $bviernes;

        $nombres = $horario->barra_sabado;
        $bsabado = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bsabado); $i++) {
            $bsabado[$i] = ltrim($bsabado[$i], ',');
        }

        $horario->bsabado = $bsabado;

        $nombres = $horario->barra_domingo;
        $bdomingo = explode('*', str_replace('_', ', ', $nombres));
        // Eliminar la coma al final de cada nombre
        for ($i = 0; $i < count($bdomingo); $i++) {
            $bdomingo[$i] = ltrim($bdomingo[$i], ',');
        }

        $horario->bdomingo = $bdomingo;

        $auxf = new Carbon($horario->created_at);           
        $horario->registro = $auxf->format('d/m/Y');

        $areas = ['COCINA','SERVICIO','BARRA'];
        $horario->turno = ['6:00 AM a 12:00 PM','12:00 PM a 18:00 PM','18:00 PM a 00:00 AM'];
        $nombreArea = 'COCINA';

        return view('horarios.mostrarRegistroHorarios',[
            'horario' => $horario,
            'areas' => $areas,
            'nombreArea' => $nombreArea
        ]);
    }

    public function createTemplate()
    {
        return view('horarios.templateHorario');
    }

    public function storeTemplate(Request $request)
    {
        $nombres_a = Empleados::all();

        $nombres = $nombres_a->where('puesto','COCINERO')->pluck('nombre')->toArray();
        $nombres_ser = $nombres_a->whereIn('puesto', ['SERVICIO', 'MESERO', 'SERVICIO MIXTO'])->pluck('nombre')->toArray();
        $nombres_bar = $nombres_a->where('puesto','BARISTA')->pluck('nombre')->toArray();
        
        $contadorCocina = array();
        $contadorServicio = array();
        $contadorBarra = array();

        for ($i = 0; $i < 3; $i++) {
            $lunes = $request->input("Cocineroslunes" . $i);
            $martes = $request->input("Cocinerosmartes" . $i);
            $miercoles = $request->input("Cocinerosmiercoles" . $i);
            $jueves = $request->input("Cocinerosjueves" . $i);
            $viernes = $request->input("Cocinerosviernes" . $i);
            $sabado = $request->input("Cocinerossabado" . $i);
            $domingo = $request->input("Cocinerosdomingo" . $i);
        
            $contadorCocina[] = array(
                'lunes' => $lunes,
                'martes' => $martes,
                'miercoles' => $miercoles,
                'jueves' => $jueves,
                'viernes' => $viernes,
                'sabado' => $sabado,
                'domingo' => $domingo
            );

            $lunes = $request->input("Serviciolunes" . $i);
            $martes = $request->input("Serviciomartes" . $i);
            $miercoles = $request->input("Serviciomiercoles" . $i);
            $jueves = $request->input("Serviciojueves" . $i);
            $viernes = $request->input("Servicioviernes" . $i);
            $sabado = $request->input("Serviciosabado" . $i);
            $domingo = $request->input("Serviciodomingo" . $i);
        
            $contadorServicio[] = array(
                'lunes' => $lunes,
                'martes' => $martes,
                'miercoles' => $miercoles,
                'jueves' => $jueves,
                'viernes' => $viernes,
                'sabado' => $sabado,
                'domingo' => $domingo
            );

            $lunes = $request->input("Barralunes" . $i);
            $martes = $request->input("Barramartes" . $i);
            $miercoles = $request->input("Barramiercoles" . $i);
            $jueves = $request->input("Barrajueves" . $i);
            $viernes = $request->input("Barraviernes" . $i);
            $sabado = $request->input("Barrasabado" . $i);
            $domingo = $request->input("Barradomingo" . $i);
        
            $contadorBarra[] = array(
                'lunes' => $lunes,
                'martes' => $martes,
                'miercoles' => $miercoles,
                'jueves' => $jueves,
                'viernes' => $viernes,
                'sabado' => $sabado,
                'domingo' => $domingo
            );
        }

        return view('horarios.crearRegistroHorario',[
            'nombres' => $nombres,
            'nombres_ser' => $nombres_ser,
            'nombres_bar' => $nombres_bar,
            'contadorCocina' => $contadorCocina,
            'contadorBarra' => $contadorBarra,
            'contadorServicio' => $contadorServicio,
        ]);
    }

    public function store(Request $request)
    {

        for($k = 1;$k < 22;$k++){
            ${'datos' . $k} = '';
        }

        for($i = 0;$i<3;$i++){

            $valor1 = $request->input("cocinerolunes" . $i);
            foreach ($valor1 as $nombre) {
                if (!empty($datos1)) {
                    $datos1 .= '_';
                }
                $datos1 .= $nombre;
            }
            $datos1 .= '*';

            $valor2 = $request->input("cocineromartes" . $i);
            foreach ($valor2 as $nombre) {
                if (!empty($datos2)) {
                    $datos2 .= '_';
                }
                $datos2 .= $nombre;
            }
            $datos2 .= '*';

            $valor3 = $request->input("cocineromiercoles" . $i);
            foreach ($valor3 as $nombre) {
                if (!empty($datos3)) {
                    $datos3 .= '_';
                }
                $datos3 .= $nombre;
            }
            $datos3 .= '*';

            $valor4 = $request->input("cocinerojueves" . $i);
            foreach ($valor4 as $nombre) {
                if (!empty($datos4)) {
                    $datos4 .= '_';
                }
                $datos4 .= $nombre;
            }
            $datos4 .= '*';

            $valor5 = $request->input("cocineroviernes" . $i);
            foreach ($valor5 as $nombre) {
                if (!empty($datos5)) {
                    $datos5 .= '_';
                }
                $datos5 .= $nombre;
            }
            $datos5 .= '*';

            $valor6 = $request->input("cocinerosabado" . $i);
            foreach ($valor6 as $nombre) {
                if (!empty($datos6)) {
                    $datos6 .= '_';
                }
                $datos6 .= $nombre;
            }
            $datos6 .= '*';

            $valor7 = $request->input("cocinerodomingo" . $i);
            foreach ($valor7 as $nombre) {
                if (!empty($datos7)) {
                    $datos7 .= '_';
                }
                $datos7 .= $nombre;
            }
            $datos7 .= '*';

            $valor1 = $request->input("serviciolunes" . $i);
            foreach ($valor1 as $nombre) {
                if (!empty($datos8)) {
                    $datos8 .= '_';
                }
                $datos8 .= $nombre;
            }
            $datos8 .= '*';

            $valor2 = $request->input("serviciomartes" . $i);
            foreach ($valor2 as $nombre) {
                if (!empty($datos9)) {
                    $datos9 .= '_';
                }
                $datos9 .= $nombre;
            }
            $datos9 .= '*';

            $valor3 = $request->input("serviciomiercoles" . $i);
            foreach ($valor3 as $nombre) {
                if (!empty($datos10)) {
                    $datos10 .= '_';
                }
                $datos10 .= $nombre;
            }
            $datos10 .= '*';

            $valor4 = $request->input("serviciojueves" . $i);
            foreach ($valor4 as $nombre) {
                if (!empty($datos11)) {
                    $datos11 .= '_';
                }
                $datos11 .= $nombre;
            }
            $datos11 .= '*';

            $valor5 = $request->input("servicioviernes" . $i);
            foreach ($valor5 as $nombre) {
                if (!empty($datos12)) {
                    $datos12 .= '_';
                }
                $datos12 .= $nombre;
            }
            $datos12 .= '*';

            $valor6 = $request->input("serviciosabado" . $i);
            foreach ($valor6 as $nombre) {
                if (!empty($datos13)) {
                    $datos13 .= '_';
                }
                $datos13 .= $nombre;
            }
            $datos13 .= '*';

            $valor7 = $request->input("serviciodomingo" . $i);
            foreach ($valor7 as $nombre) {
                if (!empty($datos14)) {
                    $datos14 .= '_';
                }
                $datos14 .= $nombre;
            }
            $datos14 .= '*';

            $valor1 = $request->input("barlunes" . $i);
            foreach ($valor1 as $nombre) {
                if (!empty($datos15)) {
                    $datos15 .= '_';
                }
                $datos15 .= $nombre;
            }
            $datos15 .= '*';

            $valor2 = $request->input("barmartes" . $i);
            foreach ($valor2 as $nombre) {
                if (!empty($datos16)) {
                    $datos16 .= '_';
                }
                $datos16 .= $nombre;
            }
            $datos16 .= '*';

            $valor3 = $request->input("barmiercoles" . $i);
            foreach ($valor3 as $nombre) {
                if (!empty($datos17)) {
                    $datos17 .= '_';
                }
                $datos17 .= $nombre;
            }
            $datos17 .= '*';

            $valor4 = $request->input("barjueves" . $i);
            foreach ($valor4 as $nombre) {
                if (!empty($datos18)) {
                    $datos18 .= '_';
                }
                $datos18 .= $nombre;
            }
            $datos18 .= '*';

            $valor5 = $request->input("barviernes" . $i);
            foreach ($valor5 as $nombre) {
                if (!empty($datos19)) {
                    $datos19 .= '_';
                }
                $datos19 .= $nombre;
            }
            $datos19 .= '*';

            $valor6 = $request->input("barsabado" . $i);
            foreach ($valor6 as $nombre) {
                if (!empty($datos20)) {
                    $datos20 .= '_';
                }
                $datos20 .= $nombre;
            }
            $datos20 .= '*';

            $valor7 = $request->input("bardomingo" . $i);
            foreach ($valor7 as $nombre) {
                if (!empty($datos21)) {
                    $datos21 .= '_';
                }
                $datos21 .= $nombre;
            }
            $datos21 .= '*';
        };

        Horarios::create([
            'cocinero_lunes' => $datos1,
            // 'cocinero_lunes_h2' => $datos1,
            // 'cocinero_lunes_h3' => $datos1,
            'cocinero_martes' => $datos2,
            'cocinero_miercoles' => $datos3,
            'cocinero_jueves' => $datos4,
            'cocinero_viernes' => $datos5,
            'cocinero_sabado' => $datos6,
            'cocinero_domingo' => $datos7,
            'servicio_lunes' => $datos8,
            'servicio_martes' => $datos9,
            'servicio_miercoles' => $datos10,
            'servicio_jueves' => $datos11,
            'servicio_viernes' => $datos12,
            'servicio_sabado' => $datos13,
            'servicio_domingo' => $datos14,
            'barra_lunes' => $datos15,
            'barra_martes' => $datos16,
            'barra_miercoles' => $datos17,
            'barra_jueves' => $datos18,
            'barra_viernes' => $datos19,
            'barra_sabado' => $datos20,
            'barra_domingo' => $datos21,
        ]);

        return redirect()->route('horario.mostrar');
    }

    public function filtro(Request $request)
    {
        $horario = Horarios::orderBy('created_at', 'desc')->first();

        if($request->area == 'COCINA'){
            $nombres = $horario->cocinero_lunes;
            $clunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($clunes); $i++) {
                $clunes[$i] = ltrim($clunes[$i], ',');
            }
    
            $horario->lunes = $clunes;
    
            $nombres = $horario->cocinero_martes;
            $cmartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cmartes); $i++) {
                $cmartes[$i] = ltrim($cmartes[$i], ',');
            }
    
            $horario->martes = $cmartes;
    
            $nombres = $horario->cocinero_miercoles;
            $cmiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cmiercoles); $i++) {
                $cmiercoles[$i] = ltrim($cmiercoles[$i], ',');
            }
    
            $horario->miercoles = $cmiercoles;
    
            $nombres = $horario->cocinero_jueves;
            $cjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cjueves); $i++) {
                $cjueves[$i] = ltrim($cjueves[$i], ',');
            }
    
            $horario->jueves = $cjueves;
    
            $nombres = $horario->cocinero_viernes;
            $cviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cviernes); $i++) {
                $cviernes[$i] = ltrim($cviernes[$i], ',');
            }
    
            $horario->viernes = $cviernes;
    
            $nombres = $horario->cocinero_sabado;
            $csabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($csabado); $i++) {
                $csabado[$i] = ltrim($csabado[$i], ',');
            }
    
            $horario->sabado = $csabado;
    
            $nombres = $horario->cocinero_domingo;
            $cdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($cdomingo); $i++) {
                $cdomingo[$i] = ltrim($cdomingo[$i], ',');
            }
    
            $horario->domingo = $cdomingo;
        }elseif($request->area == 'SERVICIO'){
            $nombres = $horario->servicio_lunes;
            $slunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($slunes); $i++) {
                $slunes[$i] = ltrim($slunes[$i], ',');
            }
    
            $horario->lunes = $slunes;
    
            $nombres = $horario->servicio_martes;
            $smartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($smartes); $i++) {
                $smartes[$i] = ltrim($smartes[$i], ',');
            }
    
            $horario->martes = $smartes;
    
            $nombres = $horario->servicio_miercoles;
            $smiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($smiercoles); $i++) {
                $smiercoles[$i] = ltrim($smiercoles[$i], ',');
            }
    
            $horario->miercoles = $smiercoles;
    
            $nombres = $horario->servicio_jueves;
            $sjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sjueves); $i++) {
                $sjueves[$i] = ltrim($sjueves[$i], ',');
            }
    
            $horario->jueves = $sjueves;
    
            $nombres = $horario->servicio_viernes;
            $sviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sviernes); $i++) {
                $sviernes[$i] = ltrim($sviernes[$i], ',');
            }
    
            $horario->viernes = $sviernes;
    
            $nombres = $horario->servicio_sabado;
            $ssabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($ssabado); $i++) {
                $ssabado[$i] = ltrim($ssabado[$i], ',');
            }
    
            $horario->sabado = $ssabado;
    
            $nombres = $horario->servicio_domingo;
            $sdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($sdomingo); $i++) {
                $sdomingo[$i] = ltrim($sdomingo[$i], ',');
            }
    
            $horario->domingo = $sdomingo;
        }else{
            $nombres = $horario->barra_lunes;
            $blunes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($blunes); $i++) {
                $blunes[$i] = ltrim($blunes[$i], ',');
            }
    
            $horario->lunes = $blunes;
    
            $nombres = $horario->barra_martes;
            $bmartes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bmartes); $i++) {
                $bmartes[$i] = ltrim($bmartes[$i], ',');
            }
    
            $horario->martes = $bmartes;
    
            $nombres = $horario->barra_miercoles;
            $bmiercoles = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bmiercoles); $i++) {
                $bmiercoles[$i] = ltrim($bmiercoles[$i], ',');
            }
    
            $horario->miercoles = $bmiercoles;
    
            $nombres = $horario->barra_jueves;
            $bjueves = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bjueves); $i++) {
                $bjueves[$i] = ltrim($bjueves[$i], ',');
            }
    
            $horario->jueves = $bjueves;
    
            $nombres = $horario->barra_viernes;
            $bviernes = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bviernes); $i++) {
                $bviernes[$i] = ltrim($bviernes[$i], ',');
            }
    
            $horario->viernes = $bviernes;
    
            $nombres = $horario->barra_sabado;
            $bsabado = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bsabado); $i++) {
                $bsabado[$i] = ltrim($bsabado[$i], ',');
            }
    
            $horario->sabado = $bsabado;
    
            $nombres = $horario->barra_domingo;
            $bdomingo = explode('*', str_replace('_', ', ', $nombres));
            // Eliminar la coma al final de cada nombre
            for ($i = 0; $i < count($bdomingo); $i++) {
                $bdomingo[$i] = ltrim($bdomingo[$i], ',');
            }
    
            $horario->domingo = $bdomingo;
        }

        $auxf = new Carbon($horario->fecha_registro);           
        $horario->registro = $auxf->format('d/m/Y');

        $areas = ['COCINA','SERVICIO','BARRA'];
        $horario->turno = ['6:00 AM a 12:00 PM','12:00 PM a 18:00 PM','18:00 PM a 00:00 AM'];   

        return response()->json([
            'horario' => $horario,
            'success' => true,
        ]);
    }
}
