<?php

namespace App\Http\Controllers;

use Exception;
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
            "file" => "mimes:xlsx,csv,txt",
        ]);

        if($mimes_validator->fails()){
            return back()->with('toast_error', 'masukkan dokumen dengan tipe data .csv atau .xlsx dan pastikan file tidak kosong');
        };

        if($validator->fails()){
            return back()->with('toast_error', 'pilih jenis Dokumen yang akan di masukkan !');
        };


        if($validatedData["tipe-template"] === 'KPI_utama'){

            $datas = Excel::toArray(new KPIImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new KPIImport,request()->file('file'));
                return back()->with('toast_success', 'Data KPI Aktif berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'KPI_aktif'){

            $datas = Excel::toArray(new KPIActivityImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new KPIActivityImport,request()->file('file'));
                return back()->with('toast_success', 'Data KPI Activity berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

            
        }else if($validatedData["tipe-template"] === 'KPI_support'){
            
            $datas = Excel::toArray(new KPISupportImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new KPISupportImport,request()->file('file'));
                return back()->with('toast_success', 'Data KPI Support berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'RCOST'){

            $datas = Excel::toArray(new ReservedCostImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }


            try{
                Excel::import(new ReservedCostImport,request()->file('file'));
                return back()->with('toast_success', 'Data Reserved Var Cost berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

           
        }else if($validatedData["tipe-template"] === 'ProfitLoss'){
            // dd(Excel::toArray(new ProfitLossImport,request()->file('file')));
            $datas = Excel::toArray(new ProfitLossImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            // ================== validasi Kesusaian Template ==========
            try{
                Excel::import(new ProfitLossImport,request()->file('file'));
                return back()->with('toast_success', 'Data Profit Loss berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };
        }else if($validatedData["tipe-template"] === 'RVC'){

            $datas = Excel::toArray(new RVCImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new RVCImport,request()->file('file'));
                return back()->with('toast_success', 'Data Revenue VS Cost berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'BBM'){

            $datas = Excel::toArray(new BBMImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new BBMImport,request()->file('file'));
                return back()->with('toast_success', 'Data BBM berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'OPEX'){

            $datas = Excel::toArray(new OPEXImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new OPEXImport,request()->file('file'));
                return back()->with('toast_success', 'Data OPEX berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'Tren_IRR'){

            $datas = Excel::toArray(new IRRImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new IRRImport,request()->file('file'));
                return back()->with('toast_success', 'Data Tren IRR berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };
            
        }else if($validatedData["tipe-template"] === 'CCOMPONENT'){

            $datas = Excel::toArray(new CComponentImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new CComponentImport,request()->file('file'));
                return back()->with('toast_success', 'Data Cost Component berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData["tipe-template"] === 'IIRR'){

            $datas = Excel::toArray(new InfraImport,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new InfraImport,request()->file('file'));
                return back()->with('toast_success', 'Data Infra IRR berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }else if($validatedData['tipe-template'] === 'PLN'){
            // dd('test');

            $datas = Excel::toArray(new PLNImport_2,request()->file('file'))[0];

            // ================== validasi pengecekan Table kosong ==========
            
            if($datas === []){
                return back()->with('toast_error', 'Data Pada File Tidak Boleh Kosong !');
            }

            // ================== validasi pengecekan cell kosong ==========
            $errors = [];

            foreach($datas[0] as $key => $val)$errors[$key] = 0;
            foreach($datas as $rows){
                foreach($rows as $key => $cell){
                    if($cell === null)$errors[$key]++;
                }
            }

            $total_empty = 0;
            $errorMsg = '';
            foreach($errors as $col => $count){
                if($count > 0){
                    $total_empty += 1;
                    $errorMsg = $errorMsg.'Terdapat '.$count.' cell Kosong pada column '.$col.'<br>';
                }
            }        

            if($total_empty !== 0){
                return back()->with('cell_kosong', $errorMsg);
            }

            try{
                Excel::import(new PLNImport_2,request()->file('file'));
                return back()->with('toast_success', 'Data PLN berhasil ditambahkan');
            }catch(Exception $e){
                return back()->with('toast_error', 'Data Gagal Dimasukkan.');
            };

        }
       
    }
}
