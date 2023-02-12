<?php

namespace App\Http\Controllers;

use App\Models\tracked_document;
use App\Models\User;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function index(){
        return view('portal.upDokumen',[
            "users_lvl_1" => User::where('level_akun',1)->get(),
            "users_lvl_2" => User::where('level_akun',2)->get(),
            "users_lvl_3" => User::where('level_akun',3)->get(),
            "users_lvl_4" => User::where('level_akun',4)->get(),
            "documents" => tracked_document::where('id_pengirim', auth()->user()->id)->orderBy('tanggal', 'DESC')->get(),
            
        ]);
    }
}
