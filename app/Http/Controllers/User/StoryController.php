<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Auth\Events\Registered;

class StoryController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();;
        if ($request->text || $request->image != null) {
            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('posts'), $imageName);

                $data['image'] = $imageName;
            }

            $data['user_id'] = auth()->user()->id;

            Post::create($data);
        }

        return redirect()->route('main.index');
    }
}
