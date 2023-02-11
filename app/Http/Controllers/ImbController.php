<?php

namespace App\Http\Controllers;

use App\Models\imb_document;
use Illuminate\Http\Request;

class ImbController extends Controller
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
            "no_imb" => "required",
            "file_imb" => "required",
        ]);

        $validatedData['id'] = imb_document::max('id') + 1;
        $validatedData['SITEID'] = $request->SITEID;

        // configure file 
        $docs = $request->file('file_imb');
        $uniqname = 'id-certificate-'.$validatedData['no_imb'].'-'.$docs->getClientOriginalName();
        $docs->storeAs('public/file-imb',$uniqname);
        $validatedData['file_imb'] = $uniqname;
        imb_document::create($validatedData);
        return back()->with('toast_success', 'Document IMB berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imb_document  $imb_document
     * @return \Illuminate\Http\Response
     */
    public function show(imb_document $imb_document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imb_document  $imb_document
     * @return \Illuminate\Http\Response
     */
    public function edit(imb_document $imb_document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imb_document  $imb_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imb_document $imb_document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imb_document  $imb_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(imb_document $imb_document)
    {
        //
    }


    public function getDocs(imb_document $id_imb){
        $name = $id_imb->file_imb;
        return response()->file(storage_path('app\public\file-imb\\'.$name));
    }

}
