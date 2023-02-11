<?php

namespace App\Http\Controllers;

use App\Models\pbb;
use Illuminate\Http\Request;

class PbbController extends Controller
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
            "SITEID" => "required",
            "SITENAME" => "required",
            "NOP" => "required",
            "NAMAWP" => "required",
            "NPWP" => "required",
            "KELURAHAN" => "required",
            "KECAMATAN" => "required",
            "KAB" => "required",
            "PROVINSI" => "required",
            "KPP" => "required",
        ]);
        $validatedData['idPBB'] = pbb::max('idPBB') + 1;
        //return redirect('/dashboard')->with('success', 'Data berhasil dimasukkan');
        // return view('portal.test', dd($request));
        
        pbb::create($validatedData);
        return back()->with('toast_success', 'Data PBB berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function show(pbb $pbb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function edit(pbb $pbb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pbb $pbb)
    {
        //
        $rules = [
            "SITEID" => "required",
            "SITENAME" => "required",
            "NOP" => "required",
            "NAMAWP" => "required",
            "NPWP" => "required",
            "KELURAHAN" => "required",
            "KECAMATAN" => "required",
            "KAB" => "required",
            "PROVINSI" => "required",
            "KPP" => "required",
        ];

        $validatedData =  $request->validate($rules);

        pbb::where('idPBB', $pbb->idPBB)->update($validatedData);

        return back()->with('toast_success', 'PBB berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pbb  $pbb
     * @return \Illuminate\Http\Response
     */
    public function destroy(pbb $pbb)
    {
        //
        pbb::where('idPBB', $pbb->idPBB)->delete();
        //$claim_asset->delete();
        return back()->with('toast_success', 'Data PBB berhasil dihapus');
    }
}
