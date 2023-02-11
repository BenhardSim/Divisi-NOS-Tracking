<?php

namespace App\Http\Controllers;

use App\Models\siteprofile;
use App\Models\KPI_Support;
use App\Models\KPI_utama;
use App\Models\KPI_aktif;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

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

        /* ==================================== LOGIC KPI ACTIVITY REGIONAL =========================================================== */

        $AllIds_KPI_activity = KPI_aktif::orderBy('date')->get()->toArray(); 
        $value_KPI_activity_target = array();
        $value_KPI_active_activity = array();
        $value_KPI_activity = array();
        $monthList_KPI_activity = array();

        if(sizeof($AllIds_KPI_activity) !== 0){
            // ambil interval date bulan dari data paling kecil ke paling besar 
            $from = $AllIds_KPI_activity[0]['date'];
            $to = $AllIds_KPI_activity[sizeof($AllIds_KPI_activity)-1]['date'];
            
            // key -> value untuk mengecek apakah bulan sudah ada atau blm 
            $check_month = [];
            
            // Reservation::whereBetween('reservation_from', [$from, $to])->get();
            // mengenerate periode
            $period = CarbonPeriod::create($from, $to);
            
            // mengeassign value dengan default 0 bila tidak ada
            foreach ($period as $date) {
                $key = $date->format('Y-m');
                $check_month[$key] = 0;
            }
            
            // proses filter
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                $key = $date->format('Y-m');
                // kalau belum terpilih 
                if($check_month[$key] !== 1){
                    array_push($monthList_KPI_activity,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }
            }

            // inisial nilai value dengan panjang month list
            $value_KPI_activity_target = array_fill(0, sizeof($monthList_KPI_activity), 0);
            $value_KPI_active_activity = array_fill(0, sizeof($monthList_KPI_activity), 0);
            $value_KPI_activity = array_fill(0, sizeof($monthList_KPI_activity), 0);
            
            // Convert the period to an array of dates
            // $monthList = $period->format('Y-m-d')->toArray();

            // dd($from.'-'.$to);
            // dd($monthList_KPI_activity);
            foreach($AllIds_KPI_activity as $AllId){
                $data_target =  $AllId;
                $month_target =  $AllId['date'];
                // Carbon::parse($month_target->format('Y-m-d'));
                $month_target =  date('Y-M', strtotime($month_target));
                // $month_target =  date('F', strtotime($strmonth->pluck('date')));

                // O(nx12)
                foreach($monthList_KPI_activity as $key => $month){
                    $month =  date('Y-M', strtotime($month));
                    if($month_target === $month){
                        $value_KPI_activity_target[$key] += $data_target['kpi_target'];
                        $value_KPI_active_activity[$key] += $data_target['ach_kpi'];
                        $value_KPI_activity[$key] += $data_target['kpi_activity'];
                    } 
                }
                // array_push($monthList,$month_target);
            };

             // hanya mengambil 12 data terakhir
             if(sizeof($monthList_KPI_activity) > 12){
                $size = sizeof($monthList_KPI_activity);
                $value_KPI_active_activity = array_slice($value_KPI_active_activity,$size-12,$size-1);
                $value_KPI_activity_target = array_slice($value_KPI_activity_target,$size-12,$size-1);
                $value_KPI_activity = array_slice($value_KPI_activity,$size-12,$size-1);
                $monthList_KPI_activity = array_slice($monthList_KPI_activity,$size-12,$size-1);
                
            }

        }
        return view('portal.Chart_NOP_KPIA', [
            "root" => "kpia",
            "title" => "Chart KPI Activity",
            "site_all" => siteprofile::all(),

            "value_KPI_activity_target" => $value_KPI_activity_target,
            "value_KPI_active_activity" => $value_KPI_active_activity,
            "value_KPI_activity" => $value_KPI_activity,
            "monthList_KPI_activity" => $monthList_KPI_activity,
        ]);
    }


    public function indexKPIU(){

        /* ==================================== LOGIC KPI UTAMA REGIONAL =========================================================== */

        // $AllIds = KPI_utama::all()->toArray();
        // mengamvil data berurut berdasarkan tanggal masuk dan mengubah menjadi array
        $AllIds = KPI_utama::orderBy('date')->get()->toArray(); 
        $value_KPI_target = array();
        $value_KPI_active_utama = array();
        $value_KPI_utama = array();
        $monthList_KPI_Utama = array();

        if(sizeof($AllIds) !== 0){
            // ambil interval date bulan dari data paling kecil ke paling besar 
            $from = $AllIds[0]['date'];
            $to = $AllIds[sizeof($AllIds)-1]['date'];
            
            // key -> value untuk mengecek apakah bulan sudah ada atau blm 
            $check_month = [];
            
            // Reservation::whereBetween('reservation_from', [$from, $to])->get();
            // mengenerate periode
            $period = CarbonPeriod::create($from, $to);
            
            // mengeassign value dengan default 0 bila tidak ada
            foreach ($period as $date) {
                $key = $date->format('Y-m');
                $check_month[$key] = 0;
            }
            
            // proses filter
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                $key = $date->format('Y-m');
                // kalau belum terpilih 
                if($check_month[$key] !== 1){
                    array_push($monthList_KPI_Utama,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }
            }

            // inisial nilai value dengan panjang month list
            $value_KPI_target = array_fill(0, sizeof($monthList_KPI_Utama), 0);
            $value_KPI_active_utama = array_fill(0, sizeof($monthList_KPI_Utama), 0);
            $value_KPI_utama = array_fill(0, sizeof($monthList_KPI_Utama), 0);
            
            // Convert the period to an array of dates
            // $monthList = $period->format('Y-m-d')->toArray();

            // dd($from.'-'.$to);
            // dd($monthList_KPI_Utama);
            foreach($AllIds as $AllId){
                $data_target =  $AllId;
                $month_target =  $AllId['date'];
                // Carbon::parse($month_target->format('Y-m-d'));
                $month_target =  date('Y-M', strtotime($month_target));
                // $month_target =  date('F', strtotime($strmonth->pluck('date')));

                // O(nx12)
                foreach($monthList_KPI_Utama as $key => $month){
                    $month =  date('Y-M', strtotime($month));
                    if($month_target === $month){
                        $value_KPI_target[$key] += $data_target['kpi_target'];
                        $value_KPI_active_utama[$key] += $data_target['ach_kpi'];
                        $value_KPI_utama[$key] += $data_target['kpi_utama'];
                    } 
                }
                // array_push($monthList,$month_target);
            };

            // hanya mengambil 12 data terakhir
            if(sizeof($monthList_KPI_Utama) > 12){
                $size = sizeof($monthList_KPI_Utama);
                $value_KPI_active_utama = array_slice($value_KPI_active_utama,$size-12,$size-1);
                $value_KPI_target = array_slice($value_KPI_target,$size-12,$size-1);
                $value_KPI_utama = array_slice($value_KPI_utama,$size-12,$size-1);
                $monthList_KPI_Utama = array_slice($monthList_KPI_Utama,$size-12,$size-1);
                
            }
        }

        return view('portal.Chart_NOP_KPIU', [
            "root" => "kpiu",
            "title" => "Chart KPI Utama",
            "site_all" => siteprofile::all(),

            "value_KPI_target" => $value_KPI_target,
            "value_KPI_active_utama" => $value_KPI_active_utama,
            "value_KPI_utama" => $value_KPI_utama,
            "monthList_KPI_Utama" => $monthList_KPI_Utama,
        ]);
    }

    // Pass by reference
    function KPISNOP(&$allid,&$kpi_target,&$kpi_active,&$kpi_val,&$kpi_month,$NOP){
        if(sizeof($allid) !== 0){
            // ambil interval date bulan dari data paling kecil ke paling besar 
            $from = $allid[0]['date'];
            $to = $allid[sizeof($allid)-1]['date'];
            
            // key -> value untuk mengecek apakah bulan sudah ada atau blm 
            $check_month = [];
            
            // Reservation::whereBetween('reservation_from', [$from, $to])->get();
            // mengenerate periode
            $period = CarbonPeriod::create($from, $to);
            
            // mengeassign value dengan default 0 bila tidak ada
            foreach ($period as $date) {
                $key = $date->format('Y-m');
                $check_month[$key] = 0;
            }
            
            // proses filter
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                $key = $date->format('Y-m');
                // kalau belum terpilih 
                if($check_month[$key] !== 1){
                    array_push($kpi_month,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }
            }

            // inisial nilai value dengan panjang month list
            $kpi_target = array_fill(0, sizeof($kpi_month), 0);
            $kpi_active = array_fill(0, sizeof($kpi_month), 0);
            $kpi_val = array_fill(0, sizeof($kpi_month), 0);
            
            // Convert the period to an array of dates
            // $monthList = $period->format('Y-m-d')->toArray();

            // dd($from.'-'.$to);
            // dd($kpi_month);
            foreach($allid as $AllId){
                $data_target =  $AllId;
                $month_target =  $AllId['date'];
                // Carbon::parse($month_target->format('Y-m-d'));
                $month_target =  date('Y-M', strtotime($month_target));
                // $month_target =  date('F', strtotime($strmonth->pluck('date')));

                // O(nx12)
                foreach($kpi_month as $key => $month){
                    $month =  date('Y-M', strtotime($month));
                    if($month_target === $month && $data_target['NOP'] === $NOP){
                        $kpi_target[$key] += $data_target['kpi_target'];
                        $kpi_active[$key] += $data_target['ach_kpi'];
                        $kpi_val[$key] += $data_target['kpi_support'];
                    } 
                }
                // array_push($monthList,$month_target);
            };

             // hanya mengambil 12 data terakhir
             if(sizeof($kpi_month) > 12){
                $size = sizeof($kpi_month);
                $kpi_active = array_slice($kpi_active,$size-12,$size-1);
                $kpi_target = array_slice($kpi_target,$size-12,$size-1);
                $kpi_val = array_slice($kpi_val,$size-12,$size-1);
                $kpi_month = array_slice($kpi_month,$size-12,$size-1);
            }

        }
    }



    public function indexKPIS(){

        
        /* ==================================== LOGIC KPI SUPPORT REGIONAL =========================================================== */

        $AllIds_KPI_support = KPI_support::orderBy('date')->get()->toArray(); 
        $value_KPI_support_target = array();
        $value_KPI_active_support = array();
        $value_KPI_support = array();
        $monthList_KPI_support = array();

        if(sizeof($AllIds_KPI_support) !== 0){
            // ambil interval date bulan dari data paling kecil ke paling besar 
            $from = $AllIds_KPI_support[0]['date'];
            $to = $AllIds_KPI_support[sizeof($AllIds_KPI_support)-1]['date'];
            
            // key -> value untuk mengecek apakah bulan sudah ada atau blm 
            $check_month = [];
            
            // Reservation::whereBetween('reservation_from', [$from, $to])->get();
            // mengenerate periode
            $period = CarbonPeriod::create($from, $to);
            
            // mengeassign value dengan default 0 bila tidak ada
            foreach ($period as $date) {
                $key = $date->format('Y-m');
                $check_month[$key] = 0;
            }
            
            // proses filter
            foreach ($period as $date) {
                // echo $date->format('Y-m-d');
                $key = $date->format('Y-m');
                // kalau belum terpilih 
                if($check_month[$key] !== 1){
                    array_push($monthList_KPI_support,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }
            }

            // inisial nilai value dengan panjang month list
            $value_KPI_support_target = array_fill(0, sizeof($monthList_KPI_support), 0);
            $value_KPI_active_support = array_fill(0, sizeof($monthList_KPI_support), 0);
            $value_KPI_support = array_fill(0, sizeof($monthList_KPI_support), 0);
            
            // Convert the period to an array of dates
            // $monthList = $period->format('Y-m-d')->toArray();

            // dd($from.'-'.$to);
            // dd($monthList_KPI_support);
            foreach($AllIds_KPI_support as $AllId){
                $data_target =  $AllId;
                $month_target =  $AllId['date'];
                // Carbon::parse($month_target->format('Y-m-d'));
                $month_target =  date('Y-M', strtotime($month_target));
                // $month_target =  date('F', strtotime($strmonth->pluck('date')));

                // O(nx12)
                foreach($monthList_KPI_support as $key => $month){
                    $month =  date('Y-M', strtotime($month));
                    if($month_target === $month){
                        $value_KPI_support_target[$key] += $data_target['kpi_target'];
                        $value_KPI_active_support[$key] += $data_target['ach_kpi'];
                        $value_KPI_support[$key] += $data_target['kpi_support'];
                    } 
                }
                // array_push($monthList,$month_target);
            };

             // hanya mengambil 12 data terakhir
             if(sizeof($monthList_KPI_support) > 12){
                $size = sizeof($monthList_KPI_support);
                $value_KPI_active_support = array_slice($value_KPI_active_support,$size-12,$size-1);
                $value_KPI_support_target = array_slice($value_KPI_support_target,$size-12,$size-1);
                $value_KPI_support = array_slice($value_KPI_support,$size-12,$size-1);
                $monthList_KPI_support = array_slice($monthList_KPI_support,$size-12,$size-1);
            }

        }

        /* ==================================== LOGIC KPI SUPPORT NOP SEMARANG =========================================================== */

        $AllIds_KPI_support_semarang = KPI_support::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_semarang = array();
        $value_KPI_active_support_semarang = array();
        $value_KPI_support_semarang = array();
        $monthList_KPI_support_semarang = array();
        $this->KPISNOP($AllIds_KPI_support_semarang,$value_KPI_support_target_semarang,$value_KPI_active_support_semarang,$value_KPI_support_semarang,$monthList_KPI_support_semarang,'semarang');
        

        /* ==================================== LOGIC KPI SUPPORT NOP SURAKARTA =========================================================== */

        $AllIds_KPI_support_surakarta = KPI_support::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_surakarta = array();
        $value_KPI_active_support_surakarta = array();
        $value_KPI_support_surakarta = array();
        $monthList_KPI_support_surakarta = array();
        $this->KPISNOP($AllIds_KPI_support_surakarta,$value_KPI_support_target_surakarta,$value_KPI_active_support_surakarta,$value_KPI_support_surakarta,$monthList_KPI_support_surakarta,'surakarta');

        /* ==================================== LOGIC KPI SUPPORT NOP YOGYAKARTA =========================================================== */

        $AllIds_KPI_support_yogyakarta = KPI_support::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_yogyakarta = array();
        $value_KPI_active_support_yogyakarta = array();
        $value_KPI_support_yogyakarta = array();
        $monthList_KPI_support_yogyakarta = array();
        $this->KPISNOP($AllIds_KPI_support_yogyakarta,$value_KPI_support_target_yogyakarta,$value_KPI_active_support_yogyakarta,$value_KPI_support_yogyakarta,$monthList_KPI_support_yogyakarta,'yogyakarta');

        /* ==================================== LOGIC KPI SUPPORT NOP PURWOKERTO =========================================================== */

        $AllIds_KPI_support_purwokerto = KPI_support::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_purwokerto = array();
        $value_KPI_active_support_purwokerto = array();
        $value_KPI_support_purwokerto = array();
        $monthList_KPI_support_purwokerto = array();
        $this->KPISNOP($AllIds_KPI_support_purwokerto,$value_KPI_support_target_purwokerto,$value_KPI_active_support_purwokerto,$value_KPI_support_purwokerto,$monthList_KPI_support_purwokerto,'purwokerto');

        /* ==================================== LOGIC KPI SUPPORT NOP PEKALONGAN =========================================================== */

        $AllIds_KPI_support_pekalongan = KPI_support::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_pekalongan = array();
        $value_KPI_active_support_pekalongan = array();
        $value_KPI_support_pekalongan = array();
        $monthList_KPI_support_pekalongan = array();
        $this->KPISNOP($AllIds_KPI_support_pekalongan,$value_KPI_support_target_pekalongan,$value_KPI_active_support_pekalongan,$value_KPI_support_pekalongan,$monthList_KPI_support_pekalongan,'pekalongan');

        /* ==================================== LOGIC KPI SUPPORT NOP SALATIGA =========================================================== */

        $AllIds_KPI_support_salatiga = KPI_support::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_salatiga = array();
        $value_KPI_active_support_salatiga = array();
        $value_KPI_support_salatiga = array();
        $monthList_KPI_support_salatiga = array();
        $this->KPISNOP($AllIds_KPI_support_salatiga,$value_KPI_support_target_salatiga,$value_KPI_active_support_salatiga,$value_KPI_support_salatiga,$monthList_KPI_support_salatiga,'salatiga');


        return view('portal.Chart_NOP_KPIS', [
            "root" => "kpis",
            "title" => "Chart KPI Supporting",
            "site_all" => siteprofile::all(),

            "value_KPI_support_target" => $value_KPI_support_target,
            "value_KPI_active_support" => $value_KPI_active_support,
            "value_KPI_support" => $value_KPI_support,
            "monthList_KPI_support" => $monthList_KPI_support,

            "value_KPI_support_target_semarang" => $value_KPI_support_target_semarang,
            "value_KPI_active_support_semarang" => $value_KPI_active_support_semarang,
            "value_KPI_support_semarang" => $value_KPI_support_semarang,
            "monthList_KPI_support_semarang" => $monthList_KPI_support_semarang,

            "value_KPI_support_target_surakarta" => $value_KPI_support_target_surakarta,
            "value_KPI_active_support_surakarta" => $value_KPI_active_support_surakarta,
            "value_KPI_support_surakarta" => $value_KPI_support_surakarta,
            "monthList_KPI_support_surakarta" => $monthList_KPI_support_surakarta,

            "value_KPI_support_target_yogyakarta" => $value_KPI_support_target_yogyakarta,
            "value_KPI_active_support_yogyakarta" => $value_KPI_active_support_yogyakarta,
            "value_KPI_support_yogyakarta" => $value_KPI_support_yogyakarta,
            "monthList_KPI_support_yogyakarta" => $monthList_KPI_support_yogyakarta,

            "value_KPI_support_target_purwokerto" => $value_KPI_support_target_purwokerto,
            "value_KPI_active_support_purwokerto" => $value_KPI_active_support_purwokerto,
            "value_KPI_support_purwokerto" => $value_KPI_support_purwokerto,
            "monthList_KPI_support_purwokerto" => $monthList_KPI_support_purwokerto,

            "value_KPI_support_target_pekalongan" => $value_KPI_support_target_pekalongan,
            "value_KPI_active_support_pekalongan" => $value_KPI_active_support_pekalongan,
            "value_KPI_support_pekalongan" => $value_KPI_support_pekalongan,
            "monthList_KPI_support_pekalongan" => $monthList_KPI_support_pekalongan,

            "value_KPI_support_target_salatiga" => $value_KPI_support_target_salatiga,
            "value_KPI_active_support_salatiga" => $value_KPI_active_support_salatiga,
            "value_KPI_support_salatiga" => $value_KPI_support_salatiga,
            "monthList_KPI_support_salatiga" => $monthList_KPI_support_salatiga,
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
