<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
       $comment = 'https://www.google.com/';
       $toEmail = "satirtha64@gmail.com";
       Mail::to($toEmail)->send(new FeedbackMail($comment));
       
       return view('frontend.front-pages.verification');
    }

}
