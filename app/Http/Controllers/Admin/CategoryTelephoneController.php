<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\CategoryTelephone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryTelephoneRequest;

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
        $tc_archived = CategoryTelephone::onlyTrashed()->get();

        return view('admin.category_telephones.index', compact('product_categories', 'telephone_categories', 'tc_archived'));
    }

    public function archived()
    {
        $product_categories = ProductCategory::all();
        $telephone_categories = CategoryTelephone::all();
        $tc_trashed = CategoryTelephone::latest()->onlyTrashed()->get();

        return view('admin.category_telephones.archived', compact('product_categories', 'telephone_categories', 'tc_trashed'));
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
        
        $model = CategoryTelephone::create($data);

        return redirect()->route('admin.product-categories.telephones.index')
            ->withSuccess(__("$model->name - telefon kategoriyasi qo'shildi!"));
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
        $model = CategoryTelephone::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $model->update($data);

        return redirect()->route('admin.product-categories.telephones.index')
            ->withSuccess(__("$model->name - telefon kategoriyasi tahrirlandi!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTelephone  $categoryTelephone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CategoryTelephone::findOrFail($id);
        $model->delete();

        return redirect()->route('admin.product-categories.telephones.index')
            ->withSuccess(__("$model->name - telefon kategoriyasi arxivlandi!"));
    }

    public function forceDelete($id)
    {
        $model = CategoryTelephone::findOrFail($id);
        $model->forceDelete();

        return redirect()->route('admin.product-categories.telephones.index')
            ->withSuccess(__("$model->name - telefon kategoriyasi o'chirildi!"));
    }

    public function restore($id)
    {
        $model = CategoryTelephone::withTrashed()->find($id)->restore();

        return back()->withSuccess(__("Telefon kategoriyasi arxivdan chiqarildi!"));
    }

    public function restoreAll()
    {
        $mode = CategoryTelephone::onlyTrashed()->restore();
  
        return back()->withSuccess(__("Barcha telefon kategoriyalari arxivdan chiqarildi!"));
    }
}
