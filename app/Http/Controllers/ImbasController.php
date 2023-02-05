<?php

namespace App\Http\Controllers;

use App\Models\imbas_petir;
use App\Models\siteprofile;
use Illuminate\Http\Request;

class ImbasController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        //
        $validatedData = $request->validate([
           "Siteid" => "required",
           "SiteName" => "required",
           "ClaimID" => "required|unique:imbas_petirs",
           "claim" => "required",
           "VendorName" => "required",
           "DamageNotes" => "required",
           "PolisNumber" => "required",
           "EventDate" => "required",
           "ReportDate" => "required",
           "CostClaim" => "required",
           "EarlyStatus" => "required",
           "FinalStatus" => "required",
        ]);
        // mengisi data secara manual 
        $validatedData['RTPO'] = 0;
        $validatedData['Regional'] = "Jawa Tengah";
        $validatedData['idimbas'] = imbas_petir::max('idimbas') + 1;
        //return redirect('/dashboard')->with('success', 'Data berhasil dimasukkan');
        // return view('portal.test', dd($request));
        
        imbas_petir::create($validatedData);
        return back()->with('success', 'Data imbas petir berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imbas_petir  $imbas_petir
     * @return \Illuminate\Http\Response
     */
    public function show(imbas_petir $imbas_petir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imbas_petir  $imbas_petir
     * @return \Illuminate\Http\Response
     */
    public function edit(imbas_petir $imbas_petir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imbas_petir  $imbas_petir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imbas_petir $imbas_petir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imbas_petir  $imbas_petir
     * @return \Illuminate\Http\Response
     */
    public function destroy(imbas_petir $imbas_petir)
    {
        //
        imbas_petir::where('idImbas', $imbas_petir->idimbas)->delete();
        //$imbas_petir->delete();
        return back()->with('success', 'Data imbas petir berhasil dihapus');
    }
}
