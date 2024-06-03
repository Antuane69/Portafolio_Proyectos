<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ComprarCuentaController extends Controller
{
    public function index(Post $post) 
    {
        return view('compra.comprarcuenta',[
            'posts' => $post
        ]);
    }

    
    public function store(Request $request, Post $post)
    {
        // Modificar el request
        //$request->request->add(['username' => Str::slug($request->username)]);

        //Validacion
        $this->validate($request,[
            'numcuenta' => 'required|min:18|max:21',
            'nombre' => 'required|min:4|max:60'
        ]);

        $post->compracuenta()->create([
            'user_id' => auth()->user()->id,
            'numcuenta' => $request->numcuenta,
            'nombre' => $request->nombre  
        ]);

        $aux = ($post->existencia)-1;
        $post->existencia = $aux;

        if($post->existencia == 0){
            $post->estado = "Si";
        }

        $post->save();

        //Redireccionar
        return redirect()->route('posts.index', auth()->user()->username);
    }

}
