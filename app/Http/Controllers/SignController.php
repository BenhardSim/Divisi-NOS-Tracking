<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    //
    public function index(){
        return view('portal.sign', [
            "title" => "Sign Document",
        ]);
    }
}
