<?php

namespace App\Http\Controllers;

use App\Models\tracked_document;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    //
    public function index(){
        return view('portal.tracking', [
            "title" => "Tracked Document List",
            "documents" => tracked_document::orderBy("tanggal", "DESC")->get(),
        ]);
    }
}
