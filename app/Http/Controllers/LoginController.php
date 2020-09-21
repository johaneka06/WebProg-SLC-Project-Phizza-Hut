<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function GetLoginPage()
    {
        return view('auth/login');
    }

    public function PostLoginCred(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            dd('True');
        }
        else 
        {
            dd('false');
        }
    }
}
