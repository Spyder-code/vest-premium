<?php

namespace App\Http\Controllers;

use App\Models\NetflixAccount;
use Illuminate\Http\Request;

class NetflixAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $netflix_accounts = NetflixAccount::all();
        return view('admin.netflix_account.index', compact('netflix_accounts'));
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
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'pin' => 'required',
        ]);

        $netflix_account = NetflixAccount::create($request->all());
        return redirect()->route('netflix-account.index')->with('success','Netflix Account created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NetflixAccount  $netflixAccount
     * @return \Illuminate\Http\Response
     */
    public function show(NetflixAccount $netflixAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NetflixAccount  $netflixAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(NetflixAccount $netflix_account)
    {
        return view('admin.netflix_account.edit', compact('netflix_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NetflixAccount  $netflixAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NetflixAccount $netflix_account)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'pin' => 'required',
        ]);

        $netflix_account->update($request->all());
        return back()->with('success','Netflix Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NetflixAccount  $netflixAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetflixAccount $netflix_account)
    {
        $netflix_account->delete();
        return redirect()->route('netflix-account.index')->with('success','Netflix Account deleted successfully');
    }
}
