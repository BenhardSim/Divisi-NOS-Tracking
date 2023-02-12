<?php

namespace App\Http\Controllers;

use App\Models\KPI_aktif;
use App\Models\KPI_Support;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\KPI_utama;
use App\Models\ReservedCost;
use App\Models\siteprofile;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* ==================================== LOGIC KPI UTAMA =========================================================== */

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


        /* ==================================== LOGIC KPI ACTIVITY =========================================================== */

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
        
        /* ==================================== LOGIC KPI SUPPORT =========================================================== */

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

        /* ==================================== LOGIC Reserved Var COST =========================================================== */

        // get All the data ordered by date
        $AllIds_ReservedCost = ReservedCost::orderBy('date')->get()->toArray(); 
        $monthList_ReservedCost = array();
        $value_RCOST_PS = array();
        $value_RCOST_RM = array();
        $size = sizeof($AllIds_ReservedCost);

        // kalau data pada database tidak kosong
        if(sizeof($AllIds_ReservedCost) !== 0){


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


        // dd($value_RCOST_PS);
        return view('portal.dashboard', [
            "site_all" => siteprofile::count(),
            "site_tp" => siteprofile::where("TOWERSTATUS", "Sewa TP")->count(),
            "site_telkom" => siteprofile::where("PEMILIKTOWER", "Telkom")->count(),
            "site_telkomsel" => siteprofile::where("PEMILIKTOWER", "Telkomsel")->count(),

            "value_KPI_target" => $value_KPI_target,
            "value_KPI_active_utama" => $value_KPI_active_utama,
            "value_KPI_utama" => $value_KPI_utama,
            "monthList_KPI_Utama" => $monthList_KPI_Utama,

            "value_KPI_activity_target" => $value_KPI_activity_target,
            "value_KPI_active_activity" => $value_KPI_active_activity,
            "value_KPI_activity" => $value_KPI_activity,
            "monthList_KPI_activity" => $monthList_KPI_activity,

            "value_KPI_support_target" => $value_KPI_support_target,
            "value_KPI_active_support" => $value_KPI_active_support,
            "value_KPI_support" => $value_KPI_support,
            "monthList_KPI_support" => $monthList_KPI_support,

            "monthList_ReservedCost" => $monthList_ReservedCost,
            "value_RCOST_PS" => $value_RCOST_PS,
            "value_RCOST_RM" => $value_RCOST_RM,


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
