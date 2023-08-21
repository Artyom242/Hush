<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\UpdateProfileRequest;
use App\Models\User;

class UpdateProfileController extends BaseController
{
    public function __invoke(UpdateProfileRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/profile_image'), $imageName);

            $data['image'] = $imageName;
        }

        $user->update($data);

        return redirect()->route('main.index');
    }
}
