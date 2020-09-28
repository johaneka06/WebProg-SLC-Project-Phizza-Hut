<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function GetRegisterPage()
    {
        return view('auth/register');
    }

    public function PostRegisterData(RegisterUser $request)
    {
        $validated = $request->validated();

        $newUser = new User();
        $newUser->username = $validated['username'];
        $newUser->email = $validated['email'];
        $newUser->password = bcrypt($validated['password']);
        $newUser->address = $validated['address'];
        $newUser->phone_no = $validated['phone'];
        $newUser->gender = $validated['gender'];
        $newUser->role = "Member";
        $newUser->remember_token = Str::random(32);

        $newUser->save();
        
    }
}
