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
        $telephone_categories = CategoryTelephone::all();
        $colors = Color::all();
        $memories = TelephoneMemory::all();

        return view('admin.products.telephones.index', compact('telephone_categories', 'colors', 'memories'));
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
        $pPhone = new ProductTelephone;
        $tFrontDesc = new TelephoneFrontDesc;
        $tSpecific = new TelephoneSpecification;

        $pPhone->telephone_category_id = $request->telephone_category_id;
        $pPhone->model = $request->model;
        $pPhone->slug = Str::slug($request->model);
        $pPhone->color_id = $request->color_id;
        $pPhone->memory_id = $request->memory_id;
        $pPhone->price = $request->price;
        $pPhone->badge_new = $request->badge_new;
        $tFrontDesc->telephone_id = $request->telephone_id;
        $tFrontDesc->image_url = $request->image_url;
        $tFrontDesc->description = $request->description;
        $tSpecific->telephone_id = $request->telephone_id;
        $tSpecific->width = $request->width;
        $tSpecific->height = $request->height;
        $tSpecific->thickness = $request->thickness;
        $tSpecific->weight = $request->weight;
        $tSpecific->material_corps = $request->material_corps;
        $tSpecific->screen_dioganal = $request->screen_dioganal;
        $tSpecific->pixel_density = $request->pixel_density;
        $tSpecific->display_resolution = $request->display_resolution;
        $tSpecific->screen_matrix = $request->screen_matrix;
        $tSpecific->battery_type = $request->battery_type;
        $tSpecific->battery_capacity = $request->battery_capacity;
        $tSpecific->fast_charging = $request->fast_charging;
        $tSpecific->wireless_charger = $request->wireless_charger;
        $tSpecific->connector = $request->connector;
        $tSpecific->peculliarities = $request->peculliarities;
        $tSpecific->number_processor_cores = $request->number_processor_cores;
        $tSpecific->video_processor = $request->video_processor;
        $tSpecific->gpu_frequency = $request->gpu_frequency;
        $tSpecific->cpu = $request->cpu;
        $tSpecific->frequency = $request->frequency;
        $tSpecific->communication_standarts = $request->communication_standarts;
        $tSpecific->nfc = $request->nfc;
        $tSpecific->blutooth = $request->blutooth;
        $tSpecific->wifi = $request->wifi;
        $tSpecific->number_sim_slots = $request->number_sim_slots;
        $tSpecific->satellite_navigation = $request->satellite_navigation;
        $tSpecific->main_camera = $request->main_camera;
        $tSpecific->front_camera = $request->front_camera;
        $tSpecific->fetures_main_camera = $request->fetures_main_camera;
        $tSpecific->video_recording = $request->video_recording;
        $tFrontDesc->save();
        $tSpecific->save();
        $pPhone->save();

        return redirect()->route('admin.product-telephones.index')
            ->withSuccess(__($pPhone->model . " - telefon modeli qo'shildi!"));;
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
