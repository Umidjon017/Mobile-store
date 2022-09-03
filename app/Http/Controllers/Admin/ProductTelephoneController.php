<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TelephoneMemory;
use App\Models\ProductTelephone;
use App\Models\CategoryTelephone;
use App\Http\Controllers\Controller;

class ProductTelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_telephones = ProductTelephone::all();
        $pt_trashed = ProductTelephone::onlyTrashed()->get();

        return view('admin.products.telephones.index', compact('product_telephones', 'pt_trashed'));
    }
    
    public function archived()
    {
        $product_telephones = ProductTelephone::all();
        $pt_trashed = ProductTelephone::latest()->onlyTrashed()->get();

        return view('admin.products.telephones.archived', compact('product_telephones', 'pt_trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $telephone_categories = CategoryTelephone::all();
        $colors = Color::all();
        $memories = TelephoneMemory::all();

        return view('admin.products.telephones.create', compact('telephone_categories', 'colors', 'memories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->model);
        $pPhone = ProductTelephone::create($data);

        $data['telephone_id'] = $pPhone->id;

        $memories = $request->memory_id;
        if ($memories != '') {
            foreach ($memories as $memory) {
                $pPhone->memories()->attach($memory);
            }
        }
        
        $colors = $request->color_id;
        if ($colors != '') {
            foreach ($colors as $color) {
                $pPhone->colors()->attach($color);
            }
        }

        function getLastId()
        {
            $lastId = ProductTelephone::latest()->first()->id ?: 1;
            return $lastId;
        }

        if($request->hasFile('image_url'))
        {
            $files = $request->file('image_url');
            
            $destination = public_path('admin/images/product-telephones/');
        
            foreach ($files as $file) {
                $name = getLastId().'_'.'front-'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $url = "http://localhost/admin/product-telephones/".$name;
                $pPhone->telephoneFrontDescs()->create(array(
                    'image_url' => $url,
                ));
            }
            $pPhone->telephoneFrontDescs()->create(array(
                'description' => $request->description,
            ));
        }
        
        if($request->hasFile('full_image_url'))
        {
            $files = $request->file('full_image_url');
            
            $destination = public_path('admin/images/product-telephones/');
        
            foreach ($files as $file) {
                $name = getLastId().'_'.'full-'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $url = "http://localhost/admin/product-telephones/".$name;
                $pPhone->telephoneFullDescs()->create(array(
                    'full_title' => $request->full_title,
                    'full_image_url' => $url,
                    'full_description' => $request->full_description,
                ));
            }
        }
        $pPhone->telephoneSpecifications()->create($data);

        return redirect()->route('admin.product-telephones.index')
            ->withSuccess(__($pPhone->CategoryTelephones->name.' '.$pPhone->model." - telefon modeli qo'shildi!"));
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
    public function edit($id)
    {
        $pPhones = ProductTelephone::whereId($id)->first();
        $tCategories = CategoryTelephone::all();
        $colors = $pPhones->colors()->get();
        $memories = $pPhones->memories()->get();
        $front_descriptions = $pPhones->telephoneFrontDescs()->get();
        $full_descriptions = $pPhones->telephoneFullDescs()->get();
        $specifications = $pPhones->telephoneSpecifications()->get();

        return view('admin.products.telephones.edit', compact(
            'pPhones', 'tCategories', 'colors', 'memories',
            'front_descriptions', 'full_descriptions', 'specifications'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pPhone = ProductTelephone::whereId($id)->get();
        $data = $request->all();
        $data['slug'] = Str::slug($request->model);
        $pPhone->update($data);

        $data['telephone_id'] = $pPhone->id;

        $memories = $request->memory_id;
        if ($memories != '') {
            foreach ($memories as $memory) {
                $pPhone->memories()->attach($memory);
            }
        }
        
        $colors = $request->color_id;
        if ($colors != '') {
            foreach ($colors as $color) {
                $pPhone->colors()->attach($color);
            }
        }

        if($request->hasFile('image_url'))
        {
            $files = $request->file('image_url');
            
            $destination = public_path('admin/images/product-telephones/');
        
            foreach ($files as $file) {
                $name = $pPhone.'_'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $url = "http://localhost/admin/product-telephones/".$name;
                $pPhone->telephoneFrontDescs()->update(array(
                    'image_url' => $url,
                ));
            }
            $pPhone->telephoneFrontDescs()->update(array(
                'description' => $request->description,
            ));
        }
        $pPhone->telephoneSpecifications()->update($data);

        return redirect()->route('admin.product-telephones.index')
            ->withSuccess(__($pPhone->CategoryTelephones->name.' '.$pPhone->model." - telefon modeli tahrirlandi!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTelephone  $productTelephone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ProductTelephone::findOrFail($id);
        $model->delete();

        return back()->withSuccess(__($model->CategoryTelephones->name.' '.$model->model." - telefon modeli arxivlandi!"));
    }

    public function forceDelete($id)
    {
        $model = ProductTelephone::findOrFail($id);
        $model->forceDelete();

        return back()->withSuccess(__($model->CategoryTelephones->name.' '.$model->name." - telefon modeli o'chirildi!"));
    }

    public function restore($id)
    {
        $model = ProductTelephone::withTrashed()->find($id)->restore();

        return back()->withSuccess(__("Telefon modeli arxivdan chiqarildi!"));
    }

    public function restoreAll()
    {
        $mode = ProductTelephone::onlyTrashed()->restore();
  
        return back()->withSuccess(__("Barcha telefon modellari arxivdan chiqarildi!"));
    }
}
