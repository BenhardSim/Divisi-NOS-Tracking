<?php

namespace App\Http\Controllers;

use App\Models\certificate_document;
use App\Http\Requests\Storecertificate_documentRequest;
use App\Http\Requests\Updatecertificate_documentRequest;

class CertificateDocumentController extends Controller
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
     * @param  \App\Http\Requests\Storecertificate_documentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecertificate_documentRequest $request)
    {
        //
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
     * @param  \App\Http\Requests\Updatecertificate_documentRequest  $request
     * @param  \App\Models\certificate_document  $certificate_document
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecertificate_documentRequest $request, certificate_document $certificate_document)
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
}
