<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comprar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ComprarController extends Controller
{

    public function view(Post $post){
        return view('compra.comprarindex',[
            'posts' => $post
        ]);
    }

    public function index(Post $post) 
    {
        return view('compra.comprar',[
            'posts' => $post
        ]);
    }

    
    public function store(Request $request, Post $post)
    {
        // Modificar el request
        //$request->request->add(['username' => Str::slug($request->username)]);

        //Validacion
        $this->validate($request,[
            'numcard' => 'required|min:16|max:16',
            'cvc' => 'required|min:4|max:9999',
            'yearexp' => 'required|min:4|max:5'
        ]);

        $post->compras()->create([
            'user_id' => auth()->user()->id,
            'numcard' => $request->numcard,
            'cvc' => Hash::make($request->cvc),
            'yearexp' => $request->yearexp  
        ]);

        // $post->ventas()->create([
        //     'user_id' => auth()->user()->id,
        //     'post_id' => $post->id,
        //     'usertajeta_id' => auth()->user()->id,
        //     'usercuenta_id' => 0,
        //     'useroferta_id' => 0
        // ]);

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