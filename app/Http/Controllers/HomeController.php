<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

use function PHPUnit\Framework\returnValue;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        if(auth()->user() == null)
        {
            return view('faq');
        }

        static $aux = "";
        
        $error = "";

        if($request->filtro != ''){
            if ($request->filtro == 'Todos' or $request->filtro == ''){
                $posts=Post::query()->inRandomOrder()->paginate(16);
            }else{
                $posts=Post::where('marca',$request->filtro)->latest()->paginate(16);
            }
            $aux = $request->filtro;
            $request->session()->put('auxiliar', $aux);
            $auxiliar = session('auxiliar');
        }else{
            $posts=Post::query()->inRandomOrder()->paginate(16);
        }

        if($request->buscador != ''){
            $posts=Post::where("titulo",'like',$request->buscador.'%')->paginate(16);
            if($posts->count() == 0){
                session()->flash('success', "No se a encontrado nada en tu búsqueda.");

                $posts=Post::query()->inRandomOrder()->paginate(16);
            }
        }

        if($request->ordenar != '')
        {
            if ($request->ordenar == 'AZ' or $request->ordenar == ''){
                if(session('auxiliar') == "Todos"){
                    $posts=Post::query('posts')->orderBy('titulo','ASC')->paginate(16);    
                }else{
                    $auxiliar = session('auxiliar');
                    $posts=Post::where('marca',$auxiliar)->orderBy('titulo','ASC')->paginate(16);
                }
            }elseif ($request->ordenar == 'ZA') {
                if(session('auxiliar') == "Todos"){
                    $posts=Post::orderBy('titulo','DESC')->paginate(16); 
                }else{
                    $auxiliar = session('auxiliar');
                    $posts=Post::where('marca',$auxiliar)->orderBy('titulo','DESC')->paginate(16); 
                }
            }
        }

        $filtro = Post::select('marca')->distinct('marca')->get()->pluck('marca');

        return view('home',[
            'posts' => $posts,
            'filtrado' => $filtro
        ]);
    }
}
