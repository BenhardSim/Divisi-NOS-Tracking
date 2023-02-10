<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KPIImport;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importTemplates(){
        // dd('test');
        $validatedData = request()->validate([
            "tipe-template" => "Required",
        ]);
        if($validatedData["tipe-template"] === 'KPI_utama'){
            Excel::import(new KPIImport,request()->file('file'));
            return back();
        }else if($validatedData["tipe-template"] === 'RVC'){
    
        }else if($validatedData["tipe-template"] === 'BBM'){
    
        }else if($validatedData["tipe-template"] === 'OPEX'){
    
        };
        dd("fail");
    }
}
