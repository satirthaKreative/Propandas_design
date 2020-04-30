<?php

namespace App\Http\Controllers\front\lawyerDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostJobLawyerController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.lawyer.post-job-view');
    }
}
