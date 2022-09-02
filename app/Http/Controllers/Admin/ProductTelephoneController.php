<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TelephoneMemory;
use App\Models\ProductTelephone;
use App\Models\CategoryTelephone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

        return view('admin.products.telephones.index', compact('product_telephones'));
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

        if($request->hasFile('image_url'))
        {
            $files = $request->file('image_url');
            
            $destination = public_path('admin/images/product-telephones/');
            function getLastId()
            {
                $lastId = ProductTelephone::latest()->first()->id ?: 1;
                return $lastId;
            }
        
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
        $specifications = $pPhones->telephoneSpecifications()->get();

        return view('admin.products.telephones.edit', compact(
            'pPhones', 'tCategories', 'colors', 'memories', 'front_descriptions', 'specifications'
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
    public function destroy(ProductTelephone $productTelephone)
    {
        //
    }
}
