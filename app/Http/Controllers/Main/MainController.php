<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke()
    {
        $posts = Post::latest()->paginate(10);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get();
        return view('post.index', compact('posts'));
    }
}
