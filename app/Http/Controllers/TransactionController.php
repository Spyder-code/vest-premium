<?php

namespace App\Http\Controllers;

use App\Models\NetflixAccount;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all()->where('role', 'customer');
        $products = Product::all();
        $netflix_accounts = NetflixAccount::all();
        return view('admin.transaction.index', compact('transactions', 'users', 'products', 'netflix_accounts'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_status' => 'required',
            'netflix_account_id' => 'required',
        ]);

        $no = Transaction::max('id') + 1;
        $product = Product::find($request->product_id);
        Transaction::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'netflix_account_id' => $request->netflix_account_id,
            'invoice' => 'INV-' . sprintf('%02d', $request->user_id) . '-' .sprintf('%03d', $no),
            'qty' => 1,
            'total' => $product->price,
            'date_start' => $request->start_date,
            'date_end' => $request->end_date,
            'payment_status' => $request->payment_status,
            'status' => 1,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        $users = User::all()->where('role', 'customer');
        $netflix_accounts = NetflixAccount::all();
        return view('admin.transaction.edit', compact('transaction', 'products', 'users', 'netflix_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'payment_status' => 'required',
            'netflix_account_id' => 'required',
        ]);

        $product = Product::find($request->product_id);
        $transaction->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'netflix_account_id' => $request->netflix_account_id,
            'invoice' => 'INV-' . sprintf('%02d', $request->user_id) . '-' .sprintf('%03d', $transaction->id),
            'qty' => 1,
            'total' => $product->price,
            'date_start' => $request->start_date,
            'date_end' => $request->end_date,
            'payment_status' => $request->payment_status,
            'status' => 1,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully');
    }
}
