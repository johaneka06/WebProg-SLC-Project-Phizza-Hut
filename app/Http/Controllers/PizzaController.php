<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/insertpizza');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
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
        
        Alert::success('Insert', 'Success create pizza');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::where('id', '=', $id)->first();

        return view('admin/deletepizza', ['pizza' => $pizza]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::where('id', '=', $id)->first();

        return view('admin/editpizza', ['pizza' => $pizza]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        Alert::success('Edit Pizza', 'Success Edit Pizza');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::where('id', '=', $id)->delete();

        Alert::success('Delete Success', 'Item has been deleted.');

        return redirect('/');
    }
}
