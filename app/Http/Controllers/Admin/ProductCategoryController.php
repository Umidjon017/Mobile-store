<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryRequest;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_categories = ProductCategory::all();
        $pc_archived = ProductCategory::onlyTrashed()->get();

        return view('admin.product_categories.index', compact('product_categories', 'pc_archived'));
    }

    public function archived()
    {
        $product_categories = ProductCategory::all();
        $pc_trashed = ProductCategory::latest()->onlyTrashed()->get();

        return view('admin.product_categories.archived', compact('product_categories', 'pc_trashed'));
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
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        $model = ProductCategory::create($data);

        return redirect()->route('admin.product-categories.table.index')
            ->withSuccess(__("$model->name - mahsulot kategoriyasi qo'shildi!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = ProductCategory::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $model->update($data);

        return redirect()->route('admin.product-categories.table.index')
            ->withSuccess(__("$model->name - mahsulot kategoriyasi tahrirlandi!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ProductCategory::findOrFail($id);
        $model->delete();

        return redirect()->route('admin.product-categories.table.index')
            ->withSuccess(__("$model->name - mahsulot kategoriyasi arxivlandi!"));
    }

    public function forceDelete($id)
    {
        $model = ProductCategory::findOrFail($id);
        $model->forceDelete();

        return redirect()->route('admin.product-categories.table.index')
            ->withSuccess(__("$model->name - mahsulot kategoriyasi o'chirildi!"));
    }

    public function restore($id)
    {
        $model = ProductCategory::withTrashed()->find($id)->restore();

        return back()->withSuccess(__("Mahsulot kategoriyasi arxivdan chiqarildi!"));
    }

    public function restoreAll()
    {
        $mode = ProductCategory::onlyTrashed()->restore();
  
        return back()->withSuccess(__("Barcha mahsulot kategoriyalari arxivdan chiqarildi!"));
    }
}
