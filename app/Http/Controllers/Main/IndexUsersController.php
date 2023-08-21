<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexUsersController extends Controller
{
    public function __invoke()
    {
        $users = User::latest()->paginate(10);

        return view('user.users', compact('users'));
    }
}
