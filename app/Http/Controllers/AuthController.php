<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
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
        
        Alert::success('Registration Success', 'Your account has been created. Please login');
        return redirect('/login');
    }
}
