<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke($post_id)
    {
        Post::destroy($post_id);

        return redirect()->route('main.index');
    }
}
