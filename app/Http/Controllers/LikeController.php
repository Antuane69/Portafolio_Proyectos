<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, User $user, Post $posts)
    {

        $posts->likes()->create([
            'user_id' => $request->user()->id
        ]);

        $user->followers()->attach(auth()->user()->id);

        return back();
    }

    public function destroy(Request $request, User $user, Post $posts)
    {
        $request->user()->likes()->where('post_id',$posts->id)->delete();

        $user->followers()->detach(auth()->user()->id);

        return back();
    }
}
