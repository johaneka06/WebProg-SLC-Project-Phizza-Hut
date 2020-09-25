<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\User;
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

        
        
    }
}
