<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KPI_utama;
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

        $months = array('January','February','March','April','May','June','July','August','September','October','November'.'December');

        $AllIds = KPI_utama::all()->toArray();
        $monthList = array();
        $value_KPI_target = array_fill(0, 12, 0);
        $value_KPI_active_utama = array_fill(0, 12, 0);
        $value_KPI_utama = array_fill(0, 12, 0);

        foreach($AllIds as $AllId){
            $data_target =  $AllId;
            $month_target =  $AllId['date'];
            // Carbon::parse($month_target->format('Y-m-d'));
            $month_target =  date('F', strtotime($month_target));
            // $month_target =  date('F', strtotime($strmonth->pluck('date')));

            // O(nx12)
            foreach($months as $key => $month){
                if($month_target === $month){
                    $value_KPI_target[$key] += $data_target['kpi_target'];
                    $value_KPI_active_utama[$key] += $data_target['ach_kpi'];
                    $value_KPI_utama[$key] += $data_target['kpi_utama'];
                } 
            }
        };

        // dd($value_KPI_target);
        return view('portal.dashboard', [
            "site_all" => siteprofile::count(),
            "site_tp" => siteprofile::where("TOWERSTATUS", "Sewa TP")->count(),
            "site_telkom" => siteprofile::where("PEMILIKTOWER", "Telkom")->count(),
            "site_telkomsel" => siteprofile::where("PEMILIKTOWER", "Telkomsel")->count(),
            "value_KPI_target" => $value_KPI_target,
            "value_KPI_active_utama" => $value_KPI_active_utama,
            "value_KPI_utama" => $value_KPI_utama,
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
