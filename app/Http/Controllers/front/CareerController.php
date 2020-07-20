<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
Use App\Models\CareerModel;

class CareerController extends Controller
{
    //

    public function index()
    {
    	return view('frontend.front-pages.career');
    }

    public function career_ajax()
    {
    	$fname = $_GET['fname'];
    	$lname = $_GET['lname'];
    	$c_email = $_GET['c_email'];
    	$c_phone = $_GET['c_phone'];
    	$comment = $_GET['comment'];

    	$arr = [
    		'fname' => $fname,
    		'lname' => $lname,
    		'email' => $c_email,
    		'phn_num' => $c_phone,
    		'msg' => $comment,
    		'status' => 1,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => date('Y-m-d H:i:s')
   		];

   		$insertQuery = CareerModel::insert($arr);
   		if($insertQuery)
   		{
   			$data['msg'] = "success";
   		}
   		else
   		{
   			$data['msg'] = "error";
   		}
   		echo  json_encode($data);
    }



    // admin 

    public function admin_career_index()
    {
      $categoryData = CareerModel::where('status',1)->paginate(5);
      return view('admin.career.index',compact('categoryData'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function admin_career_ajax()
    {
      $careerQuery = CareerModel::where('id',$_GET['id'])->get();
      foreach($careerQuery as $cQuery)
      {
        $full_msg = $cQuery->msg;
      }

      echo json_encode($full_msg);
    }

    public function admin_career_del_ajax()
    {
      $careerQuery = CareerModel::where('id',$_GET['id'])->delete();
      if($careerQuery)
      {
        $data['msg'] = "success";
      }
      else
      {
        $data['msg'] = "error";
      }

      echo json_encode($data);
    }
}
