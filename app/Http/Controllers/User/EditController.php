<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Post;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        return view('post.edit', compact('post'));
    }
}
