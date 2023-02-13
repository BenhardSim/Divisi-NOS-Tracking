<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\KPI_aktif;
use App\Models\KPI_utama;
use Illuminate\Http\Request;

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
    
    public function filterData(){
        $interval_awal_in = Carbon::parse(request()->start_date);
        $interval_akhir_in = Carbon::parse(request()->end_date);

        $filteredData = KPI_utama::select('date')->orderBy('date')->whereDate('date','<=',$interval_akhir_in->format('y-m-d'))->whereDate('date','>=',$interval_awal_in->format('y-m-d'))->get()->toArray();
        
        // filter(request(['interval_awal_in', 'interval_akhir_in']))->toArray();

        // $value_KPI_utama_target_filter = array();
        // $value_KPI_active_utama_filter = array();
        // $value_KPI_utama_filter = array();
        // $monthList_KPI_utama_filter = array();

        // $this->ChartFunction($filteredData,$monthList_KPI_utama_filter,'kpi_utama', $value_KPI_utama_target_filter,$value_KPI_active_utama_filter,$value_KPI_utama_filter);
        // if(sizeof($monthList_KPI_utama_filter) !== 0){
        //     return response()->json(compact('interval_awal_in', 'interval_akhir_in','filteredData','monthList_KPI_utama_filter','value_KPI_active_utama_filter','value_KPI_utama_filter','value_KPI_utama_filter'));
        // }

        // $AllIds_KPI_activity = KPI_utama::whereDate('date','<=',$interval_akhir_in->format('y-m'))->whereDate('date','>=',$interval_awal_in->format('y-m'))->get()->toArray();
        
        // $all_id = KPI_utama::whereBetween('date', [$interval_akhir_in, $interval_awal_in])->get()->toArray();


        // $value_KPI_activity_target = array();
        // $value_KPI_active_activity = array();
        // $value_KPI_activity = array();
        // $test = 'hi';
        
        // if(sizeof($AllIds_KPI_activity) !== 0){
        //     $monthList_KPI_activity = array();
        //     // ambil interval date bulan dari data paling kecil ke paling besar 
        //     $from = $AllIds_KPI_activity[0]['date'];
        //     $to = $AllIds_KPI_activity[sizeof($AllIds_KPI_activity)-1]['date'];
            
        //     // key -> value untuk mengecek apakah bulan sudah ada atau blm 
        //     $check_month = [];
            
        //     // Reservation::whereBetween('reservation_from', [$from, $to])->get();
        //     // mengenerate periode
        //     $period = CarbonPeriod::create($from, $to);
            
        //     // mengeassign value dengan default 0 bila tidak ada
        //     foreach ($period as $date) {
        //         $key = $date->format('Y-m');
        //         $check_month[$key] = 0;
        //     }
            
        //     // proses filter
        //     foreach ($period as $date) {
        //         // echo $date->format('Y-m-d');
        //         $key = $date->format('Y-m');
        //         // kalau belum terpilih 
        //         if($check_month[$key] !== 1){
        //             array_push($monthList_KPI_activity,$date->format('Y-m'));
        //             $check_month[$key] = 1;
        //         }
        //     }

        //     // inisial nilai value dengan panjang month list
        //     $value_KPI_activity_target = array_fill(0, sizeof($monthList_KPI_activity), 0);
        //     $value_KPI_active_activity = array_fill(0, sizeof($monthList_KPI_activity), 0);
        //     $value_KPI_activity = array_fill(0, sizeof($monthList_KPI_activity), 0);
            
        //     // Convert the period to an array of dates
        //     // $monthList = $period->format('Y-m-d')->toArray();

        //     // dd($from.'-'.$to);
        //     // dd($monthList_KPI_activity);
        //     foreach($AllIds_KPI_activity as $AllId){
        //         $data_target =  $AllId;
        //         $month_target =  $AllId['date'];
        //         // Carbon::parse($month_target->format('Y-m-d'));
        //         $month_target =  date('Y-M', strtotime($month_target));
        //         // $month_target =  date('F', strtotime($strmonth->pluck('date')));
                
        //         // O(nx12)
        //         foreach($monthList_KPI_activity as $key => $month){
        //             $month =  date('Y-M', strtotime($month));
        //             if($month_target === $month){
        //                 $value_KPI_activity_target[$key] += $data_target['kpi_target'];
        //                 $value_KPI_active_activity[$key] += $data_target['ach_kpi'];
        //                 $value_KPI_activity[$key] += $data_target['kpi_activity'];
        //             } 
        //         }
        //         // array_push($monthList,$month_target);
        //         $test = 'houu';
        //     };
            
            
        // }

        return response()->json(compact('filteredData'));
    }
}
