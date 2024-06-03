<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index(Post $post)
    {
        $vendedor = Post::where('user_id',$post->user_id)->get();
        $user = User::where('id',$post->user_id)->get();

        return view('perfil.vendedor',[
            'vendedor' => $vendedor,
            'user' => $user
        ]);
    }
}
