<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile_image'), $imageName);

            $data['image'] = $imageName;
            $data['user_id'] = auth()->user()->id;
        }

        $post->update($data);

        return redirect()->route('main.index');
    }
}
