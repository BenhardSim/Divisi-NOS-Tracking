<?php

namespace App\Http\Controllers;

use App\Models\pln;
use App\Http\Requests\StoreplnRequest;
use App\Http\Requests\UpdateplnRequest;

class PlnController extends Controller
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
     * @param  \App\Http\Requests\StoreplnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreplnRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pln  $pln
     * @return \Illuminate\Http\Response
     */
    public function show(pln $pln)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pln  $pln
     * @return \Illuminate\Http\Response
     */
    public function edit(pln $pln)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateplnRequest  $request
     * @param  \App\Models\pln  $pln
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateplnRequest $request, pln $pln)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pln  $pln
     * @return \Illuminate\Http\Response
     */
    public function destroy(pln $pln)
    {
        //
    }
}
