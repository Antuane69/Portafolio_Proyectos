<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
Use App\Models\Like;
use App\Models\ComprarOferta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    public function index(User $user)
    {
        global $a;
        
        if($user->estatus == 'Cliente'){
            $ids=auth()->user()->likes->pluck('post_id')->toArray();
            $posts=Post::whereIn('id',$ids)->latest()->paginate(16);
            $filtro = Post::select('marca')->distinct('marca')->get()->pluck('marca');
            
            $oferta = ComprarOferta::query('compraroferta')->where('user_id',$user->id)->where('aceptado',1)->get();
            $aux2 = $user->compras->count()+$user->compracuenta->count()+$oferta->count();
            $a = 0;
        }else{
            $ids=auth()->user()->posts->pluck('id')->toArray();
            $posts=ComprarOferta::whereIn('post_id',$ids)->latest()->paginate(16);
            $aux = ComprarOferta::whereIn('post_id',$ids)->where('aceptado',0)->get();
            $filtro = Post::select('marca')->distinct('marca')->get()->pluck('marca');

            $aux2 = 0;
            $a = $aux->count();
        }

        return view('dashboard',[
            'user' => $user,
            'posts' => $posts,
            'filtrado' => $filtro,
            'a' => $a,
            'aux' => $aux2
        ]);

    }

    public function view(User $user,$a)
    {
        $posts = Post::where('user_id',auth()->user()->id)->latest()->paginate(8);

        return view('venposts',[
            'user'=>$user,
            'posts'=>$posts,
            'a'=>$a
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'marca' => 'required|max:30|uppercase',
            'modelo' => 'required|max:100',
            'anio' => 'numeric|required|min:1960|max:2030',
            'color' => 'required|max:100',
            'precio' => 'numeric|min:10000|max:9000000|required',
            'fallas' => 'required',
            'descripcion' => 'required',
            'existencia' => 'required|numeric|min:1|max:10000',
            'imagen' => 'required'
        ]);

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anio' => $request->anio,
            'color' => $request->color,
            'precio' => $request->precio,
            'fallas' => $request->fallas,
            'descripcion' => $request->descripcion,
            'existencia' => $request->existencia,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index',auth()->user()->username);
    }

    public function show(User $user,Post $post)
    {
        $arr = [];

        if(auth()->user()->estatus == 'Cliente')
        {
            $full = Post::where('marca',$post->marca)->where('id','!=',$post->id)->get();
            $money = Post::where('precio','<=',$post->precio)->where('id','!=',$post->id)->get();
            $relacion = DB::table('likes')->where('user_id',auth()->user()->id)->where('post_id','!=',$post->id)->get();
            
            foreach($relacion as $rel){
                $interes = Post::where('id',$rel->post_id)->where('id','!=',$post->id)->get();
            };

            foreach ($full as $pub){
                if ($pub->estado == 'No'){
                    $arr[] = $pub->imagen;
                };
            }

            foreach ($money as $my){
                if ($my->estado == 'No'){
                    $arr[] = $my->imagen;
                };
            }

            $aux = sizeof($arr);

            for ($i=0; $i < 2; $i++) { 
                $r = rand(0,$aux-1);
                $arr2[] = $arr[$r];
            }

            return view('posts.show',[
                'post' => $post,
                'user' => $user,
                'arr' => $arr
            ]);

        };

        return view('posts.show',[
            'post' => $post,
            'user' => $user
        ]);

    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();

        //Eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->imagen);
        if(File::exists($imagen_path))
        {
            unlink($imagen_path);       
        } 

        return redirect()->route('posts.index',auth()->user()->username);
    }

    public function pause(User $user, Post $post)
    {
        $post->estado="Si";
        $post->save();
        return redirect()->route('posts.show',[auth()->user()->username,'post'=>$post->id]);
    }

    public function play(User $user, Post $post)
    {
        $post->estado="No";
        $post->save();
        return redirect()->route('posts.show',[auth()->user()->username,'post'=>$post->id]);
    }

}


