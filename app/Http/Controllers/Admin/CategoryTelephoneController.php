<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryTelephone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryTelephoneRequest;
use App\Models\ProductCategory;

class CategoryTelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_categories = ProductCategory::all();
        $telephone_categories = CategoryTelephone::all();
        // foreach ($telephone_categories as $item) {
        //     dd($item->productCategories->name);
        // }

        return view('admin.category_telephones.index', compact('product_categories', 'telephone_categories'));
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
    public function store(CategoryTelephoneRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        $category_telephone = CategoryTelephone::create($data);

        return redirect()->route('admin.product-categories.telephones.index')->with('success', $category_telephone->name . " - telefon kategoriyasi qo'shildi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTelephone  $categoryTelephone
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTelephone $categoryTelephone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTelephone  $categoryTelephone
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTelephone $categoryTelephone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryTelephone  $categoryTelephone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $telephone_category = CategoryTelephone::find($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $telephone_category->update($data);

        return redirect()->route('admin.product-categories.telephones.index')->with('success', $telephone_category->name . ' - telefon kategoriyasi tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTelephone  $categoryTelephone
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTelephone $categoryTelephone)
    {
        //
    }
}
