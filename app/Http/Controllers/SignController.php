<?php

namespace App\Http\Controllers;

use App\Models\tracked_document;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SignController extends Controller
{
    //
    public function index(){
        if (Gate::allows('staff')) {
            return view('portal.sign', [
                "title" => "Sign Document",
                "documents" => tracked_document::where("level_approval", 0)->where("id_pengirim", auth()->user()->id)->get(),
                "notifcount" => tracked_document::where("level_approval", 0)->where("id_pengirim", auth()->user()->id)->count(),
            ]);
        }
        if (Gate::allows('supervisor')) {
            return view('portal.sign', [
                "title" => "Sign Document",
                "documents" => tracked_document::where("level_approval", 1)->where("id_level_dua", auth()->user()->id)->get(),
                "notifcount" => tracked_document::where("level_approval", 1)->where("id_level_dua", auth()->user()->id)->count(),
            ]);
        }
        if (Gate::allows('manager')) {
            return view('portal.sign', [
                "title" => "Sign Document",
                "documents" => tracked_document::where("level_approval", 2)->where("id_level_tiga", auth()->user()->id)->get(),
                "notifcount" => tracked_document::where("level_approval", 2)->where("id_level_tiga", auth()->user()->id)->count(),
            ]);
        }
        if (Gate::allows('gm')) {
            return view('portal.sign', [
                "title" => "Sign Document",
                "documents" => tracked_document::where("level_approval", 3)->where("id_level_empat", auth()->user()->id)->where("status", "Pending")->get(),
                "notifcount" => tracked_document::where("level_approval", 3)->where("id_level_empat", auth()->user()->id)->where("status", "Pending")->count(),
            ]);
        }
        
    }
}
