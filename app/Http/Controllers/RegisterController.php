<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function GetRegisterPage()
    {
        return view('auth/register');
    }

    public function PostRegisterData(Request $request)
    {
        if(!$this->ValidateEmail($request->email))
        {
            dd("Email e ono cuk");
        }
        else if(!$this->ValidatePassword($request->password))
        {
            dd("Password e kurang dowo cuk");
        }
        else if(!$this->IsSamePassword($request->password, $request->confirm))
        {
            dd("Password e gak podo cuk");
        }
        else
        {
            dd("bener cuk");
        }
    }

    //Function for validating password length
    private function ValidatePassword($password)
    {
        return (strlen($password) < 6) ? false : true;
    }

    //Function for validating confirmation password must be same with password
    private function IsSamePassword($password, $confirmPassword)
    {
        return (strcmp($password, $confirmPassword) == 0) ? true : false;
    }

    //Function for validating email already exist or not
    private function ValidateEmail($email)
    {
        return (User::where('email', '=', $email)->first() != null) ? false : true;
    }
}
