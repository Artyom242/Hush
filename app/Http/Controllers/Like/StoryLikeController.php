<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Like\StoreRequest;
use App\Models\Like;
use App\Models\Post;

class StoryLikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle();

        return redirect()->back();
    }
}

