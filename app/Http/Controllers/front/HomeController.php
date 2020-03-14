<?php

namespace App\Http\Controllers\front;

use App\FrontHome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.front-pages.index');
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
     * @param  \App\FrontHome  $frontHome
     * @return \Illuminate\Http\Response
     */
    public function show(FrontHome $frontHome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontHome  $frontHome
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontHome $frontHome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontHome  $frontHome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontHome $frontHome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontHome  $frontHome
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontHome $frontHome)
    {
        //
    }
}
