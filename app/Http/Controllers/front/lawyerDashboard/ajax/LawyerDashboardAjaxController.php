<?php

namespace App\Http\Controllers\front\lawyerDashboard\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LawyerDashboardAjaxController extends Controller
{
    //

    public function index(){
    	$selectResultQuery = DB::table('jobanswerclinetdesc')->where('id',1)->get();
    	foreach($selectResultQuery as $newQ)
    	{
    		$dataQ = $newQ->quesAnsDescrip;
    		$newTotal = explode(",",$dataQ);

    		$arr = array();
    		
			foreach($newTotal as $key=>$value)
			{
				$newTotal1 = explode('=>',$value);
				foreach($newTotal1 as $v2=>$v1){
					array_push($arr,$v1);
				}

			}
			
			for($i = 0; $i < count($arr); $i++)
			{

				if(($i+1)%2 !== 0)
				{
					if($i != 0){
						if($arr[$i-2] !== $arr[$i]){
							echo $arr[$i+1]."<br />";
						}else if($arr[$i-2] == $arr[$i]){
							echo $arr[$i+1]."<br />";
						}
					}
				}
			}
			

    	}
    	
    	// echo json_encode($dataQ);
    }
}
