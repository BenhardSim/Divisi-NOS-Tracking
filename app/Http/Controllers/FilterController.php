<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BBM;
use App\Models\RVC;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use App\Models\KPI_Support;
use App\Models\profit_loss;
use App\Models\ReservedCost;

use Illuminate\Http\Request;
use function PHPSTORM_META\type;

class FilterController extends Controller
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
        }
    }
    }
    
    public function filterData(){
        $interval_awal_in = Carbon::parse(request()->start_date);
        $interval_akhir_in = Carbon::parse(request()->end_date);
        $type = request()->type;

        if($type === 'kpi_utama'){
            $all_val = KPI_utama::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'kpi_activity'){
            $all_val = KPI_aktif::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'kpi_support'){
            $all_val = KPI_Support::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'profit_loss'){
            $all_val = profit_loss::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'var_cost'){
            $all_val = ReservedCost::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'rvc'){
            $all_val = RVC::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }else if($type === 'bbm'){
            $all_val = BBM::orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        }

        $val_x_1 = array();
        $val_x_2 = array();
        $val_x_3 = array();

        $val_month = array();

        $this->ChartFunction($all_val,$val_month,$type,$val_x_1,$val_x_2,$val_x_3);

        return response()->json(compact('val_x_1','val_x_2','val_x_3','val_month'));
    }
}
