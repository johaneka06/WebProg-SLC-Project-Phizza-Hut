<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        $pizzas = Pizza::paginate(6);
        return view('index', ['pizzas' => $pizzas]);
    }

    public function getDetail($id)
    {
        $pizza = Pizza::where('id', '=', $id)->first();
        return view('pizza/detail', ['pizza' => $pizza]);
    }

    public function GetLoginPage()
    {
        return view('auth/login');
    }

    public function GetRegisterPage()
    {
        return view('auth/register');
    }

    public function search(Request $request)
    {
        dd($request->all());
    }
}
