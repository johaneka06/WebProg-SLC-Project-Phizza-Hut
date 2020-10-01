<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PizzaController extends Controller
{
    public function GetInsertPage() {
        return view('admin/insertpizza');
    }

    public function Store(PizzaRequest $request) {
        $request = $request->validated();

        $pizza = $request['img'];

        $path = Storage::disk('local')->put('public', $pizza, 'public');
        $path = basename($path);

        Pizza::create([
            'name' => $request['name'],
            'price' => (int) $request['price'],
            'desc' => $request['desc'],
            'img_loc' => $path
        ]);

        return redirect('/');
    }

    public function editPizza($id)
    {
        $pizza = Pizza::where('id', '=', $id)->first();
        return view('admin/editpizza', ['pizza' => $pizza]);
    }

    public function update(PizzaRequest $request, $id)
    {
        $request = $request->validated();
        $img = $request['img'];
        $path = Storage::disk('local')->put('public', $img, 'public');
        $path = basename($path);

        $pizza = Pizza::where('id', '=', $id)->first();

        $pizza->name = $request['name'];
        $pizza->desc = $request['desc'];
        $pizza->price = $request['price'];
        $pizza->img_loc = $path;

        $pizza->save();

        return redirect('/');
    }

    public function confirmation($id)
    {
        $pizza = Pizza::where('id', '=', $id)->first();

        return view('admin/deletepizza', ['pizza' => $pizza]);
    }

    public function deletePizza($id)
    {
        Pizza::where('id', '=', $id)->delete();

        Alert::success('Delete Success', 'Item has been deleted.');
        
        return redirect('/');
    }
}
