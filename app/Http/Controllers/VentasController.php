<?php

namespace App\Http\Controllers;

use App\Charts\ChartCreate;
use App\Models\Post;
use App\Models\User;
use App\Models\Ventas;
use App\Models\Comprar;
use Illuminate\Http\Request;
use App\Models\ComprarCuenta;
use App\Models\ComprarOferta;

class VentasController extends Controller
{
    public function index(User $user, Post $post)
    {

        $tarjeta = Comprar::where('post_id',$post->id)->get();
        $cuenta = ComprarCuenta::where('post_id',$post->id)->get();
        $oferta = ComprarOferta::where('post_id',$post->id)->where('aceptado',1)->get();
        $cliente = User::where('id','!=',auth()->user()->id)->get();

        return view('venta.indexventas',[
            'user' => $user,
            'posts' => $post,
            'tarjeta' => $tarjeta,
            'cuenta' => $cuenta,
            'oferta' => $oferta,
            'cliente' => $cliente
        ]);

        // return view('prueba.indexventas',[
        //         'chart' => $chart
        // ]);

    }
}
