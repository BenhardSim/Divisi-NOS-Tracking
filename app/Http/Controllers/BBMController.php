<?php

namespace App\Http\Controllers;

use App\Models\BBM;
use App\Http\Requests\StoreBBMRequest;
use App\Http\Requests\UpdateBBMRequest;

class BBMController extends Controller
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
     * @param  \App\Http\Requests\StoreBBMRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBBMRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function show(BBM $bBM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function edit(BBM $bBM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBBMRequest  $request
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBBMRequest $request, BBM $bBM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BBM  $bBM
     * @return \Illuminate\Http\Response
     */
    public function destroy(BBM $bBM)
    {
        //
    }
}
