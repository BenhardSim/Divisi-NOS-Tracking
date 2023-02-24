<?php

namespace App\Http\Controllers;

use App\Models\NumberedDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Riskihajar\Terbilang\Facades\Terbilang;

class NumberedDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('portal.numbering',[
            "documents" => NumberedDocument::paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "tipe_file" => "required",
            "departemen" => "required",
            "uraian" => "required",
            "vendor" => "required",
            "amount" => "required",
            "dokumen" => "required",
        ]);
        $maxID = NumberedDocument::max('id') + 1;

        $date = Carbon::now('Asia/Jakarta');
        $year = $date->year;
        $month = Terbilang::roman($date->month, false); // MCCXXXIV;
        $format ='/KX-04'.$validatedData['tipe_file'].$validatedData['departemen'].'/'.$month.'/'.$year;
        $counter = NumberedDocument::where('kode', 'like', '%'.$format)->count() + 1;
        $format = str_pad($counter, 3, '0', STR_PAD_LEFT).$format;
        $validatedData['tanggal'] = $date;
        $validatedData['kode'] = $format;
        $docs = $request->file('dokumen');
        $uniqname = 'id-numbered-'.$maxID.'-'.$docs->getClientOriginalName();
        $docs->storeAs('public/file-numbered',$uniqname);
        $validatedData['dokumen'] = $uniqname;
        if($validatedData['departemen'] == "-4"){
            $validatedData['departemen'] = 'Region Network Operations and Productivity Jawa Timur Division';
        }
        else if($validatedData['departemen'] == "-41"){
            $validatedData['departemen'] = 'Network Operations and Productivity Semarang Department';
        }
        else if($validatedData['departemen'] == "-42"){
            $validatedData['departemen'] = 'Network Operations and Productivity Purwokerto Department';
        }
        else if($validatedData['departemen'] == "-43"){
            $validatedData['departemen'] = 'Network Operations and Productivity Pekalongan Department';
        }
        else if($validatedData['departemen'] == "-44"){
            $validatedData['departemen'] = 'Network Operations and Productivity Yogyakarta Department';
        }
        else if($validatedData['departemen'] == "-45"){
            $validatedData['departemen'] = 'Network Operations and Productivity Surakarta Department';
        }
        else if($validatedData['departemen'] == "-46"){
            $validatedData['departemen'] = 'Network Operations and Productivity Salatiga Department';
        }
        else if($validatedData['departemen'] == "-47"){
            $validatedData['departemen'] = 'Service Quality Assurance Jawa Tengah and DIY Department';
        }
        else if($validatedData['departemen'] == "-48"){
            $validatedData['departemen'] = 'Core, Transport, and Datacenter Operations Jawa Tengah and DIY Department';
        }
        else if($validatedData['departemen'] == "-49"){
            $validatedData['departemen'] = 'Network Operations Support Jawa Tengah and DIY Department';
        }

        if($validatedData['tipe_file'] == "/BAST"){
            $validatedData['tipe_file'] = 'Berita Acara Serah Terima';
        }
        else if($validatedData['tipe_file'] == "/BAK"){
            $validatedData['tipe_file'] = 'Berita Acara Kesepakatan';
        }
        else if($validatedData['tipe_file'] == "/BAKN"){
            $validatedData['tipe_file'] = 'Berita Acara Kesepakatan Negosiasi';
        }
        else if($validatedData['tipe_file'] == "/BAUT"){
            $validatedData['tipe_file'] = 'Berita Acara Uji Terima';
        }
        else if($validatedData['tipe_file'] == "/BAN"){
            $validatedData['tipe_file'] = 'Berita Acara Negosiasi';
        }
        else if($validatedData['tipe_file'] == "/JTF"){
            $validatedData['tipe_file'] = 'Justifikasi';
        }
        else if($validatedData['tipe_file'] == "/RAB"){
            $validatedData['tipe_file'] = 'Rencana Anggaran Biaya';
        }
        else if($validatedData['tipe_file'] == "/MOM"){
            $validatedData['tipe_file'] = 'Minute of Meeting';
        }
        else if($validatedData['tipe_file'] == "/TA"){
            $validatedData['tipe_file'] = 'Technical Assesmen';
        }
        else if($validatedData['tipe_file'] == "/OTH"){
            $validatedData['tipe_file'] = 'Other';
        }
        
        NumberedDocument::create($validatedData);
        return back()->with('toast_success', 'Dokumen berhasil dinomori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberedDocument  $numbereddocument
     * @return \Illuminate\Http\Response
     */
    public function show(NumberedDocument $numbereddocument)
    {
        //
        $name = $numbereddocument->dokumen;
        return response()->file(storage_path('app\public\file-numbered\\'.$name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumberedDocument  $numberedDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberedDocument $numberedDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberedDocument  $numberedDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberedDocument $numberedDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberedDocument  $numbereddocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberedDocument $numbereddocument)
    {
        NumberedDocument::where('id', $numbereddocument->id)->delete();

        $name = $numbereddocument->dokumen;
        unlink(storage_path('app\public\file-numbered\\'.$name));
        return back()->with('toast_success', 'Data Numbered Document berhasil dihapus');
    }
}
