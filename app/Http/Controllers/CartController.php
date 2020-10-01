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
        return redirect('/');
    }

    public function deleteCartItem($userId, $pizzaId) {
        $item = Cart::where('userId', '=', $userId)->where('pizzaId', '=', $pizzaId)->delete();

        Alert::success('Delete success', 'Item has been deleted.');

        return redirect('/cart');
    }

    public function updateCartItem(Request $request, $userId, $pizzaId) {
        $item = Cart::where('userId', '=', $userId)->where('pizzaId', '=', $pizzaId)->first();
        
        $item->qty = $request->qty;
        $item->updated_at = now();
        $item->save();

        Alert::success('Update', 'Success update selected item');

        return redirect('/cart');
    }
}
