<?php

namespace App\Http\Controllers;

use App\Models\DocumentHistory;
use App\Models\tracked_document;
use App\Models\User;
use Carbon\Carbon;
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
        if (Gate::allows('staff')) {
            $validatedData = $request->validate([
                "id_level_dua" => "required",
                "id_level_tiga" => "required",
                "id_level_empat" => "required",
                "deskripsi" => "required",
                "file" => "required",
             ]);
        }
        if (Gate::allows('supervisor')) {
            $validatedData = $request->validate([
                "id_level_tiga" => "required",
                "id_level_empat" => "required",
                "deskripsi" => "required",
                "file" => "required",
             ]);
        }
        if (Gate::allows('manager')) {
            $validatedData = $request->validate([
                "id_level_empat" => "required",
                "deskripsi" => "required",
                "file" => "required",
             ]);
        }
        if (Gate::allows('gm')) {
            $validatedData = $request->validate([
                "deskripsi" => "required",
                "file" => "required",
             ]);
        }
        //$validatedData['idimbas'] = tracked_document::max('idimbas') + 1;
        //return redirect('/dashboard')->with('success', 'Data berhasil dimasukkan');
         // return view('portal.test', dd($request));

        $max = tracked_document::max('id') + 1;

        $docs = $request->file('file');
        $uniqname = 'id-tracked-'.$max.'-'.$docs->getClientOriginalName();
        $docs->storeAs('public/file-tracked',$uniqname);
        $validatedData['file'] = $uniqname;
        $validatedData['id_pengirim'] = auth()->user()->id;
        $validatedData['nama_pengirim'] = auth()->user()->name;
        $validatedData['level_approval'] = auth()->user()->level_akun;
        $validatedData['level_pengirim'] = auth()->user()->level_akun;
        $validatedData['tanggal'] = Carbon::now('Asia/Jakarta');
        if (Gate::allows('supervisor')) {
            $validatedData['id_level_dua'] = auth()->user()->id;
        }
        if (Gate::allows('manager')) {
            $validatedData['id_level_tiga'] = auth()->user()->id;
        }
        $validatedHistory = [
            "user_id" => auth()->user()->id,
            "document_name" => $validatedData['file'],
            "action" => "Created",
            "waktu" => Carbon::now(),

        ];
        if (Gate::allows('gm')) {
            $validatedData['id_level_empat'] = auth()->user()->id;
            $validatedData['status'] = "Approved";
            $validatedHistory['action'] = "Created and Approved";
        }
        
         
         tracked_document::create($validatedData);
         DocumentHistory::create($validatedHistory);
         return back()->with('success', 'Data tracked document berhasil ditambahkan');
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
            "title" => "Detail Tracked Document",
            "kedua" => User::where("id", $tracked_document->id_level_dua)->first(),
            "ketiga" => User::where("id", $tracked_document->id_level_tiga)->first(),
            "keempat" => User::where("id", $tracked_document->id_level_empat)->first(),
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
            $request->validate([
                "keterangan" => 'required'
            ]);
            $validatedData = [
                "level_approval" => $tracked_document->level_pengirim - 1,
                "status" => "Rejected",
                "keterangan" => $request['keterangan'],
            ];

            $validatedHistory = [
                "user_id" => auth()->user()->id,
                "document_name" => $tracked_document->file,
                "action" => "Rejected",
                "waktu" => Carbon::now(),
    
            ];
            DocumentHistory::create($validatedHistory);
            tracked_document::where('id',$tracked_document->id)->update($validatedData);
            return back()->with('success', 'Dokumen berhasil ditolak');
        }

        // approval
        if (Gate::allows('gm')) {
            $validatedData = [
                "status" => "Approved",
            ];
        }
        else{
            $validatedData = [
                "level_approval" => $tracked_document->level_approval + 1,
            ];
        }
        $validatedHistory = [
            "user_id" => auth()->user()->id,
            "document_name" => $tracked_document->file,
            "action" => "Approved",
            "waktu" => Carbon::now(),

        ];
        
        tracked_document::where('id',$tracked_document->id)->update($validatedData);
        DocumentHistory::create($validatedHistory);
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

    public function getDocs(tracked_document $id_trc){
        $name = $id_trc->file;
        return response()->file(storage_path('app\public\file-tracked\\'.$name));
    }
}
