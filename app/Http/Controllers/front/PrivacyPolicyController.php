<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
    //

    public function index()
    {
    	return view('frontend.front-pages.Privacy-policy');
    }
}
