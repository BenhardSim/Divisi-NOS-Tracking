<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use App\Models\KPI_Support;
use App\Models\siteprofile;
use App\Models\ReservedCost;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    // Pass by reference
    function KPISNOP(&$allid,&$kpi_target,&$kpi_active,&$kpi_val,&$kpi_month,$NOP,$type){
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
                    if($month_target === $month){
                        $kpi_target[$key] += $data_target['kpi_target'];
                        $kpi_active[$key] += $data_target['ach_kpi'];
                        $kpi_val[$key] += $data_target[$type];
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

    function RVNOP(&$AllIds_ReservedCost,&$monthList_ReservedCost,&$value_RCOST_PS,&$value_RCOST_RM){
        
        if(sizeof($AllIds_ReservedCost) !== 0){
            $size = sizeof($AllIds_ReservedCost);
            /*-- generate waktu untuk sumbu x --*/
            // ambil interval 
            $from = $AllIds_ReservedCost[0]['date'];
            $to = $AllIds_ReservedCost[$size-1]['date'];

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
                    array_push($monthList_ReservedCost,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }   
            }

            // inisial nilai value dengan panjang month list
            $value_RCOST_PS = array_fill(0, sizeof($monthList_ReservedCost), 0);
            $value_RCOST_RM = array_fill(0, sizeof($monthList_ReservedCost), 0);

            foreach($AllIds_ReservedCost as $data){
                $data_target =  $data;
                $data_type = $data['type'];
                $month_target =  $data['date'];
                $month_target =  date('Y-M', strtotime($month_target));
                $NOP_target = $data['nop'];

                // jumlah month sedikit tidak, foreach tidak memberi load yang besar
                foreach($monthList_ReservedCost as $key => $month){
                    $month =  date('Y-M', strtotime($month));

                    // cek apakah bulan sesuai dan masuk ke dalam tipe mana
                    if($month_target === $month && $data_type === 'PS'){
                         $value_RCOST_PS[$key] += $data_target['ticket_number'];
                     }else if($month_target === $month && $data_type === 'RM'){
                        $value_RCOST_RM[$key] += $data_target['ticket_number'];
                    } 
                    
                }
                
            }
        }
    }

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

         /* ==================================== LOGIC Reserved Var COST REGIONAL =========================================================== */

        // get All the data ordered by date
        $AllIds_ReservedCost = ReservedCost::orderBy('date')->get()->toArray(); 
        $monthList_ReservedCost = array();
        $value_RCOST_PS = array();
        $value_RCOST_RM = array();

        $this->RVNOP($AllIds_ReservedCost,$monthList_ReservedCost,$value_RCOST_PS,$value_RCOST_RM);

        /* ==================================== LOGIC Reserved Var COST NOP Semarang =========================================================== */

        $AllIds_ReservedCost_semarang = ReservedCost::where('NOP','semarang')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_semarang = array();
        $value_RCOST_PS_semarang = array();
        $value_RCOST_RM_semarang = array();

        $this->RVNOP($AllIds_ReservedCost_semarang,$monthList_ReservedCost_semarang,$value_RCOST_PS_semarang,$value_RCOST_RM_semarang);

        /* ==================================== LOGIC Reserved Var COST NOP Surakarta =========================================================== */

        $AllIds_ReservedCost_surakarta = ReservedCost::where('NOP','surakarta')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_surakarta = array();
        $value_RCOST_PS_surakarta = array();
        $value_RCOST_RM_surakarta = array();

        $this->RVNOP($AllIds_ReservedCost_surakarta,$monthList_ReservedCost_surakarta,$value_RCOST_PS_surakarta,$value_RCOST_RM_surakarta);

        /* ==================================== LOGIC Reserved Var COST NOP Yogyakarta =========================================================== */

        $AllIds_ReservedCost_yogyakarta = ReservedCost::where('NOP','yogyakarta')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_yogyakarta = array();
        $value_RCOST_PS_yogyakarta = array();
        $value_RCOST_RM_yogyakarta = array();

        $this->RVNOP($AllIds_ReservedCost_yogyakarta,$monthList_ReservedCost_yogyakarta,$value_RCOST_PS_yogyakarta,$value_RCOST_RM_yogyakarta);

        /* ==================================== LOGIC Reserved Var COST NOP Purwokerto =========================================================== */

        $AllIds_ReservedCost_purwokerto = ReservedCost::where('NOP','purwokerto')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_purwokerto = array();
        $value_RCOST_PS_purwokerto = array();
        $value_RCOST_RM_purwokerto = array();

        $this->RVNOP($AllIds_ReservedCost_purwokerto,$monthList_ReservedCost_purwokerto,$value_RCOST_PS_purwokerto,$value_RCOST_RM_purwokerto);

        /* ==================================== LOGIC Reserved Var COST NOP Pekalongan =========================================================== */

        $AllIds_ReservedCost_pekalongan = ReservedCost::where('NOP','pekalongan')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_pekalongan = array();
        $value_RCOST_PS_pekalongan = array();
        $value_RCOST_RM_pekalongan = array();

        $this->RVNOP($AllIds_ReservedCost_pekalongan,$monthList_ReservedCost_pekalongan,$value_RCOST_PS_pekalongan,$value_RCOST_RM_pekalongan);

        /* ==================================== LOGIC Reserved Var COST NOP Salatiga =========================================================== */

        $AllIds_ReservedCost_salatiga = ReservedCost::where('NOP','salatiga')->orderBy('date')->get()->toArray();
        $monthList_ReservedCost_salatiga = array();
        $value_RCOST_PS_salatiga = array();
        $value_RCOST_RM_salatiga = array();

        $this->RVNOP($AllIds_ReservedCost_salatiga,$monthList_ReservedCost_salatiga,$value_RCOST_PS_salatiga,$value_RCOST_RM_salatiga);


        return view('portal.Chart_NOP_RV', [
            "root" => "rv",
            "title" => "Chart Reserved Varcost NOP",
            "site_all" => siteprofile::all(),

            "monthList_ReservedCost" => $monthList_ReservedCost,
            "value_RCOST_PS" => $value_RCOST_PS,
            "value_RCOST_RM" => $value_RCOST_RM,

            "monthList_ReservedCost_semarang" => $monthList_ReservedCost_semarang,
            "value_RCOST_PS_semarang" => $value_RCOST_PS_semarang,
            "value_RCOST_RM_semarang" => $value_RCOST_RM_semarang,

            "monthList_ReservedCost_surakarta" => $monthList_ReservedCost_surakarta,
            "value_RCOST_PS_surakarta" => $value_RCOST_PS_surakarta,
            "value_RCOST_RM_surakarta" => $value_RCOST_RM_surakarta,

            "monthList_ReservedCost_yogyakarta" => $monthList_ReservedCost_yogyakarta,
            "value_RCOST_PS_yogyakarta" => $value_RCOST_PS_yogyakarta,
            "value_RCOST_RM_yogyakarta" => $value_RCOST_RM_yogyakarta,

            "monthList_ReservedCost_purwokerto" => $monthList_ReservedCost_purwokerto,
            "value_RCOST_PS_purwokerto" => $value_RCOST_PS_purwokerto,
            "value_RCOST_RM_purwokerto" => $value_RCOST_RM_purwokerto,

            "monthList_ReservedCost_pekalongan" => $monthList_ReservedCost_pekalongan,
            "value_RCOST_PS_pekalongan" => $value_RCOST_PS_pekalongan,
            "value_RCOST_RM_pekalongan" => $value_RCOST_RM_pekalongan,

            "monthList_ReservedCost_salatiga" => $monthList_ReservedCost_salatiga,
            "value_RCOST_PS_salatiga" => $value_RCOST_PS_salatiga,
            "value_RCOST_RM_salatiga" => $value_RCOST_RM_salatiga,
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

        /* ==================================== LOGIC KPI ACTIVITY NOP SEMARANG =========================================================== */

        $AllIds_KPI_aktif_semarang = KPI_aktif::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_semarang = array();
        $value_KPI_active_aktif_semarang = array();
        $value_KPI_aktif_semarang = array();
        $monthList_KPI_aktif_semarang = array();
        $this->KPISNOP($AllIds_KPI_aktif_semarang,$value_KPI_aktif_target_semarang,$value_KPI_active_aktif_semarang,$value_KPI_aktif_semarang,$monthList_KPI_aktif_semarang,'semarang','kpi_activity');
        

        /* ==================================== LOGIC KPI aktif NOP SURAKARTA =========================================================== */

        $AllIds_KPI_aktif_surakarta = KPI_aktif::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_surakarta = array();
        $value_KPI_active_aktif_surakarta = array();
        $value_KPI_aktif_surakarta = array();
        $monthList_KPI_aktif_surakarta = array();
        $this->KPISNOP($AllIds_KPI_aktif_surakarta,$value_KPI_aktif_target_surakarta,$value_KPI_active_aktif_surakarta,$value_KPI_aktif_surakarta,$monthList_KPI_aktif_surakarta,'surakarta','kpi_activity');

        /* ==================================== LOGIC KPI aktif NOP YOGYAKARTA =========================================================== */

        $AllIds_KPI_aktif_yogyakarta = KPI_aktif::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_yogyakarta = array();
        $value_KPI_active_aktif_yogyakarta = array();
        $value_KPI_aktif_yogyakarta = array();
        $monthList_KPI_aktif_yogyakarta = array();
        $this->KPISNOP($AllIds_KPI_aktif_yogyakarta,$value_KPI_aktif_target_yogyakarta,$value_KPI_active_aktif_yogyakarta,$value_KPI_aktif_yogyakarta,$monthList_KPI_aktif_yogyakarta,'yogyakarta','kpi_activity');

        /* ==================================== LOGIC KPI aktif NOP PURWOKERTO =========================================================== */

        $AllIds_KPI_aktif_purwokerto = KPI_aktif::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_purwokerto = array();
        $value_KPI_active_aktif_purwokerto = array();
        $value_KPI_aktif_purwokerto = array();
        $monthList_KPI_aktif_purwokerto = array();
        $this->KPISNOP($AllIds_KPI_aktif_purwokerto,$value_KPI_aktif_target_purwokerto,$value_KPI_active_aktif_purwokerto,$value_KPI_aktif_purwokerto,$monthList_KPI_aktif_purwokerto,'purwokerto','kpi_activity');

        /* ==================================== LOGIC KPI aktif NOP PEKALONGAN =========================================================== */

        $AllIds_KPI_aktif_pekalongan = KPI_aktif::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_pekalongan = array();
        $value_KPI_active_aktif_pekalongan = array();
        $value_KPI_aktif_pekalongan = array();
        $monthList_KPI_aktif_pekalongan = array();
        $this->KPISNOP($AllIds_KPI_aktif_pekalongan,$value_KPI_aktif_target_pekalongan,$value_KPI_active_aktif_pekalongan,$value_KPI_aktif_pekalongan,$monthList_KPI_aktif_pekalongan,'pekalongan','kpi_activity');

        /* ==================================== LOGIC KPI aktif NOP SALATIGA =========================================================== */

        $AllIds_KPI_aktif_salatiga = KPI_aktif::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_KPI_aktif_target_salatiga = array();
        $value_KPI_active_aktif_salatiga = array();
        $value_KPI_aktif_salatiga = array();
        $monthList_KPI_aktif_salatiga = array();
        $this->KPISNOP($AllIds_KPI_aktif_salatiga,$value_KPI_aktif_target_salatiga,$value_KPI_active_aktif_salatiga,$value_KPI_aktif_salatiga,$monthList_KPI_aktif_salatiga,'salatiga','kpi_activity');

        return view('portal.Chart_NOP_KPIA', [
            "root" => "kpia",
            "title" => "Chart KPI Activity",
            "site_all" => siteprofile::all(),

            "value_KPI_activity_target" => $value_KPI_activity_target,
            "value_KPI_active_activity" => $value_KPI_active_activity,
            "value_KPI_activity" => $value_KPI_activity,
            "monthList_KPI_activity" => $monthList_KPI_activity,

            "value_KPI_aktif_target_semarang" => $value_KPI_aktif_target_semarang,
            "value_KPI_active_aktif_semarang" => $value_KPI_active_aktif_semarang,
            "value_KPI_aktif_semarang" => $value_KPI_aktif_semarang,
            "monthList_KPI_aktif_semarang" => $monthList_KPI_aktif_semarang,

            "value_KPI_aktif_target_surakarta" => $value_KPI_aktif_target_surakarta,
            "value_KPI_active_aktif_surakarta" => $value_KPI_active_aktif_surakarta,
            "value_KPI_aktif_surakarta" => $value_KPI_aktif_surakarta,
            "monthList_KPI_aktif_surakarta" => $monthList_KPI_aktif_surakarta,

            "value_KPI_aktif_target_yogyakarta" => $value_KPI_aktif_target_yogyakarta,
            "value_KPI_active_aktif_yogyakarta" => $value_KPI_active_aktif_yogyakarta,
            "value_KPI_aktif_yogyakarta" => $value_KPI_aktif_yogyakarta,
            "monthList_KPI_aktif_yogyakarta" => $monthList_KPI_aktif_yogyakarta,

            "value_KPI_aktif_target_purwokerto" => $value_KPI_aktif_target_purwokerto,
            "value_KPI_active_aktif_purwokerto" => $value_KPI_active_aktif_purwokerto,
            "value_KPI_aktif_purwokerto" => $value_KPI_aktif_purwokerto,
            "monthList_KPI_aktif_purwokerto" => $monthList_KPI_aktif_purwokerto,

            "value_KPI_aktif_target_pekalongan" => $value_KPI_aktif_target_pekalongan,
            "value_KPI_active_aktif_pekalongan" => $value_KPI_active_aktif_pekalongan,
            "value_KPI_aktif_pekalongan" => $value_KPI_aktif_pekalongan,
            "monthList_KPI_aktif_pekalongan" => $monthList_KPI_aktif_pekalongan,

            "value_KPI_aktif_target_salatiga" => $value_KPI_aktif_target_salatiga,
            "value_KPI_active_aktif_salatiga" => $value_KPI_active_aktif_salatiga,
            "value_KPI_aktif_salatiga" => $value_KPI_aktif_salatiga,
            "monthList_KPI_aktif_salatiga" => $monthList_KPI_aktif_salatiga,
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

         /* ==================================== LOGIC KPI UTAMA NOP SEMARANG =========================================================== */

         $AllIds_KPI_utama_semarang = KPI_utama::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_semarang = array();
         $value_KPI_active_utama_semarang = array();
         $value_KPI_utama_semarang = array();
         $monthList_KPI_utama_semarang = array();
         $this->KPISNOP($AllIds_KPI_utama_semarang,$value_KPI_utama_target_semarang,$value_KPI_active_utama_semarang,$value_KPI_utama_semarang,$monthList_KPI_utama_semarang,'semarang','kpi_utama');
         
 
         /* ==================================== LOGIC KPI utama NOP SURAKARTA =========================================================== */
 
         $AllIds_KPI_utama_surakarta = KPI_utama::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_surakarta = array();
         $value_KPI_active_utama_surakarta = array();
         $value_KPI_utama_surakarta = array();
         $monthList_KPI_utama_surakarta = array();
         $this->KPISNOP($AllIds_KPI_utama_surakarta,$value_KPI_utama_target_surakarta,$value_KPI_active_utama_surakarta,$value_KPI_utama_surakarta,$monthList_KPI_utama_surakarta,'surakarta','kpi_utama');
 
         /* ==================================== LOGIC KPI utama NOP YOGYAKARTA =========================================================== */
 
         $AllIds_KPI_utama_yogyakarta = KPI_utama::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_yogyakarta = array();
         $value_KPI_active_utama_yogyakarta = array();
         $value_KPI_utama_yogyakarta = array();
         $monthList_KPI_utama_yogyakarta = array();
         $this->KPISNOP($AllIds_KPI_utama_yogyakarta,$value_KPI_utama_target_yogyakarta,$value_KPI_active_utama_yogyakarta,$value_KPI_utama_yogyakarta,$monthList_KPI_utama_yogyakarta,'yogyakarta','kpi_utama');
 
         /* ==================================== LOGIC KPI utama NOP PURWOKERTO =========================================================== */
 
         $AllIds_KPI_utama_purwokerto = KPI_utama::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_purwokerto = array();
         $value_KPI_active_utama_purwokerto = array();
         $value_KPI_utama_purwokerto = array();
         $monthList_KPI_utama_purwokerto = array();
         $this->KPISNOP($AllIds_KPI_utama_purwokerto,$value_KPI_utama_target_purwokerto,$value_KPI_active_utama_purwokerto,$value_KPI_utama_purwokerto,$monthList_KPI_utama_purwokerto,'purwokerto','kpi_utama');
 
         /* ==================================== LOGIC KPI utama NOP PEKALONGAN =========================================================== */
 
         $AllIds_KPI_utama_pekalongan = KPI_utama::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_pekalongan = array();
         $value_KPI_active_utama_pekalongan = array();
         $value_KPI_utama_pekalongan = array();
         $monthList_KPI_utama_pekalongan = array();
         $this->KPISNOP($AllIds_KPI_utama_pekalongan,$value_KPI_utama_target_pekalongan,$value_KPI_active_utama_pekalongan,$value_KPI_utama_pekalongan,$monthList_KPI_utama_pekalongan,'pekalongan','kpi_utama');
 
         /* ==================================== LOGIC KPI utama NOP SALATIGA =========================================================== */
 
         $AllIds_KPI_utama_salatiga = KPI_utama::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
         $value_KPI_utama_target_salatiga = array();
         $value_KPI_active_utama_salatiga = array();
         $value_KPI_utama_salatiga = array();
         $monthList_KPI_utama_salatiga = array();
         $this->KPISNOP($AllIds_KPI_utama_salatiga,$value_KPI_utama_target_salatiga,$value_KPI_active_utama_salatiga,$value_KPI_utama_salatiga,$monthList_KPI_utama_salatiga,'salatiga','kpi_utama');

        return view('portal.Chart_NOP_KPIU', [
            "root" => "kpiu",
            "title" => "Chart KPI Utama",
            "site_all" => siteprofile::all(),

            "value_KPI_target" => $value_KPI_target,
            "value_KPI_active_utama" => $value_KPI_active_utama,
            "value_KPI_utama" => $value_KPI_utama,
            "monthList_KPI_Utama" => $monthList_KPI_Utama,

            "value_KPI_utama_target_semarang" => $value_KPI_utama_target_semarang,
            "value_KPI_active_utama_semarang" => $value_KPI_active_utama_semarang,
            "value_KPI_utama_semarang" => $value_KPI_utama_semarang,
            "monthList_KPI_utama_semarang" => $monthList_KPI_utama_semarang,

            "value_KPI_utama_target_surakarta" => $value_KPI_utama_target_surakarta,
            "value_KPI_active_utama_surakarta" => $value_KPI_active_utama_surakarta,
            "value_KPI_utama_surakarta" => $value_KPI_utama_surakarta,
            "monthList_KPI_utama_surakarta" => $monthList_KPI_utama_surakarta,

            "value_KPI_utama_target_yogyakarta" => $value_KPI_utama_target_yogyakarta,
            "value_KPI_active_utama_yogyakarta" => $value_KPI_active_utama_yogyakarta,
            "value_KPI_utama_yogyakarta" => $value_KPI_utama_yogyakarta,
            "monthList_KPI_utama_yogyakarta" => $monthList_KPI_utama_yogyakarta,

            "value_KPI_utama_target_purwokerto" => $value_KPI_utama_target_purwokerto,
            "value_KPI_active_utama_purwokerto" => $value_KPI_active_utama_purwokerto,
            "value_KPI_utama_purwokerto" => $value_KPI_utama_purwokerto,
            "monthList_KPI_utama_purwokerto" => $monthList_KPI_utama_purwokerto,

            "value_KPI_utama_target_pekalongan" => $value_KPI_utama_target_pekalongan,
            "value_KPI_active_utama_pekalongan" => $value_KPI_active_utama_pekalongan,
            "value_KPI_utama_pekalongan" => $value_KPI_utama_pekalongan,
            "monthList_KPI_utama_pekalongan" => $monthList_KPI_utama_pekalongan,

            "value_KPI_utama_target_salatiga" => $value_KPI_utama_target_salatiga,
            "value_KPI_active_utama_salatiga" => $value_KPI_active_utama_salatiga,
            "value_KPI_utama_salatiga" => $value_KPI_utama_salatiga,
            "monthList_KPI_utama_salatiga" => $monthList_KPI_utama_salatiga,
        ]);
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
        $this->KPISNOP($AllIds_KPI_support_semarang,$value_KPI_support_target_semarang,$value_KPI_active_support_semarang,$value_KPI_support_semarang,$monthList_KPI_support_semarang,'semarang','kpi_support');
        

        /* ==================================== LOGIC KPI SUPPORT NOP SURAKARTA =========================================================== */

        $AllIds_KPI_support_surakarta = KPI_support::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_surakarta = array();
        $value_KPI_active_support_surakarta = array();
        $value_KPI_support_surakarta = array();
        $monthList_KPI_support_surakarta = array();
        $this->KPISNOP($AllIds_KPI_support_surakarta,$value_KPI_support_target_surakarta,$value_KPI_active_support_surakarta,$value_KPI_support_surakarta,$monthList_KPI_support_surakarta,'surakarta','kpi_support');

        /* ==================================== LOGIC KPI SUPPORT NOP YOGYAKARTA =========================================================== */

        $AllIds_KPI_support_yogyakarta = KPI_support::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_yogyakarta = array();
        $value_KPI_active_support_yogyakarta = array();
        $value_KPI_support_yogyakarta = array();
        $monthList_KPI_support_yogyakarta = array();
        $this->KPISNOP($AllIds_KPI_support_yogyakarta,$value_KPI_support_target_yogyakarta,$value_KPI_active_support_yogyakarta,$value_KPI_support_yogyakarta,$monthList_KPI_support_yogyakarta,'yogyakarta','kpi_support');

        /* ==================================== LOGIC KPI SUPPORT NOP PURWOKERTO =========================================================== */

        $AllIds_KPI_support_purwokerto = KPI_support::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_purwokerto = array();
        $value_KPI_active_support_purwokerto = array();
        $value_KPI_support_purwokerto = array();
        $monthList_KPI_support_purwokerto = array();
        $this->KPISNOP($AllIds_KPI_support_purwokerto,$value_KPI_support_target_purwokerto,$value_KPI_active_support_purwokerto,$value_KPI_support_purwokerto,$monthList_KPI_support_purwokerto,'purwokerto','kpi_support');

        /* ==================================== LOGIC KPI SUPPORT NOP PEKALONGAN =========================================================== */

        $AllIds_KPI_support_pekalongan = KPI_support::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_pekalongan = array();
        $value_KPI_active_support_pekalongan = array();
        $value_KPI_support_pekalongan = array();
        $monthList_KPI_support_pekalongan = array();
        $this->KPISNOP($AllIds_KPI_support_pekalongan,$value_KPI_support_target_pekalongan,$value_KPI_active_support_pekalongan,$value_KPI_support_pekalongan,$monthList_KPI_support_pekalongan,'pekalongan','kpi_support');

        /* ==================================== LOGIC KPI SUPPORT NOP SALATIGA =========================================================== */

        $AllIds_KPI_support_salatiga = KPI_support::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_KPI_support_target_salatiga = array();
        $value_KPI_active_support_salatiga = array();
        $value_KPI_support_salatiga = array();
        $monthList_KPI_support_salatiga = array();
        $this->KPISNOP($AllIds_KPI_support_salatiga,$value_KPI_support_target_salatiga,$value_KPI_active_support_salatiga,$value_KPI_support_salatiga,$monthList_KPI_support_salatiga,'salatiga','kpi_support');


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
