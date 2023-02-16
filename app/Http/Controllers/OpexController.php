<?php

namespace App\Http\Controllers;

use App\Models\opex;
use App\Http\Requests\StoreopexRequest;
use App\Http\Requests\UpdateopexRequest;

class OpexController extends Controller
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
     * @param  \App\Http\Requests\StoreopexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreopexRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\opex  $opex
     * @return \Illuminate\Http\Response
     */
    public function show(opex $opex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\opex  $opex
     * @return \Illuminate\Http\Response
     */
    public function edit(opex $opex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateopexRequest  $request
     * @param  \App\Models\opex  $opex
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateopexRequest $request, opex $opex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\opex  $opex
     * @return \Illuminate\Http\Response
     */
    public function destroy(opex $opex)
    {
        //
    }
}
