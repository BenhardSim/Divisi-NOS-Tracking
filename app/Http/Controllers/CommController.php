<?php

namespace App\Http\Controllers;

use App\Models\commissue;
use App\Models\siteprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommController extends Controller
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
        $validatedData = $request->all();

        $validator = Validator::make($request->all(), [
            "SITEID" => "required",
            "SITENAME" => "required",
            "REVENUE" => "required",
            "DETAIL" => "required",
            "ACTION" => "required",
            "PIC" => "required",
            "STATSSITE" => "required",
            "REALISASI" => "required",
            "STATSCASE" => "required",
            "KOMPENSASI" => "required",
        ]);


        if($validator->fails()){
            return back()->with('toast_error', 'field comm issue tidak boleh kosong !');
        }

        $validatedData['idComm'] = commissue::max('idComm') + 1;
        commissue::create($validatedData);
        return back()->with('toast_success', 'Comm Issue berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\commissue  $commissue
     * @return \Illuminate\Http\Response
     */
    public function show(commissue $commissue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\commissue  $commissue
     * @return \Illuminate\Http\Response
     */
    public function edit(commissue $commissue)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\commissue  $commissue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commissue $commissue)
    {
        $validatedData = $request->validate([
            "SITEID" => "required",
            "SITENAME" => "required",
            "REVENUE" => "required",
            "DETAIL" => "required",
            "ACTION" => "required",
            "PIC" => "required",
            "STATSSITE" => "required",
            "REALISASI" => "required",
            "STATSCASE" => "required",
            "KOMPENSASI" => "required",
        ]);

        commissue::where('idComm',$commissue->idComm)->update($validatedData);
        return back()->with('toast_success', 'comm Issue berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\commissue  $commissue
     * @return \Illuminate\Http\Response
     */
    public function destroy(commissue $commissue)
    {
        commissue::where('idComm',$commissue->idComm)->delete();
        return back()->with('toast_success', 'Data Comm Issue berhasil dihapus');
    }
}
