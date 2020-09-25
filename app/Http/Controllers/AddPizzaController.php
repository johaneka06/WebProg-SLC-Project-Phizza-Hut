<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Pizza;
use Illuminate\Http\Request;

class AddPizzaController extends Controller
{
    public function GetInsertPage() {
        return view('admin/insertpizza');
    }

    public function Store(PizzaRequest $request) {
        $pizza = $request->file('img');

        $file_name = $pizza->getClientOriginalName();
        $pizza->move('pizza', $file_name);

        Pizza::create([
            'name' => $file_name,
            'price' => (int) $request->price,
            'desc' => $request->desc,
            'img_loc' => $file_name
        ]);

        return redirect('/');
    }
}
