<?php

namespace App\Http\Controllers;

use App\Models\tagging_asset;
use Illuminate\Http\Request;

class TaggingController extends Controller
{
    //
    public function index(){
        return view('portal.tagging', [
            "title" => "Tagging Asset",
            "assets" => tagging_asset::paginate(10)
        ]);
    }
}
