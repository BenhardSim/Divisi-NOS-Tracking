<?php

namespace App\Http\Controllers;

use App\Models\imb_document;
use App\Http\Requests\Storeimb_documentRequest;
use App\Http\Requests\Updateimb_documentRequest;

class ImbDocumentController extends Controller
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
     * @param  \App\Http\Requests\Storeimb_documentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeimb_documentRequest $request)
    {
        //
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
     * @param  \App\Http\Requests\Updateimb_documentRequest  $request
     * @param  \App\Models\imb_document  $imb_document
     * @return \Illuminate\Http\Response
     */
    public function update(Updateimb_documentRequest $request, imb_document $imb_document)
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
}
