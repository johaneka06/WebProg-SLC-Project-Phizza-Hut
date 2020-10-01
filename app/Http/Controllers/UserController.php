<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserPage()
    {
        $users = User::get();
        return view('admin/users', ['users' => $users]);
    }
}
