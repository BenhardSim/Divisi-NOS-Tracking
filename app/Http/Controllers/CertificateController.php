<?php

namespace App\Http\Controllers;

use App\Models\certificate_document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CertificateController extends Controller
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
            "no_ser" => "required",
            "file_ser" => "required",
            "SITEID" => "required",
        ]);

        $validatedData['id'] = certificate_document::max('id') + 1;
        $validatedData['SITEID'] = $request->SITEID;

        // configure file 
        $docs = $request->file('file_ser');

        // membersihkan nama data
        $uniqname = Str::of('id-certificate-'.$validatedData['no_ser'].'-'.$docs->getClientOriginalName())->slug('-');
        str_replace('/', '-', $uniqname);

        // menyimpan data

        $docs->storeAs('public/file-certificate',$uniqname);
        $validatedData['file_ser'] = $uniqname;
        certificate_document::create($validatedData);
        return back()->with('success', 'Document certificate berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\certificate_document  $certificate_document
     * @return \Illuminate\Http\Response
     */
    public function show(certificate_document $certificate_document)
    { 
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\certificate_document  $certificate_document
     * @return \Illuminate\Http\Response
     */
    public function edit(certificate_document $certificate_document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\certificate_document  $certificate_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, certificate_document $certificate_document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\certificate_document  $certificate_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate_document $certificate_document)
    {
        //
    }

    public function getDocs(certificate_document $id_ser){
        $name = $id_ser->file_ser;
        return response()->file(storage_path('app\public\file-certificate\\'.$name));
    }
}
