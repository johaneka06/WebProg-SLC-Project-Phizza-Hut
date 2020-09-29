<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
            $cookie = new Cookie();
            if($request->rememberme == 'on') {
                $cookie = Cookie::queue(Cookie::make('email', $request->email, 120));
            }
            return redirect('/');
        }
        else 
        {
            return redirect('/login')->withErrors('Email/Password is incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        if(Cookie::get('email') != null) Cookie::queue(Cookie::forget('email'));
        return redirect('/');
    }
}
