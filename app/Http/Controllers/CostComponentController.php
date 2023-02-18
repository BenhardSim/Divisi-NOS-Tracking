<?php

namespace App\Http\Controllers;

use App\Models\CostComponent;
use App\Http\Requests\StoreCostComponentRequest;
use App\Http\Requests\UpdateCostComponentRequest;

class CostComponentController extends Controller
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
     * @param  \App\Http\Requests\StoreCostComponentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCostComponentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CostComponent  $costComponent
     * @return \Illuminate\Http\Response
     */
    public function show(CostComponent $costComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CostComponent  $costComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(CostComponent $costComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCostComponentRequest  $request
     * @param  \App\Models\CostComponent  $costComponent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCostComponentRequest $request, CostComponent $costComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CostComponent  $costComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostComponent $costComponent)
    {
        //
    }
}
