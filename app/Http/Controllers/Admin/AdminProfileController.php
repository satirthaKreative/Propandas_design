<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $myProfile = DB::table('admins')->get();
        return view('admin.profile.view-edit',compact('myProfile'));
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
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function show(adminProfilePageModel $adminProfilePageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(adminProfilePageModel $adminProfilePageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminProfilePageModel $adminProfilePageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\adminProfilePageModel  $adminProfilePageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminProfilePageModel $adminProfilePageModel)
    {
        //
    }
}
