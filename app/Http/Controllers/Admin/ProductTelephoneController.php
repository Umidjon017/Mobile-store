<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryTelephone;
use App\Models\ProductTelephone;
use Illuminate\Http\Request;

class ProductTelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $telephone_categories = CategoryTelephone::all();

        return view('admin.products.telephones.index', compact('telephone_categories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTelephone $productTelephone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTelephone $productTelephone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTelephone $productTelephone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTelephone $productTelephone)
    {
        //
    }
}
