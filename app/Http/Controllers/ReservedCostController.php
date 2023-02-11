<?php

namespace App\Http\Controllers;

use App\Models\ReservedCost;
use App\Http\Requests\StoreReservedCostRequest;
use App\Http\Requests\UpdateReservedCostRequest;

class ReservedCostController extends Controller
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
     * @param  \App\Http\Requests\StoreReservedCostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservedCostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservedCost  $reservedCost
     * @return \Illuminate\Http\Response
     */
    public function show(ReservedCost $reservedCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservedCost  $reservedCost
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservedCost $reservedCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservedCostRequest  $request
     * @param  \App\Models\ReservedCost  $reservedCost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservedCostRequest $request, ReservedCost $reservedCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservedCost  $reservedCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservedCost $reservedCost)
    {
        //
    }
}
