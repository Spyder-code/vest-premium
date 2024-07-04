<?php

namespace App\Http\Controllers;

use App\Models\ProductBehavior;
use Illuminate\Http\Request;

class ProductBehaviorController extends Controller
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
            'name' => 'required',
        ]);

        ProductBehavior::create($request->all());
        return back()->with('success', 'Product Behavior created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBehavior  $productBehavior
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBehavior $productBehavior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBehavior  $productBehavior
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBehavior $productBehavior)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBehavior  $productBehavior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBehavior $productBehavior)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBehavior  $productBehavior
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBehavior $productBehavior)
    {
        $productBehavior->delete();
        return back()->with('success', 'Product Behavior deleted successfully');
    }
}
