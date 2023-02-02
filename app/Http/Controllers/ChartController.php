<?php

namespace App\Http\Controllers;

use App\Models\siteprofile;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //Fungsi Index
    public function indexBBM(){
        return view('portal.site_listchart', [
            "root" => "bbm",
            "title" => "Daftar Cost BBM Site",
            "site_all" => siteprofile::paginate(10)
        ]);
    }
    public function indexOPEX(){
        return view('portal.site_listchart', [
            "root" => "opex",
            "title" => "Daftar OPEX Site",
            "site_all" => siteprofile::paginate(10)
        ]);
    }
    public function indexRVC(){
        return view('portal.site_listchart', [
            "root" => "rvc",
            "title" => "Daftar Revenue VS Cost Site",
            "site_all" => siteprofile::paginate(10)
        ]);
    }
    public function indexRV(){
        return view('portal.site_listchart', [
            "root" => "rv",
            "title" => "Daftar Reserved Varcost Site",
            "site_all" => siteprofile::paginate(10)
        ]);
    }
    public function indexPL(){
        return view('portal.site_listchart', [
            "root" => "pl",
            "title" => "Daftar Profit Loss Site",
            "site_all" => siteprofile::paginate(10)
        ]);
    }

    // Fungsi detail
    public function detailBBM(siteprofile $site)
    {
        return view('portal.profilechart',[
            "title" => "SITE ".$site->SITENAME,
            "site" => $site            
        ]);
    }
    public function detailRV(siteprofile $site)
    {
        return view('portal.profilechart',[
            "title" => "SITE ".$site->SITENAME,
            "site" => $site            
        ]);
    }
    public function detailRVC(siteprofile $site)
    {
        return view('portal.profilechart',[
            "title" => "SITE ".$site->SITENAME,
            "site" => $site            
        ]);
    }
    public function detailPL(siteprofile $site)
    {
        return view('portal.profilechart',[
            "title" => "SITE ".$site->SITENAME,
            "site" => $site            
        ]);
    }
    public function detailOPEX(siteprofile $site)
    {
        return view('portal.profilechart',[
            "title" => "SITE ".$site->SITENAME,
            "site" => $site            
        ]);
    }
}
