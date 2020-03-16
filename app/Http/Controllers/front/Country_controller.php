<?php

namespace App\Http\Controllers\front;

use App\Country_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Country_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Country_model  $country_model
     * @return \Illuminate\Http\Response
     */
    public function show(Country_model $country_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country_model  $country_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Country_model $country_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country_model  $country_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country_model $country_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country_model  $country_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country_model $country_model)
    {
        //
    }

    //  country list ajax

    public function showAllCountry()
    {
        $showAllCountry = DB::table('country_list')->get();
        echo json_encode($showAllCountry);
    }

    // timezone list ajax

    public function showAllZone()
    {
        $showAllZone = DB::table('timezone_list')->get();
        echo json_encode($showAllZone);
    }

    // ip checking ajax
    public function ipCheck()
    {
        $ip = $_SERVER['REMOTE_ADDR']; 
        if($ip == "127.0.0.1")
        {
            $data_timezone = "Asia/Kolkata";
        }
        else
        {
            $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
            $ipInfo = json_decode($ipInfo);
            $timezone = $ipInfo->timezone;
            date_default_timezone_set($timezone);
            $data_timezone = date_default_timezone_get();
        }
        
        echo json_encode($data_timezone);
    }
}
