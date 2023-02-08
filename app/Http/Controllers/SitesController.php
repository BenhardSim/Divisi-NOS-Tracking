<?php

namespace App\Http\Controllers;

use App\Models\certificate_document;
use App\Models\claim_asset;
use App\Models\commissue;
use App\Models\imb_document;
use App\Models\imbas_petir;
use App\Models\pbb;
use App\Models\siteprofile;
use App\Models\kontrak_site_history;
use App\Models\lain_document;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        return view('portal.site_list', [
            "title" => "Site All",
            "slug" => "site-all",
            "site_all" => siteprofile::paginate(10)
        ]);
    }

    public function indexTp()
    {
        return view('portal.site_list', [
            "title" => "Site TP",
            "slug" => "site-tp",
            "site_all" => siteprofile::where("TOWERSTATUS", "Sewa TP")->paginate(10)
        ]);
    }


    public function indexTelkom()
    {
        return view('portal.site_list', [
            "title" => "Site Telkom",
            "slug" => "site-telkom",
            "site_all" => siteprofile::where("PEMILIKTOWER", "Telkom")->paginate(10)
        ]);
    }


    public function indexTelkomsel()
    {
        return view('portal.site_list', [
            "title" => "Site Telkomsel",
            "slug" => "site-telkomsel",
            "site_all" => siteprofile::where("PEMILIKTOWER", "Telkomsel")->paginate(10)
        ]);
    }

    public function searchSites(Request $request)
    {
        if($request->search){
            $searchSites = siteprofile::where('SITEID','LIKE','%'.$request->search.'%')->paginate(10);
            return view('portal.site_list', [
                "title" => " Search : Site ".$request->search,
                "site_all" => $searchSites ,
                
            ]);
        }else{
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function detailSites(siteprofile $id)
    {

        $max_id_certificate = certificate_document::max('id');
        $max_id_imb = imb_document::max('id');
        $max_id_lain = lain_document::max('id');
        
        // nomor target sertifikat
        $no_ser_target = certificate_document::select()->find($max_id_certificate);
        $no_imb_target = imb_document::select()->find($max_id_imb);
        $no_lain_target = lain_document::select()->find($max_id_lain);
        

        return view('portal.profile',[
            "title" => "SITE ".$id->SITEID,
            "id" => $id->SITEID,
            "alamat" => $id->ALAMAT,
            "nama" => $id->SITENAME,
            "site" => $id,

            "imbas" => imbas_petir::where("Siteid", $id->SITEID)->get(),
            "pebebe" => pbb::where("SITEID", $id->SITEID)->get(),
            "claims" => claim_asset::where("SiteIDClaim", $id->SITEID)->get(),
            "no_kon" => $id->NOKONTRAK,
            "contracts" => kontrak_site_history::where('SITEID',$id->SITEID)->get(),
            "issues" => commissue::where("SITEID", $id->SITEID)->get(),

            "certi_docs" => certificate_document::where('SITEID', $id->SITEID)->get(),
            "imb_docs" => imb_document::where('SITEID',$id->SITEID)->get(),
            "lain_docs" => lain_document::where('SITEID',$id->SITEID)->get(),
            
            // latest document certificate
            "latest_cer" => $no_ser_target,
            "latest_imb" => $no_imb_target,
            "latest_lain" => $no_lain_target,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
