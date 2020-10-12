<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Detail_Transaction;
use App\Header_Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartsController extends Controller
{
    public function getCartItems()
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
        return redirect('/cart');
    }

    public function deleteCartItem($id) {
        $item = Cart::where('id', '=', $id)->delete();

        Alert::success('Delete success', 'Item has been deleted.');

        return redirect('/cart');
    }

    public function updateCartItem(Request $request, $id) {
        $item = Cart::where('id', '=', $id)->first();
        
        $item->qty = $request->qty;
        $item->updated_at = now();
        $item->save();

        Alert::success('Update', 'Success update selected item');

        return redirect('/cart');
    }

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
