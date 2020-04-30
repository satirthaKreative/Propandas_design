<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\ForgotPasswordMailAddressEmail;

class ForgotPasswordMailAddress extends Controller
{
    //

    public function __construct()
    {
        //
    }


    public function sendFeedback()
    {
    	$dataType_lawyer = $_GET['data_val'];
    	$email_value = $_GET['email_value'];
    	$count_db = DB::table('users')->where(['email'=>$email_value, 'is_lawyer'=>$dataType_lawyer])->count();
    	if($count_db > 0)
    	{
    		$random_function_password = rand('10000000','98888888');
    		$make_hash_pass = Hash::make($random_function_password);
    		$result_db = DB::table('users')->where(['email'=>$email_value, 'is_lawyer'=>$dataType_lawyer])->update(['password'=>$make_hash_pass]);

    		$comment = $random_function_password;
    		$toEmail = $email_value;

    		Mail::to($toEmail)->send(new ForgotPasswordMailAddressEmail($comment));

    		$data = 1;
    	}else{
    		$data = 0;
    	}

    	echo json_encode($data); 
       
    }
}
