<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Mail\ContactMail;
use App\ContactQueryModel;

class ContactQueryMailController extends Controller
{
    //

    public function __construct()
    {
        //
    }


    public function sendFeedback()
    {
    	$insert_arr = [
    		'name'=>$_GET['name'],
    		'email'=>$_GET['email'],
    		'regarding'=>$_GET['regarding'],
    		'subject'=>$_GET['subject'],
    		'your_msg'=>$_GET['your_msg']
    	];
    	$insertQuery = ContactQueryModel::insert($insert_arr);
    	
    	if($insertQuery > 0)
    	{
    		
    		$client_name= $_GET['name'];
    		$client_email = $_GET['email'];
    		$client_subject = $_GET['subject'];
    		$html = $_GET['your_msg'];

    		$comment = $html;
    		$toEmail = $_GET['regarding'];


    		Mail::to($toEmail)->send(new ContactMail($comment,$client_email,$client_subject,$client_name));

    		$data = 1;
    	}else{
    		$data = 0;
    	}

    	echo json_encode($data); 
       
    }
}
