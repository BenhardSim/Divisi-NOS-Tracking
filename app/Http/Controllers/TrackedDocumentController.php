<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\DocumentHistory;
use App\Models\tracked_document;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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
                "tipe_file" => 'required',
                "nomor" => 'required',
                "body" =>"required"
             ]);
        }
        if (Gate::allows('supervisor')) {
            $validatedData = $request->validate([
                "id_level_tiga" => "required",
                "id_level_empat" => "required",
                "deskripsi" => "required",
                "file" => "required",
                "tipe_file" => 'required',
                "nomor" => 'required',
                "body" =>"required"
             ]);
        }
        if (Gate::allows('manager')) {
            $validatedData = $request->validate([
                "id_level_empat" => "required",
                "deskripsi" => "required",
                "file" => "required",
                "tipe_file" => 'required',
                "nomor" => 'required',
                "body" =>"required"
             ]);
        }
        if (Gate::allows('gm')) {
            $validatedData = $request->validate([
                "deskripsi" => "required",
                "file" => "required",
                "tipe_file" => 'required',
                "nomor" => 'required',
                "body" =>"required"
             ]);
        }
        //$validatedData['idimbas'] = tracked_document::max('idimbas') + 1;
        //return redirect('/dashboard')->with('success', 'Data berhasil dimasukkan');
         // return view('portal.test', dd($request));

        $max = tracked_document::max('id') + 1;

        // $docs = $request->file('file');
        // $uniqname = 'id-tracked-'.$max.'-'.$docs->getClientOriginalName();
        // $docs->storeAs('public/file-tracked',$uniqname);
        // $validatedData['file'] = $uniqname;
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
        if (Gate::allows('gm')) {
            $validatedData['id_level_empat'] = auth()->user()->id;
            $validatedData['status'] = "Approved";
            
        }
        $saved = tracked_document::create($validatedData);

        // creating history row
        $validatedHistory = [
            "user_id" => auth()->user()->id,
            "document_name" => $validatedData['file'],
            "document_id" => $saved->id,
            "action" => "Created",
            "waktu" => Carbon::now('Asia/Jakarta'),

        ];
        if (Gate::allows('gm')){
            $validatedHistory['action'] = "Created and Approved";
        }
        DocumentHistory::create($validatedHistory);
        if(Gate::allows('gm')){
            return back()->with('success', 'Data tracked document berhasil ditambahkan');
        }
        // mailing
        $data = [];
        
        if(Gate::allows('staff')){
            $sender = User::find($validatedData['id_pengirim']);
            $receiver = User::find($validatedData['id_level_dua']);
        }
        if(Gate::allows('supervisor')){
            $sender = User::find($validatedData['id_pengirim']);
            $receiver = User::find($validatedData['id_level_tiga']);
        }
        if(Gate::allows('manager')){
            $sender = User::find($validatedData['id_pengirim']);
            $receiver = User::find($validatedData['id_level_empat']);
        }
        
        
        $data["sender_name"] = $sender->name;
        $data["receiver_name"] = $receiver->name;
        $data["document_name"] = $validatedData['file'];

        $data["body"] = "There's a document named: ".$data["document_name"]." waiting for your approval. You can view the portal to find more details";


        // Send the mail...
        Mail::to($receiver->email)->send(new MailNotify($data));
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
            "users_lvl_1" => User::where('level_akun',1)->get(),
            "users_lvl_2" => User::where('level_akun',2)->get(),
            "users_lvl_3" => User::where('level_akun',3)->get(),
            "users_lvl_4" => User::where('level_akun',4)->get(),
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
        // change tujuan
        if(isset($request['id_level_empat'])){
            $validatedData = $request->validate([
                "id_level_dua" => "",
                "id_level_tiga" => "",
                "id_level_empat" => "",

            ]);
            tracked_document::where('id',$tracked_document->id)->update($validatedData);
            return back()->with('success', 'Tujuan berhasil diubah');
        }

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
            tracked_document::where('id',$tracked_document->id)->update($validatedData);

            // creating history row
            $validatedHistory = [
                "user_id" => auth()->user()->id,
                "document_name" => $tracked_document->file,
                "document_id" => $tracked_document->id,
                "action" => "Rejected",
                "waktu" => Carbon::now('Asia/Jakarta'),
    
            ];
            DocumentHistory::create($validatedHistory);

            // mailing
            $data = [];
            $receiver = User::find($tracked_document->id_pengirim);
            
            $data["sender_name"] = auth()->user()->name;
            $data["receiver_name"] = $receiver->name;
            $data["document_name"] = $tracked_document->file;
            $data["body"] = "Sorry, your document: ".$data["document_name"]." got rejected. You can view the portal to find more details";
 
            // Send the mail...
            Mail::to($receiver->email)->send(new MailNotify($data));
            return back()->with('success', 'Dokumen berhasil ditolak');
        }

        // approval
        $validatedData = [
            "level_approval" => $tracked_document->level_approval + 1,
        ];
        if (Gate::allows('gm')) {
            $validatedData["status"] = "Approved";
        }
        
        tracked_document::where('id',$tracked_document->id)->update($validatedData);

        // creating history row
        $validatedHistory = [
            "user_id" => auth()->user()->id,
            "document_name" => $tracked_document->file,
            "document_id" => $tracked_document->id,
            "action" => "Approved",
            "waktu" => Carbon::now('Asia/Jakarta'),

        ];
        DocumentHistory::create($validatedHistory);
        // mailing
        $data = [];
        
        if(Gate::allows('supervisor')){
            $sender = User::find($tracked_document->id_pengirim);
            $receiver = User::find($tracked_document->id_level_tiga);
        }
        if(Gate::allows('manager')){
            $sender = User::find($tracked_document->id_pengirim);
            $receiver = User::find($tracked_document->id_level_empat);
        }
        if(Gate::allows('gm')){
            $sender = auth()->user();
            $receiver = User::find($tracked_document->id_pengirim);
        }
        
        
        $data["sender_name"] = $sender->name;
        $data["receiver_name"] = $receiver->name;
        $data["document_name"] = $tracked_document->file;

        if(Gate::allows('gm')){
            $data["body"] = "Good news! Your document: ".$data["document_name"]." got approved. You can view the portal to find more details";
        }
        else{
            $data["body"] = "There's a document named: ".$data["document_name"]." waiting for your approval. You can view the portal to find more details";
        }

        // Send the mail...
        Mail::to($receiver->email)->send(new MailNotify($data));
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
        $data = [
            'document' => $id_trc,
            'downloaded_time' => Carbon::now('Asia/Jakarta'),
        ];
        if($id_trc->level_approval == 4){
            $data['pengirim'] = User::find($id_trc->id_level_empat);
            $data['kedua'] = User::find($id_trc->id_level_dua);
            $data['ketiga'] = User::find($id_trc->id_level_tiga);
            $data['keempat'] = User::find($id_trc->id_level_empat);
        }
        $pdf = Pdf::loadView('portal.template_pdf', $data);
        $uniqname = 'id-tracked-'.$id_trc->id.'-'.$id_trc->file;
        return $pdf->stream($uniqname . '.pdf');
    }
}
