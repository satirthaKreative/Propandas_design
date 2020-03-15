<?php

namespace App\Http\Controllers\front;

use App\FrontStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.front-pages.search');
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
     * @param  \App\FrontStep  $frontStep
     * @return \Illuminate\Http\Response
     */
    public function show(FrontStep $frontStep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontStep  $frontStep
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontStep $frontStep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontStep  $frontStep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontStep $frontStep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontStep  $frontStep
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontStep $frontStep)
    {
        //
    }
}
