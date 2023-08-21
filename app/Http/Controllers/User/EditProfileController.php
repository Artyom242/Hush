<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\User;

class EditProfileController extends BaseController
{
    public function __invoke(User $user)
    {
        return view('user.edit', compact('user'));
    }
}
