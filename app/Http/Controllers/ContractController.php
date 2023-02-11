<?php

namespace App\Http\Controllers;

use App\Models\kontrak_site_history;
use App\Models\siteprofile;
use Illuminate\Http\Request;

class ContractController extends Controller
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
        $validatedData = $request->validate([
            "SITEID" => "required",
            "no_pks" => "required",
            "awal_sewa" => "required",
            "akhir_sewa" => "required",
            "harga_sewa" => "required",
            "remark" => "required",
            "file_pks" => "required",
        ]);
        $validatedData['STATUSKONTRAK'] = '1';
        $validatedData['SITEID'] = $request->SITEID;
        $validatedData['id'] = kontrak_site_history::max('id') + 1;
        $validatedData['id_kontrak'] = kontrak_site_history::max('id_kontrak') + 1;
        
        $docs = $request->file('file_pks');
        $uniqname = 'id-kontrak-'.$validatedData['id'].'-'.$docs->getClientOriginalName();
        $docs->storeAs('public/file-kontrak',$uniqname);
        $validatedData['file_pks'] = $uniqname;
        kontrak_site_history::create($validatedData);
        return back()->with('toast_success', 'Data kontrak site berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kontrak_site_history  $kontrak_site_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kontrak_site_history $kontrak_site_history)
    {
        $validatedData = $request->validate([
            "SITEID" => "required",
            "no_pks" => "required",
            "awal_sewa" => "required",
            "akhir_sewa" => "required",
            "harga_sewa" => "required",
            "remark" => "required",
            // "file_pks" => "required",
        ]);

        kontrak_site_history::where('id',$kontrak_site_history->id)->update($validatedData);
        return back()->with('toast_success', 'Kontrak Site berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\kontrak_site_history  $kontrak_site_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(kontrak_site_history $kontrak_site_history)
    {
        kontrak_site_history::where('id',$kontrak_site_history->id)->delete();
        return back()->with('toast_success', 'Data kontrak site berhasil dihapus');
    }

    public function getDocs(kontrak_site_history $kontrakId){
        $name = $kontrakId->file_pks;
        return response()->file(storage_path('app\public\file-kontrak\\'.$name));
    }
}
