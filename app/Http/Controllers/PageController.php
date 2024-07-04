<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function transaction()
    {
        $transactions = Transaction::all()->where('user_id', Auth::id());
        return view('customer.transaction', compact('transactions'));
    }
}
