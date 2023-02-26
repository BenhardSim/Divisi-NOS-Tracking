<?php

namespace App\Http\Controllers;

use App\Models\DocumentHistory;
use App\Models\tracked_document;
use App\Models\User;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    //
    public function index(){
        return view('portal.tracking', [
            "title" => "Tracked Document List",
            "documents" => tracked_document::orderBy("tanggal", "DESC")->paginate(10),
        ]);
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
        return view('portal.detailtracked_admin',[
            "document" => $tracked_document,
            "title" => "Detail Tracked Document",
            "pengirim" => User::find($tracked_document->id_pengirim),
            "kedua" => User::find($tracked_document->id_level_dua),
            "ketiga" => User::find($tracked_document->id_level_tiga),
            "keempat" => User::find($tracked_document->id_level_empat),
            "users_lvl_1" => User::where('level_akun',1)->get(),
            "users_lvl_2" => User::where('level_akun',2)->get(),
            "users_lvl_3" => User::where('level_akun',3)->get(),
            "users_lvl_4" => User::where('level_akun',4)->get(),
        ]);
    }
}
