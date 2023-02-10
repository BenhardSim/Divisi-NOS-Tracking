<?php

namespace App\Http\Controllers;

use App\Models\KPI_utama;
use App\Http\Requests\StoreKPI_utamaRequest;
use App\Http\Requests\UpdateKPI_utamaRequest;

class KPIUtamaController extends Controller
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
     * @param  \App\Http\Requests\StoreKPI_utamaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKPI_utamaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KPI_utama  $kPI_utama
     * @return \Illuminate\Http\Response
     */
    public function show(KPI_utama $kPI_utama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPI_utama  $kPI_utama
     * @return \Illuminate\Http\Response
     */
    public function edit(KPI_utama $kPI_utama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKPI_utamaRequest  $request
     * @param  \App\Models\KPI_utama  $kPI_utama
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKPI_utamaRequest $request, KPI_utama $kPI_utama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPI_utama  $kPI_utama
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPI_utama $kPI_utama)
    {
        //
    }
}
