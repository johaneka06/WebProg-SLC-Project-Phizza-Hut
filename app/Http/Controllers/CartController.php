<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function getCartItems()
    {
        $user = Auth::user();
        //Use query builder for easier join
        $items = DB::table('carts')
            ->join('pizzas', 'carts.pizzaId', '=', 'pizzas.id')
            ->where('userId', '=', $user->id)
            ->get();
        
        return view('transaction/cart', ['items' => $items]);
    }

    public function addToCart(Request $request, $id)
    {
        $request = $request->validate([
            'qty' => 'required|numeric|min:1'
        ], 
        [
            'qty.required' => 'Quantity is required',
            'qty.min' => 'Quantity must be at least 1'
        ]);

        $cart = new Cart();
        $cart->userId = Auth::user()->id;
        $cart->pizzaId = $id;
        $cart->qty = $request['qty'];

        $cart->save();
        
        Alert::success('Success', 'Success adding items to cart');
        return redirect('/');
    }
}
