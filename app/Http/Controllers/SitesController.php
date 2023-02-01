<?php

namespace App\Http\Controllers;

use App\Models\siteprofile;
use Illuminate\Http\Request;

class SitesController extends Controller
{
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
            "site_all" => siteprofile::where("PEMILIKTOWER", "Telkom")->paginate(10)
        ]);
    }


    public function indexTelkomsel()
    {
        return view('portal.site_list', [
            "title" => "Site Telkomsel",
            "site_all" => siteprofile::where("PEMILIKTOWER", "Telkomsel")->paginate(10)
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
