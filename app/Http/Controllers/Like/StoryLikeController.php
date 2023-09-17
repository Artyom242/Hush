<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\BaseController;
use App\Models\Post;

class StoryLikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}

