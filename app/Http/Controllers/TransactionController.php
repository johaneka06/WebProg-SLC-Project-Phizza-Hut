<?php

namespace App\Http\Controllers;

use App\Header_Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function getAllTransaction()
    {
        $transactions = DB::table('header_transactions')
            ->join('users', 'users.id', '=', 'header_transactions.userId')
            ->select('header_transactions.*', 'users.username')
            ->get();
            
        return view('transaction/transaction', ['transactions' => $transactions]);
    }

    public function userTransaction()
    {
        $userId = Auth::user()->id;
        $transactions = Header_Transaction::where('userId', '=', $userId)->get();
        return view('transaction/transaction', ['transactions' => $transactions]);
    }
}
