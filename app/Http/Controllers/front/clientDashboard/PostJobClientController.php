<?php

namespace App\Http\Controllers\front\clientDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admincategory;

class PostJobClientController extends Controller
{
    //
    public function index()
    {
    	$cateAllQuery = admincategory::get();
    	return view('frontend.front-pages.client.client-job-posted',compact('cateAllQuery'));
    }
}
