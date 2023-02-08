<?php

namespace App\Http\Controllers;

use App\Models\lain_document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class lainController extends Controller
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
            'SITEID' => 'required',
            'nama_file' => 'required',
            'file_lain' => 'required',
        ]);

        $validatedData['id'] = lain_document::max('id') + 1;
        $validatedData['SITEID'] = $request->SITEID;

        // configure file 
        $docs = $request->file('file_lain');

        // membersihkan nama data
        $uniqname = Str::of('id-lain-'.$validatedData['id'].'-'.$docs->getClientOriginalName())->slug('-');
        str_replace('/', '-', $uniqname);

        // menyimpan data
        $docs->storeAs('public/file-lain',$uniqname);
        $validatedData['file_lain'] = $uniqname;
        lain_document::create($validatedData);
        return back()->with('success', 'Document Lainnya berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lain_document  $lain_document
     * @return \Illuminate\Http\Response
     */
    public function show(lain_document $lain_document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lain_document  $lain_document
     * @return \Illuminate\Http\Response
     */
    public function edit(lain_document $lain_document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lain_document  $lain_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lain_document $lain_document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lain_document  $lain_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(lain_document $lain_document)
    {
        //
    }

    public function getDocs(lain_document $id_lain){
        $name = $id_lain->file_lain;
        return response()->file(storage_path('app\public\file-lain\\'.$name));
    }
}
