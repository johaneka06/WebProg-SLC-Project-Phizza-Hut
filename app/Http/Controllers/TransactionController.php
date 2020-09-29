<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $request = $request->validate([
            'qty' => 'required|numeric|min:1'
        ], 
        [
            'qty.required' => 'Quantity is required',
            'qty.min' => 'Quantity must be at least 1'
        ]);


        return redirect('/');

    }
}
