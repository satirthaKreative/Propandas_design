<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\FeedbackMail;
use App\User;

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
       
       $mySessionIs_lawyer = Session::get('mysession_islawyer_data');
        
       if($mySessionIs_lawyer == '1')
       {
          $query_users = User::where(['email'=>$mySessionId, 'is_lawyer' => 1])->get();
          foreach($query_users as $query1)
          {
              $user_id_for_lawyer = $query1->id;
          }


          $mySessionLawyerCategory = Session::get('mySessionLawyer_Category');
          
          foreach($mySessionLawyerCategory as $myCateOne)
          {
              $query_lawyer_category_db = DB::table('lawyer_category_models')->insert(['category_id' => $myCateOne, 'user_id' => $user_id_for_lawyer]);
          }
           session()->forget('mySessionLawyer_Category');
       }
       session()->forget('mysession_islawyer_data');  
        
       $myRandNumnber = Crypt::encryptString($mySessionId);
       $myRandNumnber = base64_encode($mySessionId);
       $myUrl = url("/password/".$myRandNumnber);
       $comment = $myUrl;
       $toEmail = $mySessionId;

       Mail::to($toEmail)->send(new FeedbackMail($comment));
       
       return view('frontend.front-pages.verification');
    }

}
