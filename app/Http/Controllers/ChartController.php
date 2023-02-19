<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BBM;
use App\Models\OPEX;
use App\Models\tren_irr;
use App\Models\RVC;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use App\Models\KPI_Support;
use App\Models\profit_loss;
use App\Models\siteprofile;
use App\Models\ReservedCost;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    function ChartFunction($AllIds,&$month_list,$chart_type,&$val_x_1,&$val_x_2,&$val_x_3='empty'){
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
                    array_push($month_list,$date->format('Y-m'));
                    $check_month[$key] = 1;
                }
            }

            // inisial nilai value dengan panjang month list
            $val_x_1 = array_fill(0, sizeof($month_list), 0);
            $val_x_2 = array_fill(0, sizeof($month_list), 0);
            $val_x_3 = array_fill(0, sizeof($month_list), 0);
            
            // Convert the period to an array of dates
            // $monthList = $period->format('Y-m-d')->toArray();

            // dd($from.'-'.$to);
            // dd($month_list);
            foreach($AllIds as $AllId){
                $data_target =  $AllId;
                $month_target =  $AllId['date'];
                // Carbon::parse($month_target->format('Y-m-d'));
                $month_target =  date('Y-M', strtotime($month_target));
                // $month_target =  date('F', strtotime($strmonth->pluck('date')));

                // O(nx12)
                foreach($month_list as $key => $month){
                    $month =  date('Y-M', strtotime($month));
                    if($chart_type === 'kpi_utama'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['kpi_target'];
                            $val_x_2[$key] += $data_target['ach_kpi'];
                            $val_x_3[$key] += $data_target['kpi_utama'];
                        } 
                    }else if($chart_type === 'kpi_activity'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['kpi_target'];
                            $val_x_2[$key] += $data_target['ach_kpi'];
                            $val_x_3[$key] += $data_target['kpi_activity'];
                        }
                    }else if($chart_type === 'kpi_support'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['kpi_target'];
                            $val_x_2[$key] += $data_target['ach_kpi'];
                            $val_x_3[$key] += $data_target['kpi_support'];
                        }
                    }else if($chart_type === 'var_cost'){
                        if($month_target === $month && $data_target['type'] === 'PS'){
                            $val_x_1[$key] += $data_target['ticket_number'];
                        }else if($month_target === $month && $data_target['type'] === 'RM'){
                            $val_x_2[$key] += $data_target['ticket_number'];
                        }
                    }else if($chart_type === 'profit_loss'){
                        if($month_target === $month && $data_target['remark'] === 'high profit'){
                            $val_x_1[$key] += $data_target['revenue'];
                        }else if($month_target === $month && $data_target['remark'] === 'profit'){
                            $val_x_2[$key] += $data_target['revenue'];
                        }else if($month_target === $month && $data_target['remark'] === 'loss'){
                            $val_x_3[$key] += $data_target['revenue'];
                        }  
                    }else if($chart_type === 'rvc'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['revenue'];
                            $val_x_2[$key] += $data_target['cost'];
                        }
                    }else if($chart_type === 'bbm'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['harga_total'];
                            $val_x_2[$key] += $data_target['RH'];
                            $val_x_3[$key] += $data_target['bbm'];
                        }
                    }
                // array_push($monthList,$month_target);
            };

            // hanya mengambil 12 data terakhir
            if(sizeof($month_list) > 12){
                $size = sizeof($month_list);
                $val_x_1 = array_slice($val_x_1,$size-12,$size-1);
                $val_x_2 = array_slice($val_x_2,$size-12,$size-1);
                $val_x_3 = array_slice($val_x_3,$size-12,$size-1);
                $month_list = array_slice($month_list,$size-12,$size-1);
                
            }
        }
    }
    }

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

        /* ==================================== LOGIC BBM REGIONAL =========================================================== */

        $AllIds_BBM = BBM::orderBy('date')->get()->toArray(); 
        $value_BBM_total = array();
        $value_BBM_RH = array();
        $value_BBM_BBM = array();
        $monthList_BBM = array();

        $this->ChartFunction($AllIds_BBM,$monthList_BBM,'bbm',$value_BBM_total,$value_BBM_RH,$value_BBM_BBM);

        /* ==================================== LOGIC BBM NOP Semarang =========================================================== */

        $AllIds_BBM_semarang = BBM::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_semarang = array();
        $value_BBM_RH_semarang = array();
        $value_BBM_BBM_semarang = array();
        $monthList_BBM_semarang = array();

        $this->ChartFunction($AllIds_BBM_semarang,$monthList_BBM_semarang,'bbm',$value_BBM_total_semarang,$value_BBM_RH_semarang,$value_BBM_BBM_semarang);
        
        /* ==================================== LOGIC BBM NOP surakarta =========================================================== */

        $AllIds_BBM_surakarta = BBM::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_surakarta = array();
        $value_BBM_RH_surakarta = array();
        $value_BBM_BBM_surakarta = array();
        $monthList_BBM_surakarta = array();

        $this->ChartFunction($AllIds_BBM_surakarta,$monthList_BBM_surakarta,'bbm',$value_BBM_total_surakarta,$value_BBM_RH_surakarta,$value_BBM_BBM_surakarta);

        /* ==================================== LOGIC BBM NOP yogyakarta =========================================================== */

        $AllIds_BBM_yogyakarta = BBM::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_yogyakarta = array();
        $value_BBM_RH_yogyakarta = array();
        $value_BBM_BBM_yogyakarta = array();
        $monthList_BBM_yogyakarta = array();

        $this->ChartFunction($AllIds_BBM_yogyakarta,$monthList_BBM_yogyakarta,'bbm',$value_BBM_total_yogyakarta,$value_BBM_RH_yogyakarta,$value_BBM_BBM_yogyakarta);

        /* ==================================== LOGIC BBM NOP purwokerto =========================================================== */

        $AllIds_BBM_purwokerto = BBM::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_purwokerto = array();
        $value_BBM_RH_purwokerto = array();
        $value_BBM_BBM_purwokerto = array();
        $monthList_BBM_purwokerto = array();

        $this->ChartFunction($AllIds_BBM_purwokerto,$monthList_BBM_purwokerto,'bbm',$value_BBM_total_purwokerto,$value_BBM_RH_purwokerto,$value_BBM_BBM_purwokerto);

        /* ==================================== LOGIC BBM NOP pekalongan =========================================================== */

        $AllIds_BBM_pekalongan = BBM::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_pekalongan = array();
        $value_BBM_RH_pekalongan = array();
        $value_BBM_BBM_pekalongan = array();
        $monthList_BBM_pekalongan = array();

        $this->ChartFunction($AllIds_BBM_pekalongan,$monthList_BBM_pekalongan,'bbm',$value_BBM_total_pekalongan,$value_BBM_RH_pekalongan,$value_BBM_BBM_pekalongan);

        /* ==================================== LOGIC BBM NOP salatiga =========================================================== */

        $AllIds_BBM_salatiga = BBM::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_BBM_total_salatiga = array();
        $value_BBM_RH_salatiga = array();
        $value_BBM_BBM_salatiga = array();
        $monthList_BBM_salatiga = array();

        $this->ChartFunction($AllIds_BBM_salatiga,$monthList_BBM_salatiga,'bbm',$value_BBM_total_salatiga,$value_BBM_RH_salatiga,$value_BBM_BBM_salatiga);

        return view('portal.Chart_NOP_BBM', [
            "root" => "bbm",
            "title" => "Chart Cost BBM NOP",
            "site_all" => siteprofile::all(),

            "monthList_BBM" => $monthList_BBM,
            "value_BBM_total" => $value_BBM_total,
            "value_BBM_RH" => $value_BBM_RH,
            "value_BBM_BBM" => $value_BBM_BBM,
            
            "monthList_BBM_semarang" => $monthList_BBM_semarang,
            "value_BBM_total_semarang" => $value_BBM_total_semarang,
            "value_BBM_RH_semarang" => $value_BBM_RH_semarang,
            "value_BBM_BBM_semarang" => $value_BBM_BBM_semarang,

            "monthList_BBM_surakarta" => $monthList_BBM_surakarta,
            "value_BBM_total_surakarta" => $value_BBM_total_surakarta,
            "value_BBM_RH_surakarta" => $value_BBM_RH_surakarta,
            "value_BBM_BBM_surakarta" => $value_BBM_BBM_surakarta,

            "monthList_BBM_yogyakarta" => $monthList_BBM_yogyakarta,
            "value_BBM_total_yogyakarta" => $value_BBM_total_yogyakarta,
            "value_BBM_RH_yogyakarta" => $value_BBM_RH_yogyakarta,
            "value_BBM_BBM_yogyakarta" => $value_BBM_BBM_yogyakarta,

            "monthList_BBM_purwokerto" => $monthList_BBM_purwokerto,
            "value_BBM_total_purwokerto" => $value_BBM_total_purwokerto,
            "value_BBM_RH_purwokerto" => $value_BBM_RH_purwokerto,
            "value_BBM_BBM_purwokerto" => $value_BBM_BBM_purwokerto,

            "monthList_BBM_pekalongan" => $monthList_BBM_pekalongan,
            "value_BBM_total_pekalongan" => $value_BBM_total_pekalongan,
            "value_BBM_RH_pekalongan" => $value_BBM_RH_pekalongan,
            "value_BBM_BBM_pekalongan" => $value_BBM_BBM_pekalongan,

            "monthList_BBM_salatiga" => $monthList_BBM_salatiga,
            "value_BBM_total_salatiga" => $value_BBM_total_salatiga,
            "value_BBM_RH_salatiga" => $value_BBM_RH_salatiga,
            "value_BBM_BBM_salatiga" => $value_BBM_BBM_salatiga,


        ]);
    }
    public function indexOPEX(){

        /* ==================================== LOGIC OPEX REGIONAL =========================================================== */

        $AllIds_OPEX = OPEX::get()->toArray();
        $absorbtion = 0;
        $accure = 0;
        $available = 0;
        foreach($AllIds_OPEX as $data){
            $absorbtion += $data['absorption'];
            $accure += $data['accure'];
            $available += $data['available'];
        }
        
        $total = $absorbtion + $accure + $absorbtion;

        /* ==================================== LOGIC OPEX NOP SEMARANG =========================================================== */

        $AllIds_OPEX_semarang = OPEX::where('NOP','semarang')->get()->toArray();
        $absorbtion_semarang = 0;
        $accure_semarang = 0;
        $available_semarang = 0;
        foreach($AllIds_OPEX_semarang as $data){
            $absorbtion_semarang += $data['absorption'];
            $accure_semarang += $data['accure'];
            $available_semarang += $data['available'];
        }
        
        $total = $absorbtion_semarang + $accure_semarang + $absorbtion_semarang;

        /* ==================================== LOGIC OPEX NOP surakarta =========================================================== */

        $AllIds_OPEX_surakarta = OPEX::where('NOP','surakarta')->get()->toArray();
        $absorbtion_surakarta = 0;
        $accure_surakarta = 0;
        $available_surakarta = 0;
        foreach($AllIds_OPEX_surakarta as $data){
            $absorbtion_surakarta += $data['absorption'];
            $accure_surakarta += $data['accure'];
            $available_surakarta += $data['available'];
        }
        
        $total = $absorbtion_surakarta + $accure_surakarta + $absorbtion_surakarta;

        /* ==================================== LOGIC OPEX NOP yogyakarta =========================================================== */

        $AllIds_OPEX_yogyakarta = OPEX::where('NOP','yogyakarta')->get()->toArray();
        $absorbtion_yogyakarta = 0;
        $accure_yogyakarta = 0;
        $available_yogyakarta = 0;
        foreach($AllIds_OPEX_yogyakarta as $data){
            $absorbtion_yogyakarta += $data['absorption'];
            $accure_yogyakarta += $data['accure'];
            $available_yogyakarta += $data['available'];
        }
        
        $total = $absorbtion_yogyakarta + $accure_yogyakarta + $absorbtion_yogyakarta;

        /* ==================================== LOGIC OPEX NOP purwokerto =========================================================== */

        $AllIds_OPEX_purwokerto = OPEX::where('NOP','purwokerto')->get()->toArray();
        $absorbtion_purwokerto = 0;
        $accure_purwokerto = 0;
        $available_purwokerto = 0;
        foreach($AllIds_OPEX_purwokerto as $data){
            $absorbtion_purwokerto += $data['absorption'];
            $accure_purwokerto += $data['accure'];
            $available_purwokerto += $data['available'];
        }
        
        $total = $absorbtion_purwokerto + $accure_purwokerto + $absorbtion_purwokerto;

        /* ==================================== LOGIC OPEX NOP pekalongan =========================================================== */

        $AllIds_OPEX_pekalongan = OPEX::where('NOP','pekalongan')->get()->toArray();
        $absorbtion_pekalongan = 0;
        $accure_pekalongan = 0;
        $available_pekalongan = 0;
        foreach($AllIds_OPEX_pekalongan as $data){
            $absorbtion_pekalongan += $data['absorption'];
            $accure_pekalongan += $data['accure'];
            $available_pekalongan += $data['available'];
        }
        
        $total = $absorbtion_pekalongan + $accure_pekalongan + $absorbtion_pekalongan;

        /* ==================================== LOGIC OPEX NOP salatiga =========================================================== */

        $AllIds_OPEX_salatiga = OPEX::where('NOP','salatiga')->get()->toArray();
        $absorbtion_salatiga = 0;
        $accure_salatiga = 0;
        $available_salatiga = 0;
        foreach($AllIds_OPEX_salatiga as $data){
            $absorbtion_salatiga += $data['absorption'];
            $accure_salatiga += $data['accure'];
            $available_salatiga += $data['available'];
        }
        
        $total = $absorbtion_salatiga + $accure_salatiga + $absorbtion_salatiga;
        
        return view('portal.Chart_NOP_OPEX', [
            "root" => "opex",
            "title" => "Chart OPEX NOP",
            "site_all" => siteprofile::all(),

            "absorbtion" => $absorbtion,
            "accure" => $accure,
            "available" => $available,

            "absorbtion_semarang" => $absorbtion_semarang,
            "accure_semarang" => $accure_semarang,
            "available_semarang" => $available_semarang,

            "absorbtion_surakarta" => $absorbtion_surakarta,
            "accure_surakarta" => $accure_surakarta,
            "available_surakarta" => $available_surakarta,

            "absorbtion_yogyakarta" => $absorbtion_yogyakarta,
            "accure_yogyakarta" => $accure_yogyakarta,
            "available_yogyakarta" => $available_yogyakarta,

            "absorbtion_purwokerto" => $absorbtion_purwokerto,
            "accure_purwokerto" => $accure_purwokerto,
            "available_purwokerto" => $available_purwokerto,

            "absorbtion_pekalongan" => $absorbtion_pekalongan,
            "accure_pekalongan" => $accure_pekalongan,
            "available_pekalongan" => $available_pekalongan,

            "absorbtion_salatiga" => $absorbtion_salatiga,
            "accure_salatiga" => $accure_salatiga,
            "available_salatiga" => $available_salatiga,
        ]);
    }


    public function indexRVC(){

        /* ==================================== LOGIC REVENUE VS COST REGIONAL =========================================================== */

        $AllIds_RVC = RVC::orderBy('date')->get()->toArray(); 
        $value_RVC_rev = array();
        $value_RVC_cost = array();
        $monthList_RVC = array();

        $this->ChartFunction($AllIds_RVC,$monthList_RVC,'rvc',$value_RVC_rev,$value_RVC_cost);

        /* ==================================== LOGIC REVENUE VS COST SEMARANG =========================================================== */

        $AllIds_RVC_semarang = RVC::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_semarang = array();
        $value_RVC_cost_semarang = array();
        $monthList_RVC_semarang = array();

        $this->ChartFunction($AllIds_RVC_semarang,$monthList_RVC_semarang,'rvc',$value_RVC_rev_semarang,$value_RVC_cost_semarang);

        /* ==================================== LOGIC REVENUE VS COST surakarta =========================================================== */

        $AllIds_RVC_surakarta = RVC::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_surakarta = array();
        $value_RVC_cost_surakarta = array();
        $monthList_RVC_surakarta = array();

        $this->ChartFunction($AllIds_RVC_surakarta,$monthList_RVC_surakarta,'rvc',$value_RVC_rev_surakarta,$value_RVC_cost_surakarta);

        /* ==================================== LOGIC REVENUE VS COST yogyakarta =========================================================== */

        $AllIds_RVC_yogyakarta = RVC::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_yogyakarta = array();
        $value_RVC_cost_yogyakarta = array();
        $monthList_RVC_yogyakarta = array();

        $this->ChartFunction($AllIds_RVC_yogyakarta,$monthList_RVC_yogyakarta,'rvc',$value_RVC_rev_yogyakarta,$value_RVC_cost_yogyakarta);

        /* ==================================== LOGIC REVENUE VS COST purwokerto =========================================================== */

        $AllIds_RVC_purwokerto = RVC::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_purwokerto = array();
        $value_RVC_cost_purwokerto = array();
        $monthList_RVC_purwokerto = array();

        $this->ChartFunction($AllIds_RVC_purwokerto,$monthList_RVC_purwokerto,'rvc',$value_RVC_rev_purwokerto,$value_RVC_cost_purwokerto);

        /* ==================================== LOGIC REVENUE VS COST pekalongan =========================================================== */

        $AllIds_RVC_pekalongan = RVC::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_pekalongan = array();
        $value_RVC_cost_pekalongan = array();
        $monthList_RVC_pekalongan = array();

        $this->ChartFunction($AllIds_RVC_pekalongan,$monthList_RVC_pekalongan,'rvc',$value_RVC_rev_pekalongan,$value_RVC_cost_pekalongan);
        
        /* ==================================== LOGIC REVENUE VS COST salatiga =========================================================== */

        $AllIds_RVC_salatiga = RVC::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_RVC_rev_salatiga = array();
        $value_RVC_cost_salatiga = array();
        $monthList_RVC_salatiga = array();

        $this->ChartFunction($AllIds_RVC_salatiga,$monthList_RVC_salatiga,'rvc',$value_RVC_rev_salatiga,$value_RVC_cost_salatiga);

        


        return view('portal.Chart_NOP_RVC', [
            "root" => "rvc",
            "title" => "Chart Revenue VS Cost NOP",
            "site_all" => siteprofile::all(),

            "monthList_RVC" => $monthList_RVC,
            "value_RVC_rev" => $value_RVC_rev,
            "value_RVC_cost" => $value_RVC_cost,

            "monthList_RVC_semarang" => $monthList_RVC_semarang,
            "value_RVC_rev_semarang" => $value_RVC_rev_semarang,
            "value_RVC_cost_semarang" => $value_RVC_cost_semarang,

            "monthList_RVC_surakarta" => $monthList_RVC_surakarta,
            "value_RVC_rev_surakarta" => $value_RVC_rev_surakarta,
            "value_RVC_cost_surakarta" => $value_RVC_cost_surakarta,

            "monthList_RVC_yogyakarta" => $monthList_RVC_yogyakarta,
            "value_RVC_rev_yogyakarta" => $value_RVC_rev_yogyakarta,
            "value_RVC_cost_yogyakarta" => $value_RVC_cost_yogyakarta,

            "monthList_RVC_purwokerto" => $monthList_RVC_purwokerto,
            "value_RVC_rev_purwokerto" => $value_RVC_rev_purwokerto,
            "value_RVC_cost_purwokerto" => $value_RVC_cost_purwokerto,

            "monthList_RVC_pekalongan" => $monthList_RVC_pekalongan,
            "value_RVC_rev_pekalongan" => $value_RVC_rev_pekalongan,
            "value_RVC_cost_pekalongan" => $value_RVC_cost_pekalongan,

            "monthList_RVC_salatiga" => $monthList_RVC_salatiga,
            "value_RVC_rev_salatiga" => $value_RVC_rev_salatiga,
            "value_RVC_cost_salatiga" => $value_RVC_cost_salatiga,
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

        //* ==================================== LOGIC Reserved Var COST regional =========================================================== */

        $AllIds_PL = profit_loss::orderBy('date')->get()->toArray(); 
        $value_PL_HP = array();
        $value_PL_LP = array();
        $value_PL_LOSS = array();
        $monthList_PL = array();
        $size = sizeof($AllIds_PL);

        $this->ChartFunction($AllIds_PL,$monthList_PL,'profit_loss',$value_PL_HP,$value_PL_LP,$value_PL_LOSS);

        //* ==================================== LOGIC Reserved Var COST NOP Semarang =========================================================== */

        $AllIds_PL_semarang = profit_loss::where('NOP','semarang')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_semarang = array();
        $value_PL_LP_semarang = array();
        $value_PL_LOSS_semarang = array();
        $monthList_PL_semarang = array();
        $size = sizeof($AllIds_PL_semarang);

        $this->ChartFunction($AllIds_PL_semarang,$monthList_PL_semarang,'profit_loss',$value_PL_HP_semarang,$value_PL_LP_semarang,$value_PL_LOSS_semarang);

        //* ==================================== LOGIC Reserved Var COST NOP surakarta =========================================================== */

        $AllIds_PL_surakarta = profit_loss::where('NOP','surakarta')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_surakarta = array();
        $value_PL_LP_surakarta = array();
        $value_PL_LOSS_surakarta = array();
        $monthList_PL_surakarta = array();
        $size = sizeof($AllIds_PL_surakarta);

        $this->ChartFunction($AllIds_PL_surakarta,$monthList_PL_surakarta,'profit_loss',$value_PL_HP_surakarta,$value_PL_LP_surakarta,$value_PL_LOSS_surakarta);

        //* ==================================== LOGIC Reserved Var COST NOP yogyakarta =========================================================== */

        $AllIds_PL_yogyakarta = profit_loss::where('NOP','yogyakarta')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_yogyakarta = array();
        $value_PL_LP_yogyakarta = array();
        $value_PL_LOSS_yogyakarta = array();
        $monthList_PL_yogyakarta = array();
        $size = sizeof($AllIds_PL_yogyakarta);

        $this->ChartFunction($AllIds_PL_yogyakarta,$monthList_PL_yogyakarta,'profit_loss',$value_PL_HP_yogyakarta,$value_PL_LP_yogyakarta,$value_PL_LOSS_yogyakarta);

        //* ==================================== LOGIC Reserved Var COST NOP purwokerto =========================================================== */

        $AllIds_PL_purwokerto = profit_loss::where('NOP','purwokerto')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_purwokerto = array();
        $value_PL_LP_purwokerto = array();
        $value_PL_LOSS_purwokerto = array();
        $monthList_PL_purwokerto = array();
        $size = sizeof($AllIds_PL_purwokerto);

        $this->ChartFunction($AllIds_PL_purwokerto,$monthList_PL_purwokerto,'profit_loss',$value_PL_HP_purwokerto,$value_PL_LP_purwokerto,$value_PL_LOSS_purwokerto);

        //* ==================================== LOGIC Reserved Var COST NOP pekalongan =========================================================== */

        $AllIds_PL_pekalongan = profit_loss::where('NOP','pekalongan')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_pekalongan = array();
        $value_PL_LP_pekalongan = array();
        $value_PL_LOSS_pekalongan = array();
        $monthList_PL_pekalongan = array();
        $size = sizeof($AllIds_PL_pekalongan);

        $this->ChartFunction($AllIds_PL_pekalongan,$monthList_PL_pekalongan,'profit_loss',$value_PL_HP_pekalongan,$value_PL_LP_pekalongan,$value_PL_LOSS_pekalongan);

        //* ==================================== LOGIC Reserved Var COST NOP salatiga =========================================================== */

        $AllIds_PL_salatiga = profit_loss::where('NOP','salatiga')->orderBy('date')->get()->toArray(); 
        $value_PL_HP_salatiga = array();
        $value_PL_LP_salatiga = array();
        $value_PL_LOSS_salatiga = array();
        $monthList_PL_salatiga = array();
        $size = sizeof($AllIds_PL_salatiga);

        $this->ChartFunction($AllIds_PL_salatiga,$monthList_PL_salatiga,'profit_loss',$value_PL_HP_salatiga,$value_PL_LP_salatiga,$value_PL_LOSS_salatiga);

        return view('portal.Chart_NOP_PL', [
            "root" => "pl",
            "title" => "Chart Profit Loss NOP",
            "site_all" => siteprofile::all(),

            "monthList_PL" => $monthList_PL,
            "value_PL_LP" => $value_PL_LP,
            "value_PL_HP" => $value_PL_HP,
            "value_PL_LOSS" => $value_PL_LOSS,

            "monthList_PL_semarang" => $monthList_PL_semarang,
            "value_PL_LP_semarang" => $value_PL_LP_semarang,
            "value_PL_HP_semarang" => $value_PL_HP_semarang,
            "value_PL_LOSS_semarang" => $value_PL_LOSS_semarang,

            "monthList_PL_surakarta" => $monthList_PL_surakarta,
            "value_PL_LP_surakarta" => $value_PL_LP_surakarta,
            "value_PL_HP_surakarta" => $value_PL_HP_surakarta,
            "value_PL_LOSS_surakarta" => $value_PL_LOSS_surakarta,

            "monthList_PL_yogyakarta" => $monthList_PL_yogyakarta,
            "value_PL_LP_yogyakarta" => $value_PL_LP_yogyakarta,
            "value_PL_HP_yogyakarta" => $value_PL_HP_yogyakarta,
            "value_PL_LOSS_yogyakarta" => $value_PL_LOSS_yogyakarta,

            "monthList_PL_purwokerto" => $monthList_PL_purwokerto,
            "value_PL_LP_purwokerto" => $value_PL_LP_purwokerto,
            "value_PL_HP_purwokerto" => $value_PL_HP_purwokerto,
            "value_PL_LOSS_purwokerto" => $value_PL_LOSS_purwokerto,

            "monthList_PL_pekalongan" => $monthList_PL_pekalongan,
            "value_PL_LP_pekalongan" => $value_PL_LP_pekalongan,
            "value_PL_HP_pekalongan" => $value_PL_HP_pekalongan,
            "value_PL_LOSS_pekalongan" => $value_PL_LOSS_pekalongan,

            "monthList_PL_salatiga" => $monthList_PL_salatiga,
            "value_PL_LP_salatiga" => $value_PL_LP_salatiga,
            "value_PL_HP_salatiga" => $value_PL_HP_salatiga,
            "value_PL_LOSS_salatiga" => $value_PL_LOSS_salatiga,
        ]);
    }


    public function indexTIRR(){

         /* ==================================== LOGIC TREN IRR REGIONAL =========================================================== */
         
         $AllIds_IRR = tren_irr::orderBy('periode')->get()->ToArray();
         $size = 0;
         if(sizeof($AllIds_IRR) !== 0){
             $size = $AllIds_IRR[sizeof($AllIds_IRR)-1]['periode'] - $AllIds_IRR[0]['periode'] + 1;
         }
             $b2s = array_fill(0, $size, 0);
             $collo_tp = array_fill(0, $size, 0);
             $target_irr_collo = array_fill(0, $size, 0);
             $target_irr_b2s = array_fill(0, $size, 0);
             $komitmen_collo = array_fill(0, $size, 0);
             $komitmen_b2s = array_fill(0, $size, 0);
             $monthList_IRR = array_fill(0, $size, 0);
 
             foreach($AllIds_IRR as $key => $data){
                 $b2s[$key] = $data['b2s'];
                 $collo_tp[$key] = $data['collo_tp'];
                 $target_irr_collo[$key] = $data['target_irr_collo'];
                 $target_irr_b2s[$key] = $data['target_irr_b2s'];
                 $komitmen_collo[$key] = $data['komitmen_collo'];
                 $komitmen_b2s[$key] = $data['komitmen_b2s'];
                 $monthList_IRR[$key] = 'M'.($key+1);
     
         
        }

        /* ==================================== LOGIC TREN IRR NOP semarang =========================================================== */

         $AllIds_IRR_semarang = tren_irr::where('NOP','semarang')->orderBy('periode')->get()->ToArray();
         $size_semarang = 0;
         if(sizeof($AllIds_IRR_semarang) !== 0){
             $size_semarang = $AllIds_IRR_semarang[sizeof($AllIds_IRR_semarang)-1]['periode'] - $AllIds_IRR_semarang[0]['periode'] + 1;
         }
             $b2s_semarang = array_fill(0, $size_semarang, 0);
             $collo_tp_semarang = array_fill(0, $size_semarang, 0);
             $target_irr_collo_semarang = array_fill(0, $size_semarang, 0);
             $target_irr_b2s_semarang = array_fill(0, $size_semarang, 0);
             $komitmen_collo_semarang = array_fill(0, $size_semarang, 0);
             $komitmen_b2s_semarang = array_fill(0, $size_semarang, 0);
             $monthList_IRR_semarang = array_fill(0, $size_semarang, 0);
 
             foreach($AllIds_IRR_semarang as $key => $data){
                 $b2s_semarang[$key] = $data['b2s'];
                 $collo_tp_semarang[$key] = $data['collo_tp'];
                 $target_irr_collo_semarang[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_semarang[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_semarang[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_semarang[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_semarang[$key] = 'M'.($key+1);
     
         
         }

         /* ==================================== LOGIC TREN IRR NOP surakarta =========================================================== */

         $AllIds_IRR_surakarta = tren_irr::where('NOP','surakarta')->orderBy('periode')->get()->ToArray();
         $size_surakarta = 0;
         if(sizeof($AllIds_IRR_surakarta) !== 0){
             $size_surakarta = $AllIds_IRR_surakarta[sizeof($AllIds_IRR_surakarta)-1]['periode'] - $AllIds_IRR_surakarta[0]['periode'] + 1;
         }
             $b2s_surakarta = array_fill(0, $size_surakarta, 0);
             $collo_tp_surakarta = array_fill(0, $size_surakarta, 0);
             $target_irr_collo_surakarta = array_fill(0, $size_surakarta, 0);
             $target_irr_b2s_surakarta = array_fill(0, $size_surakarta, 0);
             $komitmen_collo_surakarta = array_fill(0, $size_surakarta, 0);
             $komitmen_b2s_surakarta = array_fill(0, $size_surakarta, 0);
             $monthList_IRR_surakarta = array_fill(0, $size_surakarta, 0);
 
             foreach($AllIds_IRR_surakarta as $key => $data){
                 $b2s_surakarta[$key] = $data['b2s'];
                 $collo_tp_surakarta[$key] = $data['collo_tp'];
                 $target_irr_collo_surakarta[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_surakarta[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_surakarta[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_surakarta[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_surakarta[$key] = 'M'.($key+1);
     
         
         }

         /* ==================================== LOGIC TREN IRR NOP yogyakarta =========================================================== */

         $AllIds_IRR_yogyakarta = tren_irr::where('NOP','yogyakarta')->orderBy('periode')->get()->ToArray();
         $size_yogyakarta = 0;
         if(sizeof($AllIds_IRR_yogyakarta) !== 0){
             $size_yogyakarta = $AllIds_IRR_yogyakarta[sizeof($AllIds_IRR_yogyakarta)-1]['periode'] - $AllIds_IRR_yogyakarta[0]['periode'] + 1;
         }
             $b2s_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $collo_tp_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $target_irr_collo_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $target_irr_b2s_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $komitmen_collo_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $komitmen_b2s_yogyakarta = array_fill(0, $size_yogyakarta, 0);
             $monthList_IRR_yogyakarta = array_fill(0, $size_yogyakarta, 0);
 
             foreach($AllIds_IRR_yogyakarta as $key => $data){
                 $b2s_yogyakarta[$key] = $data['b2s'];
                 $collo_tp_yogyakarta[$key] = $data['collo_tp'];
                 $target_irr_collo_yogyakarta[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_yogyakarta[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_yogyakarta[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_yogyakarta[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_yogyakarta[$key] = 'M'.($key+1);
     
         
         }

         /* ==================================== LOGIC TREN IRR NOP purwokerto =========================================================== */

         $AllIds_IRR_purwokerto = tren_irr::where('NOP','purwokerto')->orderBy('periode')->get()->ToArray();
         $size_purwokerto = 0;
         if(sizeof($AllIds_IRR_purwokerto) !== 0){
             $size_purwokerto = $AllIds_IRR_purwokerto[sizeof($AllIds_IRR_purwokerto)-1]['periode'] - $AllIds_IRR_purwokerto[0]['periode'] + 1;
         }
             $b2s_purwokerto = array_fill(0, $size_purwokerto, 0);
             $collo_tp_purwokerto = array_fill(0, $size_purwokerto, 0);
             $target_irr_collo_purwokerto = array_fill(0, $size_purwokerto, 0);
             $target_irr_b2s_purwokerto = array_fill(0, $size_purwokerto, 0);
             $komitmen_collo_purwokerto = array_fill(0, $size_purwokerto, 0);
             $komitmen_b2s_purwokerto = array_fill(0, $size_purwokerto, 0);
             $monthList_IRR_purwokerto = array_fill(0, $size_purwokerto, 0);
 
             foreach($AllIds_IRR_purwokerto as $key => $data){
                 $b2s_purwokerto[$key] = $data['b2s'];
                 $collo_tp_purwokerto[$key] = $data['collo_tp'];
                 $target_irr_collo_purwokerto[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_purwokerto[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_purwokerto[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_purwokerto[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_purwokerto[$key] = 'M'.($key+1);
     
         
         }

         /* ==================================== LOGIC TREN IRR NOP pekalongan =========================================================== */

         $AllIds_IRR_pekalongan = tren_irr::where('NOP','pekalongan')->orderBy('periode')->get()->ToArray();
         $size_pekalongan = 0;
         if(sizeof($AllIds_IRR_pekalongan) !== 0){
             $size_pekalongan = $AllIds_IRR_pekalongan[sizeof($AllIds_IRR_pekalongan)-1]['periode'] - $AllIds_IRR_pekalongan[0]['periode'] + 1;
         }
             $b2s_pekalongan = array_fill(0, $size_pekalongan, 0);
             $collo_tp_pekalongan = array_fill(0, $size_pekalongan, 0);
             $target_irr_collo_pekalongan = array_fill(0, $size_pekalongan, 0);
             $target_irr_b2s_pekalongan = array_fill(0, $size_pekalongan, 0);
             $komitmen_collo_pekalongan = array_fill(0, $size_pekalongan, 0);
             $komitmen_b2s_pekalongan = array_fill(0, $size_pekalongan, 0);
             $monthList_IRR_pekalongan = array_fill(0, $size_pekalongan, 0);
 
             foreach($AllIds_IRR_pekalongan as $key => $data){
                 $b2s_pekalongan[$key] = $data['b2s'];
                 $collo_tp_pekalongan[$key] = $data['collo_tp'];
                 $target_irr_collo_pekalongan[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_pekalongan[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_pekalongan[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_pekalongan[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_pekalongan[$key] = 'M'.($key+1);
     
         
         }

         /* ==================================== LOGIC TREN IRR NOP salatiga =========================================================== */

         $AllIds_IRR_salatiga = tren_irr::where('NOP','salatiga')->orderBy('periode')->get()->ToArray();
         $size_salatiga = 0;
         if(sizeof($AllIds_IRR_salatiga) !== 0){
             $size_salatiga = $AllIds_IRR_salatiga[sizeof($AllIds_IRR_salatiga)-1]['periode'] - $AllIds_IRR_salatiga[0]['periode'] + 1;
         }
             $b2s_salatiga = array_fill(0, $size_salatiga, 0);
             $collo_tp_salatiga = array_fill(0, $size_salatiga, 0);
             $target_irr_collo_salatiga = array_fill(0, $size_salatiga, 0);
             $target_irr_b2s_salatiga = array_fill(0, $size_salatiga, 0);
             $komitmen_collo_salatiga = array_fill(0, $size_salatiga, 0);
             $komitmen_b2s_salatiga = array_fill(0, $size_salatiga, 0);
             $monthList_IRR_salatiga = array_fill(0, $size_salatiga, 0);
 
             foreach($AllIds_IRR_salatiga as $key => $data){
                 $b2s_salatiga[$key] = $data['b2s'];
                 $collo_tp_salatiga[$key] = $data['collo_tp'];
                 $target_irr_collo_salatiga[$key] = $data['target_irr_collo'];
                 $target_irr_b2s_salatiga[$key] = $data['target_irr_b2s'];
                 $komitmen_collo_salatiga[$key] = $data['komitmen_collo'];
                 $komitmen_b2s_salatiga[$key] = $data['komitmen_b2s'];
                 $monthList_IRR_salatiga[$key] = 'M'.($key+1);
         }



        return view('portal.Chart_NOP_TIRR', [
            "root" => "tirr",
            "title" => "Chart Tren IRR VS Revenue VS Komitmen NOP",
            "site_all" => siteprofile::all(),

            "b2s" => $b2s,
            "collo_tp" => $collo_tp,
            "target_irr_collo" => $target_irr_collo,
            "target_irr_b2s" => $target_irr_b2s,
            "komitmen_collo" => $komitmen_collo,
            "komitmen_b2s" => $komitmen_b2s,
            "monthList_IRR" => $monthList_IRR,

            "b2s_semarang" => $b2s_semarang,
            "collo_tp_semarang" => $collo_tp_semarang,
            "target_irr_collo_semarang" => $target_irr_collo_semarang,
            "target_irr_b2s_semarang" => $target_irr_b2s_semarang,
            "komitmen_collo_semarang" => $komitmen_collo_semarang,
            "komitmen_b2s_semarang" => $komitmen_b2s_semarang,
            "monthList_IRR_semarang" => $monthList_IRR_semarang,

            "b2s_surakarta" => $b2s_surakarta,
            "collo_tp_surakarta" => $collo_tp_surakarta,
            "target_irr_collo_surakarta" => $target_irr_collo_surakarta,
            "target_irr_b2s_surakarta" => $target_irr_b2s_surakarta,
            "komitmen_collo_surakarta" => $komitmen_collo_surakarta,
            "komitmen_b2s_surakarta" => $komitmen_b2s_surakarta,
            "monthList_IRR_surakarta" => $monthList_IRR_surakarta,

            "b2s_yogyakarta" => $b2s_yogyakarta,
            "collo_tp_yogyakarta" => $collo_tp_yogyakarta,
            "target_irr_collo_yogyakarta" => $target_irr_collo_yogyakarta,
            "target_irr_b2s_yogyakarta" => $target_irr_b2s_yogyakarta,
            "komitmen_collo_yogyakarta" => $komitmen_collo_yogyakarta,
            "komitmen_b2s_yogyakarta" => $komitmen_b2s_yogyakarta,
            "monthList_IRR_yogyakarta" => $monthList_IRR_yogyakarta,

            "b2s_purwokerto" => $b2s_purwokerto,
            "collo_tp_purwokerto" => $collo_tp_purwokerto,
            "target_irr_collo_purwokerto" => $target_irr_collo_purwokerto,
            "target_irr_b2s_purwokerto" => $target_irr_b2s_purwokerto,
            "komitmen_collo_purwokerto" => $komitmen_collo_purwokerto,
            "komitmen_b2s_purwokerto" => $komitmen_b2s_purwokerto,
            "monthList_IRR_purwokerto" => $monthList_IRR_purwokerto,

            "b2s_pekalongan" => $b2s_pekalongan,
            "collo_tp_pekalongan" => $collo_tp_pekalongan,
            "target_irr_collo_pekalongan" => $target_irr_collo_pekalongan,
            "target_irr_b2s_pekalongan" => $target_irr_b2s_pekalongan,
            "komitmen_collo_pekalongan" => $komitmen_collo_pekalongan,
            "komitmen_b2s_pekalongan" => $komitmen_b2s_pekalongan,
            "monthList_IRR_pekalongan" => $monthList_IRR_pekalongan,

            "b2s_salatiga" => $b2s_salatiga,
            "collo_tp_salatiga" => $collo_tp_salatiga,
            "target_irr_collo_salatiga" => $target_irr_collo_salatiga,
            "target_irr_b2s_salatiga" => $target_irr_b2s_salatiga,
            "komitmen_collo_salatiga" => $komitmen_collo_salatiga,
            "komitmen_b2s_salatiga" => $komitmen_b2s_salatiga,
            "monthList_IRR_salatiga" => $monthList_IRR_salatiga,

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
