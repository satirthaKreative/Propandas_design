<?php

namespace App\Http\Controllers\front\ajax;

use App\frontAjaxModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('admincategories')->get();
        echo json_encode($result);
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
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function show(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function edit(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontAjaxModel $frontAjaxModel)
    {
        //
    }
}
