<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TelephoneMemory;
use App\Models\ProductTelephone;
use App\Models\CategoryTelephone;
use App\Http\Controllers\Controller;
use App\Models\TelephoneFrontDesc;
use App\Models\TelephoneSpecification;

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

        $destination = public_path('admin/images/product-telephones/');
        if($request->hasFile('image_url'))
        {
            $files = $request->file('image_url');
        
            foreach ($files as $file) {
                $name = $pPhone->id.'_'.time().'.'.$file->getClientOriginalExtension();
                $file->move($destination, $name);
                $url = "http://localhost/admin/product-telephones/".$name;
                
                $pPhone->telephoneFrontDescs()->create(array(
                    'image_url' => $url,
                    'description' => $request->description,
                ));
            }
        }
        $pPhone->telephoneFrontDescs()->create(array(
            'description' => $request->description,
        ));
        $pPhone->telephoneSpecifications()->create($data);

        // $pPhone = ProductTelephone::create(array(
        //     'telephone_category_id' => $request->telephone_category_id,
        //     'model' => $request->model,
        //     'slug' => Str::slug($request->model),
        //     'color_id' => $request->color_id,
        //     'memory_id' => $request->memory_id,
        //     'price' => $request->price,
        //     'badge_new' => $request->badge_new,
        // ));

        // $pPhone->telephoneFrontDescs()->create(array(
        //     'telephone_id' => $pPhone->id,
        //     'image_url' => $request->image_url,
        //     'description' => $request->description,
        // ));

        // $pPhone->telephoneSpecifications()->create(array(
        //     'telephone_id' => $pPhone->id,
        //     'width' =>  $request->width,
        //     'height'    =>  $request->height,
        //     'thickness' =>  $request->thickness,
        //     'weight'    =>  $request->weight,
        //     'material_corps'    =>  $request->material_corps,
        //     'screen_dioganal'   =>  $request->screen_dioganal,
        //     'pixel_density' =>  $request->pixel_density,
        //     'display_resolution'    =>  $request->display_resolution,
        //     'screen_matrix' =>  $request->screen_matrix,
        //     'battery_type'  =>  $request->battery_type,
        //     'battery_capacity'  =>  $request->battery_capacity,
        //     'fast_charging' =>  $request->fast_charging,
        //     'wireless_charger'  =>  $request->wireless_charger,
        //     'connector' =>  $request->connector,
        //     'peculliarities'    =>  $request->peculliarities,
        //     'number_processor_cores'    =>  $request->number_processor_cores,
        //     'video_processor'   =>  $request->video_processor,
        //     'gpu_frequency' =>  $request->gpu_frequency,
        //     'cpu'   =>  $request->cpu,
        //     'frequency' =>  $request->frequency,
        //     'communication_standarts'   =>  $request->communication_standarts,
        //     'nfc'   =>  $request->nfc,
        //     'blutooth'  =>  $request->blutooth,
        //     'wifi'  =>  $request->wifi,
        //     'number_sim_slots'  =>  $request->number_sim_slots,
        //     'satellite_navigation'  =>  $request->satellite_navigation,
        //     'main_camera'   =>  $request->main_camera,
        //     'front_camera'  =>  $request->front_camera,
        //     'fetures_main_camera'   =>  $request->fetures_main_camera,
        //     'video_recording'   =>  $request->video_recording,
        // ));

        return redirect()->route('admin.product-telephones.index')
            ->withSuccess(__($pPhone->model . " - telefon modeli qo'shildi!"));
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
