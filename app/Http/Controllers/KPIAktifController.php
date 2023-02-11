<?php

namespace App\Http\Controllers;

use App\Models\KPI_aktif;
use App\Http\Requests\StoreKPI_aktifRequest;
use App\Http\Requests\UpdateKPI_aktifRequest;

class KPIAktifController extends Controller
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
     * @param  \App\Http\Requests\StoreKPI_aktifRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKPI_aktifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KPI_aktif  $kPI_aktif
     * @return \Illuminate\Http\Response
     */
    public function show(KPI_aktif $kPI_aktif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KPI_aktif  $kPI_aktif
     * @return \Illuminate\Http\Response
     */
    public function edit(KPI_aktif $kPI_aktif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKPI_aktifRequest  $request
     * @param  \App\Models\KPI_aktif  $kPI_aktif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKPI_aktifRequest $request, KPI_aktif $kPI_aktif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KPI_aktif  $kPI_aktif
     * @return \Illuminate\Http\Response
     */
    public function destroy(KPI_aktif $kPI_aktif)
    {
        //
    }
}
