<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Post $post)
    {
        return view('posts.postindex',[
            'post' =>$post
        ]);
    }

    public function store(Request $request, Post $post)
    {
        //$request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'titulo' => 'required|max:255',
            'marca' => 'required|max:30',
            'modelo' => 'required|max:100',
            'anio' => 'numeric|required|min:1960|max:2030',
            'color' => 'required|max:100',
            'precio' => 'numeric|min:10000|max:9000000|required',
            'fallas' => 'required',
            'descripcion' => 'required',
            'existencia' => 'required|numeric|min:1|max:10000',
            'imagen' => 'required'
        ]);

        if($request->imagen)
        {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
    
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);
    
            $imagenPath = public_path('uploads') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $post->titulo = $request->titulo;
        $post->marca = $request->marca;
        $post->modelo = $request->modelo;
        $post->anio = $request->anio;
        $post->color = $request->color;
        $post->precio = $request->precio;
        $post->fallas = $request->fallas;
        $post->descripcion = $request->descripcion;
        $post->existencia = $request->existencia;
        $post->imagen = $nombreImagen ?? $post->imagen ?? null;
        $post->save();

        return redirect()->route('posts.show',[auth()->user()->username,'post'=>$post->id]);
    }
}
