<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TelephoneMemory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TelephoneMemoryRequest;

class TelephoneMemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memories = TelephoneMemory::all();

        return view('admin.products.telephones.memories.index', compact('memories'));
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
    public function store(TelephoneMemoryRequest $request)
    {
        $data = $request->all();
        $model = TelephoneMemory::create($data);

        return redirect()->route('admin.telephone-memories.index')
            ->withSuccess(__("$model->memory_main/$model->memory_ram - telefon xotirasi qo'shildi!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TelephoneMemory  $telephoneMemory
     * @return \Illuminate\Http\Response
     */
    public function show(TelephoneMemory $telephoneMemory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TelephoneMemory  $telephoneMemory
     * @return \Illuminate\Http\Response
     */
    public function edit(TelephoneMemory $telephoneMemory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelephoneMemory  $telephoneMemory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = TelephoneMemory::findOrFail($id);
        $data = $request->all();
        $model->update($data);

        return redirect()->route('admin.telephone-memories.index')
            ->withSuccess(__("$model->memory_main/$model->memory_ram - telefon xotirasi tahrirlandi!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TelephoneMemory  $telephoneMemory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = TelephoneMemory::findOrFail($id);
        $model->delete();

        return redirect()->route('admin.telephone-memories.index')
            ->withSuccess(__("$model->memory_main/$model->memory_ram - telefon xotirasi o'chirildi!"));
    }
}
