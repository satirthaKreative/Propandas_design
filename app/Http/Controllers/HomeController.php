<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\FeedbackMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function lawyer()
    {
        return view('lawyer');
    }
    public function sendFeedback()
    {
       $mySessionId = Session::get('mysession');
       // $myRandNumnber = Crypt::encryptString($mySessionId);
       $myRandNumnber = base64_encode($mySessionId);
       $myUrl = url("/password/".$myRandNumnber);
       $comment = $myUrl;
       $toEmail = $mySessionId;

       Mail::to($toEmail)->send(new FeedbackMail($comment));
       
       return view('frontend.front-pages.verification');
    }

}
