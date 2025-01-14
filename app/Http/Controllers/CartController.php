<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Detail_Transaction;
use App\Header_Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //Use query builder for easier join
        $items = DB::table('carts')
            ->join('pizzas', 'carts.pizzaId', '=', 'pizzas.id')
            ->where('userId', '=', $user->id)
            ->select('carts.*', 'pizzas.name', 'pizzas.price', 'pizzas.img_loc')
            ->get();

        return view('transaction/cart', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request = $request->validate(
            [
                'qty' => 'required|numeric|min:1'
            ],
            [
                'qty.required' => 'Quantity is required',
                'qty.min' => 'Quantity must be at least 1'
            ]
        );

        $userId = Auth::user()->id;
        $item = Cart::where('userId', '=', $userId)->where('pizzaId', '=', $id)->first();

        if ($item == null) {
            $cart = new Cart();
            $cart->userId = $userId;
            $cart->pizzaId = $id;
            $cart->qty = $request['qty'];

            $cart->save();
        } else {
            //If there's a same item in the cart, then it will add the qty of that item.
            $item->qty = $item->qty + $request['qty'];
            $item->save();
        }

        Alert::success('Success', 'Success adding items to cart');
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Cart::where('id', '=', $id)->first();
        
        $item->qty = $request->qty;
        $item->updated_at = now();
        $item->save();

        Alert::success('Update', 'Success update selected item');

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cart::where('id', '=', $id)->delete();

        Alert::success('Delete success', 'Item has been deleted.');

        return redirect('/cart');
    }

    /**
     * Checkout all items and remove the specified resource from db.
     * 
     * @param int $userId
     * 
     */

    public function checkout($userId)
    {
        $items = Cart::where('userId', '=', $userId)->get();

        $header = new Header_Transaction();
        $header->userId = $userId;
        $header->save();
        $header->refresh();

        foreach ($items as $item) {
            $detail = new Detail_Transaction();
            $detail->transactionId = $header->id;
            $detail->pizzaId = $item->pizzaId;
            $detail->qty = $item->qty;
            $detail->save();
            Cart::where('userId', '=', $userId)->where('pizzaId', '=', $item->pizzaId)->delete();
        }

        Alert::success('Success', 'Success for checkout');
        return redirect('/');
    }
}
