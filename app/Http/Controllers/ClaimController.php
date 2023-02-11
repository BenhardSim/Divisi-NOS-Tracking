<?php

namespace App\Http\Controllers;

use App\Models\claim_asset;
use Illuminate\Http\Request;

class ClaimController extends Controller
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
            "SiteIDClaim" => "required",
            "SiteNameClaim" => "required",
            "Reportdate" => "required",
            "Regional" => "required",
            "ClaimNumber" => "required",
            "LostStatus" => "required",
            "DamageCause" => "required",
            "Earlyreport" => "required",
            "AssetCatagory" => "required",
            "Quantity" => "required",
            "rtpo" => "required",
            "ItemType" => "required",
            "ItemMerk" => "required",
            "ItemUnit" => "required",
        ]);
        $validatedData['idclaim'] = claim_asset::max('idclaim') + 1;
        //return redirect('/dashboard')->with('success', 'Data berhasil dimasukkan');
        // return view('portal.test', dd($request));
        
        claim_asset::create($validatedData);
        return back()->with('toast_success', 'Data claim asset berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\claim_asset  $claim_asset
     * @return \Illuminate\Http\Response
     */
    public function show(claim_asset $claim_asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\claim_asset  $claim_asset
     * @return \Illuminate\Http\Response
     */
    public function edit(claim_asset $claim_asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\claim_asset  $claim_asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, claim_asset $claim_asset)
    {
        //
        $rules = [
            "SiteIDClaim" => "required",
            "SiteNameClaim" => "required",
            "Reportdate" => "required",
            "Regional" => "required",
            "ClaimNumber" => "required",
            "LostStatus" => "required",
            "DamageCause" => "required",
            "Earlyreport" => "required",
            "AssetCatagory" => "required",
            "Quantity" => "required",
            "rtpo" => "required",
            "ItemType" => "required",
            "ItemMerk" => "required",
            "ItemUnit" => "required",
        ];

        $validatedData =  $request->validate($rules);

        claim_asset::where('idclaim', $claim_asset->idclaim)->update($validatedData);

        return back()->with('toast_success', 'Claim asset berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\claim_asset  $claim_asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(claim_asset $claim_asset)
    {
        //
        claim_asset::where('idclaim', $claim_asset->idclaim)->delete();
        //$claim_asset->delete();
        return back()->with('toast_success', 'Data claim asset berhasil dihapus');
    }
}
