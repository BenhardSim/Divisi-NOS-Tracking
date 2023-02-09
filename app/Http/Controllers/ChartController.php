<?php

namespace App\Http\Controllers;

use App\Models\siteprofile;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //Fungsi Index
    public function indexBBM(){
        return view('portal.Chart_NOP_BBM', [
            "root" => "bbm",
            "title" => "Chart Cost BBM NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexOPEX(){
        return view('portal.Chart_NOP_OPEX', [
            "root" => "opex",
            "title" => "Chart OPEX NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexRVC(){
        return view('portal.Chart_NOP_RVC', [
            "root" => "rvc",
            "title" => "Chart Revenue VS Cost NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexRV(){
        return view('portal.Chart_NOP_RV', [
            "root" => "rv",
            "title" => "Chart Reserved Varcost NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexPL(){
        return view('portal.Chart_NOP_PL', [
            "root" => "pl",
            "title" => "Chart Profit Loss NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexTIRR(){
        return view('portal.Chart_NOP_TIRR', [
            "root" => "tirr",
            "title" => "Chart Tren IRR VS Revenue VS Komitmen NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexIIRR(){
        return view('portal.Chart_NOP_IIRR', [
            "root" => "iirr",
            "title" => "Chart Infra IRR NOP",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexKPIA(){
        return view('portal.Chart_NOP_KPIA', [
            "root" => "kpia",
            "title" => "Chart KPI Activity",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexKPIU(){
        return view('portal.Chart_NOP_KPIU', [
            "root" => "kpiu",
            "title" => "Chart KPI Utama",
            "site_all" => siteprofile::all()
        ]);
    }
    public function indexKPIS(){
        return view('portal.Chart_NOP_KPIS', [
            "root" => "kpis",
            "title" => "Chart KPI Supporting",
            "site_all" => siteprofile::all()
        ]);
    }



    // Fungsi detail
    // public function detailBBM(siteprofile $site)
    // {
    //     return view('portal.profilechart',[
    //         "title" => "SITE ".$site->SITENAME,
    //         "site" => $site            
    //     ]);
    // }
    // public function detailRV(siteprofile $site)
    // {
    //     return view('portal.profilechart',[
    //         "title" => "SITE ".$site->SITENAME,
    //         "site" => $site            
    //     ]);
    // }
    // public function detailRVC(siteprofile $site)
    // {
    //     return view('portal.Chart_NOP_RVC',[
    //         "title" => "SITE ".$site->SITENAME,
    //         "site" => $site            
    //     ]);
    // }
    // public function detailPL(siteprofile $site)
    // {
    //     return view('portal.Chart_NOP_PL',[
    //         "title" => "SITE ".$site->SITENAME,
    //         "site" => $site            
    //     ]);
    // }
    // public function detailOPEX(siteprofile $site)
    // {
    //     return view('portal.profilechart',[
    //         "title" => "SITE ".$site->SITENAME,
    //         "site" => $site            
    //     ]);
    // }
}
