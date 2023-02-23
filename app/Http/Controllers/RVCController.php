<?php

namespace App\Http\Controllers;

use App\Models\RVC;
use App\Http\Requests\StoreRVCRequest;
use App\Http\Requests\UpdateRVCRequest;

class RVCController extends Controller
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
     * @param  \App\Http\Requests\StoreRVCRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRVCRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RVC  $rVC
     * @return \Illuminate\Http\Response
     */
    public function show(RVC $rVC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RVC  $rVC
     * @return \Illuminate\Http\Response
     */
    public function edit(RVC $rVC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRVCRequest  $request
     * @param  \App\Models\RVC  $rVC
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRVCRequest $request, RVC $rVC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RVC  $rVC
     * @return \Illuminate\Http\Response
     */
    public function destroy(RVC $rVC)
    {
        //
    }
}
