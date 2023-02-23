<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BBM;
use App\Models\pln;
use App\Models\RVC;
use App\Models\opex;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use App\Models\KPI_Support;
use App\Models\profit_loss;
use App\Models\ReservedCost;

use Illuminate\Http\Request;
use App\Models\CostComponent;
use function PHPSTORM_META\type;

class FilterController extends Controller
{
    function ChartFunction($AllIds,&$month_list,$chart_type,&$val_x_1,&$val_x_2,&$val_x_3='empty',&$val_x_4='empty',&$val_x_5='empty',&$val_x_6='empty',&$val_x_7='empty',&$val_x_8='empty',&$val_x_9='empty',&$val_x_10='empty',&$val_x_11='empty',&$val_x_12='empty',&$val_x_13='empty',&$val_x_14='empty'){
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
            $val_x_4 = array_fill(0, sizeof($month_list), 0);
            $val_x_5 = array_fill(0, sizeof($month_list), 0);
            $val_x_6 = array_fill(0, sizeof($month_list), 0);
            $val_x_7 = array_fill(0, sizeof($month_list), 0);
            $val_x_8 = array_fill(0, sizeof($month_list), 0);
            $val_x_9 = array_fill(0, sizeof($month_list), 0);
            $val_x_10 = array_fill(0, sizeof($month_list), 0);
            $val_x_11 = array_fill(0, sizeof($month_list), 0);
            $val_x_12 = array_fill(0, sizeof($month_list), 0);
            $val_x_13 = array_fill(0, sizeof($month_list), 0);
            $val_x_14 = array_fill(0, sizeof($month_list), 0);
            
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
                    }else if($chart_type === 'var_cost' || $chart_type === 'var_cost_semarang' || $chart_type === 'var_cost_surakarta' || $chart_type === 'var_cost_yogyakarta' || $chart_type === 'var_cost_purwokerto' || $chart_type === 'var_cost_pekalongan' || $chart_type === 'var_cost_salatiga'){
                        if($month_target === $month && $data_target['type'] === 'PS'){
                            $val_x_1[$key] += $data_target['ticket_number'];
                        }else if($month_target === $month && $data_target['type'] === 'RM'){
                            $val_x_2[$key] += $data_target['ticket_number'];
                        }
                    }else if($chart_type === 'profit_loss' || $chart_type === 'profit_loss_semarang' || $chart_type === 'profit_loss_surakarta' || $chart_type === 'profit_loss_yogyakarta' || $chart_type === 'profit_loss_purwokerto' || $chart_type === 'profit_loss_pekalongan' || $chart_type === 'profit_loss_salatiga'){
                        if($month_target === $month && $data_target['remark'] === 'high profit'){
                            $val_x_1[$key] += $data_target['revenue'];
                        }else if($month_target === $month && $data_target['remark'] === 'profit'){
                            $val_x_2[$key] += $data_target['revenue'];
                        }else if($month_target === $month && $data_target['remark'] === 'loss'){
                            $val_x_3[$key] += $data_target['revenue'];
                        }  
                    }else if($chart_type === 'rvc' || substr($chart_type,0,8) === 'rvc_site' || $chart_type === 'rvc_semarang' || $chart_type === 'rvc_surakarta' || $chart_type === 'rvc_yogyakarta' || $chart_type === 'rvc_purwokerto' || $chart_type === 'rvc_pekalongan' || $chart_type === 'rvc_salatiga'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['revenue'];
                            $val_x_2[$key] += $data_target['cost'];
                        }
                    }else if($chart_type === 'bbm' || $chart_type === 'bbm_semarang' || $chart_type === 'bbm_surakarta' || $chart_type === 'bbm_yogyakarta' || $chart_type === 'bbm_purwokerto' || $chart_type === 'bbm_pekalongan' || $chart_type === 'bbm_salatiga'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['harga_total'];
                            $val_x_2[$key] += $data_target['RH'];
                            $val_x_3[$key] += $data_target['bbm'];
                        }
                    }else if(substr($chart_type,0,2) === 'cc'){

                        if($month_target === $month){
                            // $val_x_1[$key] += $data_target['SITEID'];
                            $val_x_1[$key] += $data_target['depre_bts'];
                            $val_x_2[$key] += $data_target['depre_tower_own'];
                            $val_x_3[$key] += $data_target['opex_isr'];
                            $val_x_4[$key] += $data_target['cost_nsr'];
                            $val_x_5[$key] += $data_target['depre_combat'];
                            $val_x_6[$key] += $data_target['depre_power'];
                            $val_x_7[$key] += $data_target['opex_transmission'];
                            $val_x_8[$key] += $data_target['cost_tower'];
                            $val_x_9[$key] += $data_target['depre_uso'];
                            $val_x_10[$key] += $data_target['depre_sitesupport'];
                            $val_x_11[$key] += $data_target['opex_power'];
                            $val_x_12[$key] += $data_target['depre_accesslink'];
                            $val_x_13[$key] += $data_target['opex_frequency'];
                            $val_x_14[$key] += $data_target['opex_frequency'];
                        }
                    }else if(substr($chart_type,0,3) === 'pln'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['jmltagihan'];
                        }
                    }
                // array_push($monthList,$month_target);
            };
        }
    }
    }
    
    public function filterData(){
        $interval_awal_in = Carbon::parse(request()->start_date);
        $interval_akhir_in = Carbon::parse(request()->end_date);
        $type = request()->type;

        $val_x_1 = array();
        $val_x_2 = array();
        $val_x_3 = array();
        $val_x_4 = array();
        $val_x_5 = array();
        $val_x_6 = array();
        $val_x_7 = array();
        $val_x_8 = array();
        $val_x_9 = array();
        $val_x_10 = array();
        $val_x_11 = array();
        $val_x_12 = array();
        $val_x_13 = array();
        $val_x_14 = array();

        $val_month = array();

                
        $absorption = 0;
        $accure = 0;
        $available = 0;

        if($type === 'kpi_utama'){
            $all_val = KPI_utama::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'kpi_activity'){
            $all_val = KPI_aktif::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'kpi_support'){
            $all_val = KPI_Support::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss'){
            $all_val = profit_loss::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_semarang'){
            $all_val = profit_loss::orderBy('date')->where('NOP','semarang')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_surakarta'){
            $all_val = profit_loss::orderBy('date')->where('NOP','surakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_yogyakarta'){
            $all_val = profit_loss::orderBy('date')->where('NOP','yogyakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_purwokerto'){
            $all_val = profit_loss::orderBy('date')->where('NOP','purwokerto')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_pekalongan'){
            $all_val = profit_loss::orderBy('date')->where('NOP','pekalongan')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss_salatiga'){
            $all_val = profit_loss::orderBy('date')->where('NOP','salatiga')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost'){
            $all_val = ReservedCost::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_semarang'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','semarang')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_surakarta'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','surakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_yogyakarta'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','yogyakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_purwokerto'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','purwokerto')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_pekalongan'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','pekalongan')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost_salatiga'){
            $all_val = ReservedCost::orderBy('date')->where('NOP','salatiga')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc'){
            $all_val = RVC::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if(substr($type,0,8) === 'rvc_site'){
            $siteid = substr($type,9,strlen($type)+1);
            $all_val = RVC::orderBy('date')->where('SITEID',$siteid)->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_semarang'){
            $all_val = RVC::orderBy('date')->where('NOP','semarang')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_surakarta'){
            $all_val = RVC::orderBy('date')->where('NOP','surakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_yogyakarta'){
            $all_val = RVC::orderBy('date')->where('NOP','yogyakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_purwokerto'){
            $all_val = RVC::orderBy('date')->where('NOP','purwokerto')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_pekalongan'){
            $all_val = RVC::orderBy('date')->where('NOP','pekalongan')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc_salatiga'){
            $all_val = RVC::orderBy('date')->where('NOP','salatiga')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm'){
            $all_val = BBM::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_semarang'){
            $all_val = BBM::orderBy('date')->where('NOP','semarang')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_surakarta'){
            $all_val = BBM::orderBy('date')->where('NOP','surakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_yogyakarta'){
            $all_val = BBM::orderBy('date')->where('NOP','yogyakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_purwokerto'){
            $all_val = BBM::orderBy('date')->where('NOP','purwokerto')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_pekalongan'){
            $all_val = BBM::orderBy('date')->where('NOP','pekalongan')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm_salatiga'){
            $all_val = BBM::orderBy('date')->where('NOP','salatiga')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if(substr($type,0,2) === 'cc'){
            $siteid = substr($type,3,strlen($type)+1);
            $all_val = CostComponent::orderBy('date')->where('SITEID',$siteid)->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if(substr($type,0,3) === 'pln'){
            $siteid = substr($type,4,strlen($type)+1);
            $all_val = pln::orderBy('date')->where('SITEID',$siteid)->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'opex'){
            $all_val = opex::whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_semarang'){
            $all_val = opex::where('NOP','semarang')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_surakarta'){
            $all_val = opex::where('NOP','surakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_yogyakarta'){
            $all_val = opex::where('NOP','yogyakarta')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_purwokerto'){
            $all_val = opex::where('NOP','purwokerto')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_pekalongan'){
            $all_val = opex::where('NOP','pekalongan')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }else if($type === 'opex_salatiga'){
            $all_val = opex::where('NOP','salatiga')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
            foreach($all_val as $data){
                $absorption += $data['absorption'];
                $accure += $data['accure'];
                $available += $data['available'];
            }
        }
        $this->ChartFunction($all_val,$val_month,$type,$val_x_1,$val_x_2,$val_x_3,$val_x_4,$val_x_5,$val_x_6,$val_x_7,$val_x_8,$val_x_9,$val_x_10,$val_x_11,$val_x_12,$val_x_13,$val_x_14);

        return response()->json(compact('absorption','accure','available','val_x_1','val_x_2','val_x_3','val_x_4','val_x_5','val_x_6','val_x_7','val_x_8','val_x_9','val_x_10','val_x_11','val_x_12','val_x_13','val_x_14','val_month'));
    }
}
