<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BBM;
use App\Models\infraIrr;
use App\Models\RVC;
use App\Models\OPEX;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use App\Models\KPI_Support;
use App\Models\profit_loss;
use App\Models\siteprofile;
use App\Models\ReservedCost;
use App\Models\tren_irr;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\ToArray;

class DashboardController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // dd(KPI_utama::whereDate('date','<=','2022-1-1')->whereDate('date','>=','2020-1-1')->get()->toArray());
        // dd(KPI_utama::select('date')->get()->toArray());
        
        // $all_id = KPI_utama::whereBetween('date', [$interval_akhir_in, $interval_awal_in])->get()->toArray();

        // dd($all_id);

        /* ==================================== LOGIC KPI UTAMA =========================================================== */

        // $AllIds = KPI_utama::all()->toArray();
        // mengamvil data berurut berdasarkan tanggal masuk dan mengubah menjadi array
        $AllIds = KPI_utama::orderBy('date')->get()->toArray(); 
        $value_KPI_target = array();
        $value_KPI_active_utama = array();
        $value_KPI_utama = array();
        $monthList_KPI_Utama = array();

        $this->ChartFunction($AllIds,$monthList_KPI_Utama,'kpi_utama',$value_KPI_target,$value_KPI_active_utama,$value_KPI_utama);


        /* ==================================== LOGIC KPI ACTIVITY =========================================================== */
        
        $AllIds_KPI_activity = KPI_aktif::orderBy('date')->get()->toArray(); 
        $value_KPI_activity_target = array();
        $value_KPI_active_activity = array();
        $value_KPI_activity = array();
        $monthList_KPI_activity = array();

        $this->ChartFunction($AllIds_KPI_activity,$monthList_KPI_activity,'kpi_activity',$value_KPI_activity_target,$value_KPI_active_activity,$value_KPI_activity);

        
        /* ==================================== LOGIC KPI SUPPORT =========================================================== */

        $AllIds_KPI_support = KPI_support::orderBy('date')->get()->toArray(); 
        $value_KPI_support_target = array();
        $value_KPI_active_support = array();
        $value_KPI_support = array();
        $monthList_KPI_support = array();

        $this->ChartFunction($AllIds_KPI_support,$monthList_KPI_support,'kpi_support',$value_KPI_support_target,$value_KPI_active_support,$value_KPI_support);


        /* ==================================== LOGIC Reserved Var COST =========================================================== */

        // get All the data ordered by date
        $AllIds_ReservedCost = ReservedCost::orderBy('date')->get()->toArray(); 
        $monthList_ReservedCost = array();
        $value_RCOST_PS = array();
        $value_RCOST_RM = array();
        $size = sizeof($AllIds_ReservedCost);

        $this->ChartFunction($AllIds_ReservedCost,$monthList_ReservedCost,'var_cost',$value_RCOST_PS,$value_RCOST_RM);

        /* ==================================== LOGIC PROFIT LOSS =========================================================== */

        $AllIds_PL = profit_loss::orderBy('date')->get()->toArray(); 
        $value_PL_HP = array();
        $value_PL_LP = array();
        $value_PL_LOSS = array();
        $monthList_PL = array();
        $size = sizeof($AllIds_PL);

        $this->ChartFunction($AllIds_PL,$monthList_PL,'profit_loss',$value_PL_HP,$value_PL_LP,$value_PL_LOSS);

        /* ==================================== LOGIC REVENUE VS COST REGIONAL =========================================================== */

        $AllIds_RVC = RVC::orderBy('date')->get()->toArray(); 
        $value_RVC_rev = array();
        $value_RVC_cost = array();
        $monthList_RVC = array();

        $this->ChartFunction($AllIds_RVC,$monthList_RVC,'rvc',$value_RVC_rev,$value_RVC_cost);

        /* ==================================== LOGIC BBM REGIONAL =========================================================== */

        $AllIds_BBM = BBM::orderBy('date')->get()->toArray(); 
        $value_BBM_total = array();
        $value_BBM_RH = array();
        $value_BBM_BBM = array();
        $monthList_BBM = array();

        $this->ChartFunction($AllIds_BBM,$monthList_BBM,'bbm',$value_BBM_total,$value_BBM_RH,$value_BBM_BBM);

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
        
         /* ==================================== LOGIC INFRA IRR REGIONAL =========================================================== */

         $AllIds_IIRR = infraIrr::orderBy('date')->get()->ToArray();

         $b2s_infra = array_fill(0, 11, 0);
         $collo_tp_infra = array_fill(0, 11, 0);

         foreach($AllIds_IIRR as $data){
            for($i=0 ;$i<11;$i++){
                $conditions = 'condition_'.$i+1;
                if($data['owner'] === 'b2s'){
                    $b2s_infra[$i] = $data[$conditions];
                }else if($data['owner'] === 'collo_tp'){
                    $collo_tp_infra[$i] = $data[$conditions];
                }
            }
         }
       
        // dd($monthList_IRR);
        return view('portal.dashboard', [
            "site_all" => siteprofile::count(),
            "site_tp" => siteprofile::where('TOWERSTATUS', "Sewa TP")->count(),
            "site_telkom" => siteprofile::where('TOWERSTATUS', "Beli Telkom")->count(),
            "site_telkomsel" => siteprofile::where('TOWERSTATUS', "Beli Telkomsel")->count(),
            "site_reseller" => siteprofile::where('TOWERSTATUS', "Sewa Reseller")->count(),

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

            "monthList_PL" => $monthList_PL,
            "value_PL_LP" => $value_PL_LP,
            "value_PL_HP" => $value_PL_HP,
            "value_PL_LOSS" => $value_PL_LOSS,

            "monthList_RVC" => $monthList_RVC,
            "value_RVC_rev" => $value_RVC_rev,
            "value_RVC_cost" => $value_RVC_cost,

            "monthList_BBM" => $monthList_BBM,
            "value_BBM_total" => $value_BBM_total,
            "value_BBM_RH" => $value_BBM_RH,
            "value_BBM_BBM" => $value_BBM_BBM,

            "absorbtion" => $absorbtion,
            "accure" => $accure,
            "available" => $available,

            "b2s" => $b2s,
            "collo_tp" => $collo_tp,
            "target_irr_collo" => $target_irr_collo,
            "target_irr_b2s" => $target_irr_b2s,
            "komitmen_collo" => $komitmen_collo,
            "komitmen_b2s" => $komitmen_b2s,
            "monthList_IRR" => $monthList_IRR,


            "b2s_infra" => $b2s_infra,
            "collo_tp_infra" => $collo_tp_infra,


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
