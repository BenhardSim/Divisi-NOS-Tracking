<?php

namespace App\Http\Controllers;

use App\Models\pbb;
use App\Models\pln;
use App\Models\RVC;
use Carbon\CarbonPeriod;
use App\Models\commissue;
use App\Models\claim_asset;
use App\Models\imbas_petir;
use App\Models\siteprofile;
use App\Models\imb_document;
use Illuminate\Http\Request;
use App\Models\CostComponent;
use App\Models\lain_document;
use App\Models\certificate_document;
use App\Models\kontrak_site_history;

class SitesController extends Controller
{

    function ChartFunction($AllIds,&$month_list,$chart_type,&$val_x_1,&$val_x_2='empty',&$val_x_3='empty',&$val_x_4='empty',&$val_x_5='empty',&$val_x_6='empty',&$val_x_7='empty',&$val_x_8='empty',&$val_x_9='empty',&$val_x_10='empty',&$val_x_11='empty',&$val_x_12='empty',&$val_x_13='empty',&$val_x_14='empty'){
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
                    }else if($chart_type === 'CC'){

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
                    }else if($chart_type === 'PLN'){
                        if($month_target === $month){
                            $val_x_1[$key] += $data_target['jmltagihan'];
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
    public function indexAll()
    {
        return view('portal.site_list', [
            "title" => "Site All",
            "site_all" => siteprofile::paginate(10)
        ]);
    }

    public function indexTp()
    {
        return view('portal.site_list', [
            "title" => "Site TP",
            "site_all" => siteprofile::where("TOWERSTATUS", "Sewa TP")->paginate(10)
        ]);
    }


    public function indexTelkom()
    {
        return view('portal.site_list', [
            "title" => "Site Telkom",
            "site_all" => siteprofile::where("TOWERSTATUS", "Beli Telkom")->paginate(10)
        ]);
    }


    public function indexTelkomsel()
    {
        return view('portal.site_list', [
            "title" => "Site Telkomsel",
            "site_all" => siteprofile::where("TOWERSTATUS", "Beli Telkomsel")->paginate(10)
        ]);
    }
    public function indexReseller()
    {
        return view('portal.site_list', [
            "title" => "Site Reseller",
            "site_all" => siteprofile::where("TOWERSTATUS", "Sewa Reseller")->paginate(10)
        ]);
    }

    public function searchSites(Request $request)
    {
        if($request->search){
            $searchSites = siteprofile::where('SITEID','LIKE','%'.$request->search.'%')->paginate(10);
            return view('portal.site_list', [
                "title" => " Search : Site ".$request->search,
                "site_all" => $searchSites ,
                
            ]);
        }else{
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function detailSites(siteprofile $id)
    {

        $max_id_certificate = certificate_document::max('id');
        $max_id_imb = imb_document::max('id');
        $max_id_lain = lain_document::max('id');
        
        // nomor target sertifikat
        $no_ser_target = certificate_document::select()->find($max_id_certificate);
        $no_imb_target = imb_document::select()->find($max_id_imb);
        $no_lain_target = lain_document::select()->find($max_id_lain);

        /* =================================== REVENUE VS COST SITE =========================== */

        $AllIds_RVC = RVC::where('SITEID', $id->SITEID )->orderBy('date')->get()->toArray(); 
        $value_RVC_rev = array();
        $value_RVC_cost = array();
        $monthList_RVC = array();

        $this->ChartFunction($AllIds_RVC,$monthList_RVC,'rvc',$value_RVC_rev,$value_RVC_cost);

        /* =================================== COST COMPONENT SITE =========================== */

        $AllIds_CC = CostComponent::where('SITEID', $id->SITEID)->orderBy('date')->get()->toArray(); 
        $val_x_1_CC = array();
        $val_x_2_CC = array();
        $val_x_3_CC = array();
        $val_x_4_CC = array();
        $val_x_5_CC = array();
        $val_x_6_CC = array();
        $val_x_7_CC = array();
        $val_x_8_CC = array();
        $val_x_9_CC = array();
        $val_x_10_CC = array();
        $val_x_11_CC = array();
        $val_x_12_CC = array();
        $val_x_13_CC = array();
        $val_x_14_CC = array();

        $monthList_CC = array();

        $this->ChartFunction($AllIds_CC, $monthList_CC,'CC',$val_x_1_CC,$val_x_2_CC,$val_x_3_CC,$val_x_4_CC,$val_x_5_CC,$val_x_6_CC,$val_x_7_CC,$val_x_8_CC,$val_x_9_CC,$val_x_10_CC,$val_x_11_CC,$val_x_12_CC,$val_x_13_CC,$val_x_14_CC);

         /* =================================== COST PLN SITE =========================== */

         $AllIds_PLN = pln::where('SITEID', $id->SITEID)->orderBy('date')->get()->toArray(); 
         $cost_pln = array();
         $monthList_PLN = array();

         $this->ChartFunction($AllIds_PLN, $monthList_PLN,'PLN',$cost_pln);



        // dd($cost_pln);
        return view('portal.profile',[
            "title" => "SITE ".$id->SITEID,
            "id" => $id->SITEID,
            "alamat" => $id->ALAMAT,
            "nama" => $id->SITENAME,
            "site" => $id,

            "imbas" => imbas_petir::where("Siteid", $id->SITEID)->get(),
            "pebebe" => pbb::where("SITEID", $id->SITEID)->get(),
            "claims" => claim_asset::where("SiteIDClaim", $id->SITEID)->get(),
            "no_kon" => $id->NOKONTRAK,
            "contracts" => kontrak_site_history::where('SITEID',$id->SITEID)->get(),
            "issues" => commissue::where("SITEID", $id->SITEID)->get(),

            "certi_docs" => certificate_document::where('SITEID', $id->SITEID)->get(),
            "imb_docs" => imb_document::where('SITEID',$id->SITEID)->get(),
            "lain_docs" => lain_document::where('SITEID',$id->SITEID)->get(),
            
            // latest document certificate
            "latest_cer" => $no_ser_target,
            "latest_imb" => $no_imb_target,
            "latest_lain" => $no_lain_target,

            "monthList_RVC" => $monthList_RVC,
            "value_RVC_rev" => $value_RVC_rev,
            "value_RVC_cost" => $value_RVC_cost,

            "val_x_1_CC" => $val_x_1_CC,
            "val_x_2_CC" => $val_x_2_CC,
            "val_x_3_CC" => $val_x_3_CC,
            "val_x_4_CC" => $val_x_4_CC,
            "val_x_5_CC" => $val_x_5_CC,
            "val_x_6_CC" => $val_x_6_CC,
            "val_x_7_CC" => $val_x_7_CC,
            "val_x_8_CC" => $val_x_8_CC,
            "val_x_10_CC" => $val_x_10_CC,
            "val_x_11_CC" => $val_x_11_CC,
            "val_x_12_CC" => $val_x_12_CC,
            "val_x_13_CC" => $val_x_13_CC,
            "val_x_9_CC" => $val_x_9_CC,
            "val_x_14_CC" => $val_x_14_CC,
            "monthList_CC" => $monthList_CC,

            "cost_pln" => $cost_pln,
            "monthList_PLN" => $monthList_PLN,
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
