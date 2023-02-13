<?php

namespace App\Http\Controllers;

use App\Models\DocumentHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function index(){
        return view('portal.history', [
            "title" => "Histories",
            "histories" => DocumentHistory::orderBy("waktu", "DESC")->get()
        ]);
    }
}
