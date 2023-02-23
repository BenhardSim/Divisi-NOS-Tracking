<?php

namespace App\Http\Controllers;

use App\Imports\BBMImport;
use App\Imports\IRRImport;
use App\Imports\KPIImport;
use App\Imports\RVCImport;
use App\Imports\OPEXImport;
use App\Imports\InfraImport;
use App\Imports\PLNImport_2;
use Illuminate\Http\Request;
use App\Imports\CComponentImport;
use App\Imports\KPISupportImport;
use App\Imports\ProfitLossImport;
use App\Imports\KPIActivityImport;
use App\Imports\ReservedCostImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ImportController extends Controller
{
    public function importTemplates(){
        // dd('test');
        $validatedData = request()->all();

        $validator = Validator::make( request()->all(),[
                "tipe-template" => "required",
                "file" => "required",
            ]
        );

        $mimes_validator = Validator::make(request()->all(),[
            "file" => "mimes:xlsx,csv",
        ]);

        if($mimes_validator->fails()){
            return back()->with('toast_error', 'masukkan dokumen dengan tipe data .csv atau .xlsx');
        };

        if($validator->fails()){
            return back()->with('toast_error', 'pilih jenis Dokumen yang akan di masukkan !');
        };


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
        }else if($validatedData["tipe-template"] === 'ProfitLoss'){
            Excel::import(new ProfitLossImport,request()->file('file'));
            return back()->with('toast_success', 'Data Profit Loss berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'RVC'){
            Excel::import(new RVCImport,request()->file('file'));
            return back()->with('toast_success', 'Data Revenue VS Cost berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'BBM'){
            Excel::import(new BBMImport,request()->file('file'));
            return back()->with('toast_success', 'Data BBM berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'OPEX'){
            Excel::import(new OPEXImport,request()->file('file'));
            return back()->with('toast_success', 'Data OPEX berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'Tren_IRR'){
            Excel::import(new IRRImport,request()->file('file'));
            return back()->with('toast_success', 'Data Tren IRR berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'CCOMPONENT'){
            Excel::import(new CComponentImport,request()->file('file'));
            return back()->with('toast_success', 'Data Cost Component berhasil ditambahkan');
        }else if($validatedData["tipe-template"] === 'IIRR'){
            Excel::import(new InfraImport,request()->file('file'));
            return back()->with('toast_success', 'Data Infra IRR berhasil ditambahkan');
        }else if($validatedData['tipe-template'] === 'PLN'){
            // dd('test');
            Excel::import(new PLNImport_2,request()->file('file'));
            return back()->with('toast_success', 'Data PLN berhasil ditambahkan');
        }
       
    }
}
