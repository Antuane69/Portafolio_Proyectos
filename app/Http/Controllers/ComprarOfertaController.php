<?php

namespace App\Http\Controllers;

use App\Models\Comprar;
use App\Models\ComprarCuenta;
use App\Models\ComprarOferta;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComprarOfertaController extends Controller
{
    public function index(Post $post) 
    {
        return view('compra.compraroferta',[
            'posts' => $post
        ]);
    }

    public function store(Request $request, Post $post)
    {
        //Validacion
        $this->validate($request,[
            'oferta' => 'required|numeric|min:10000',
            'justificacion' => 'required|min:3|max:40'
        ]);

        $post->compraoferta()->create([
            'user_id' => auth()->user()->id,
            'oferta' => $request->oferta,
            'justificacion' => $request->justificacion, 
            'aceptado' => 0
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function aceptar(ComprarOferta $ofertas)
    {
        ComprarOferta::where('user_id',$ofertas->user_id)->where('post_id',$ofertas->post_id)->where('id',$ofertas->id)->update(['aceptado' => 1]);

        $aux = ($ofertas->post->existencia)-1;
        $ofertas->post->existencia = $aux;

        if($ofertas->post->existencia == 0){
            $ofertas->post->estado = "Si";
        }

        $ofertas->post->save();

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function destroy(ComprarOferta $ofertas)
    {
        ComprarOferta::where('user_id',$ofertas->user_id)->where('post_id',$ofertas->post_id)->where('aceptado',0)->where('id',$ofertas->id)->delete();
        return back();
    }

    public function view(User $user)
    {
        $ofertas = ComprarOferta::where('user_id',auth()->user()->id)->where('aceptado',0)->get();

        return view('compra.ofertas',[
            'ofertas'=>$ofertas,
            'user' => $user
        ]);
    }

    public function clients(User $user)
    {

        $aux = Comprar::where('user_id',auth()->user()->id)->get();
        $aux2 = ComprarCuenta::where('user_id',auth()->user()->id)->get();
        $aux3 = ComprarOferta::where('user_id',auth()->user()->id)->where('aceptado',1)->get();
 
        $tarjeta = [];
        $cuenta = [];
        $ofertas = [];

        if (($aux->count()>0) || ($aux2->count()>0) || ($aux3->count()>0)){

            foreach($aux as $auxiliar){
                $tarjeta[] = Post::where('id',$auxiliar->post_id)->get();
                $tarjeta[] = $auxiliar->created_at;
            };
            
            foreach($aux2 as $auxiliar2){
                $cuenta[] = Post::where('id',$auxiliar2->post_id)->get();
                $cuenta[] = $auxiliar2->created_at;
            };
            
            foreach($aux3 as $auxiliar3){
                $ofertas[] = Post::where('id',$auxiliar3->post_id)->get();
                $ofertas[] = $auxiliar3->oferta;
                $ofertas[] = $auxiliar3->created_at;
            };

            return view('compra.comprarcliente',[
                'tarjeta' => $tarjeta,
                'cuenta' => $cuenta,
                'ofertas' => $ofertas
            ]);
        }else{
            return view('compra.comprarcliente',[
                'tarjeta' => $tarjeta,
                'cuenta' => $cuenta,
                'ofertas' => $ofertas
            ]);
        };

    }
}
