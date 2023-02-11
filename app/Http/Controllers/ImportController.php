<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KPIImport;
use App\Imports\KPIActivityImport;
use App\Imports\KPISupportImport;
use App\Imports\ReservedCostImport;
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
            return back()->with('toast_success', 'Data KPI Aktif berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'KPI_aktif'){
            Excel::import(new KPIActivityImport,request()->file('file'));
            return back()->with('toast_success', 'Data KPI Activity berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'KPI_support'){
            Excel::import(new KPISupportImport,request()->file('file'));
            return back()->with('toast_success', 'Data KPI Support berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'RCOST'){
            Excel::import(new ReservedCostImport,request()->file('file'));
            return back()->with('toast_success', 'Data Reserved Var Cost berhasil ditambahkan');
        };
        return back()->with('toast_error', 'pilih jenis Dokumen yang akan di masukkan !');
    }
}
