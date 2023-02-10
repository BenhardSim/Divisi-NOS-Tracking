<?php

namespace App\Http\Controllers;

use App\Models\tracked_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrackedDocumentController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tracked_document  $tracked_document
     * @return \Illuminate\Http\Response
     */
    public function show(tracked_document $tracked_document)
    {
        //
        return view('portal.detailtracked',[
            "document" => $tracked_document,
            "title" => "Detail Tracked Document" 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tracked_document  $tracked_document
     * @return \Illuminate\Http\Response
     */
    public function edit(tracked_document $tracked_document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tracked_document  $tracked_document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tracked_document $tracked_document)
    {
        // rejection
        if(isset($request['keterangan'])){
            $validatedData = [
                "level_approval" => $tracked_document->level_pengirim - 1,
                "status" => "Rejected",
                "keterangan" => $request['keterangan'],
            ];
            tracked_document::where('id',$tracked_document->id)->update($validatedData);
            return back()->with('success', 'Dokumen berhasil ditolak');
        }

        // approval
        if (Gate::allows('gm')) {
            $validatedData = [
                "status" => "Approved",
            ];
            tracked_document::where('id',$tracked_document->id)->update($validatedData);
            return back()->with('success', 'Dokumen berhasil disetujui');
        }
        $validatedData = [
            "level_approval" => $tracked_document->level_approval + 1,
        ];
        tracked_document::where('id',$tracked_document->id)->update($validatedData);
        return back()->with('success', 'Dokumen berhasil disetujui');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tracked_document  $tracked_document
     * @return \Illuminate\Http\Response
     */
    public function destroy(tracked_document $tracked_document)
    {
        //
    }
}
