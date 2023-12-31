<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($user_id)
    {

        $posts = Post::latest()->where('user_id', $user_id )->paginate(10);
        $user = User::find($user_id);


        return view('user.index', compact( 'posts', 'user'));
    }
}
