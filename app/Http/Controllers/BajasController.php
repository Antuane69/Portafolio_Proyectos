<?php

namespace App\Http\Controllers;

use App\Models\Bajas;
use Illuminate\Http\Request;

class BajasController extends Controller
{
    public function show(){

        $bajas = Bajas::all();
        
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
}
