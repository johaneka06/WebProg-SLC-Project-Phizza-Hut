<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddPizzaController extends Controller
{
    public function GetInsertPage() {
        return view('admin/insertpizza');
    }

    public function Store(PizzaRequest $request) {
        $pizza = $request->file('img');

        $path = Storage::disk('local')->put('public', $pizza, 'public');
        $path = basename($path);

        Pizza::create([
            'name' => $request->name,
            'price' => (int) $request->price,
            'desc' => $request->desc,
            'img_loc' => $path
        ]);

        return redirect('/');
    }
}
