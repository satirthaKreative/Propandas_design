<?php

namespace App\Http\Controllers\front\projectStatus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ProposalSendModel;
use App\User;
use App\Country_model;
use App\LawyerCountryModel;
use App\LawyerCitiesModel;
use App\Models\ChatModel;
use App\Models\ChatProjectModel;
use App\Models\ChatJobQAModel;
use App\Models\FileSizeModel;
use App\Models\FileWithPriceModel;
use App\Models\reviews\CtoLmodel;
use App\Models\reviews\LtoCmodel;


class ProjectStatusController extends Controller
{
    //	project status index
    public function index()
    {
    	return view('frontend.front-pages.project_status.project-status');
    }
    // client own project status
    public function client_index()
    {
    	return view('frontend.front-pages.project_status.client-project-status');
    }

    //	project status project load
    public function page_load_proj_status()
    {
    	$query = ChatProjectModel::where('total_users_ids','like', '%'.Auth::user()->id.'%')->get();
    	$countQuery = ChatProjectModel::where('total_users_ids','like', '%'.Auth::user()->id.'%')->count();

    	// count checking 
    	if($countQuery > 0 )
    	{
	    	// Query
	    	$i = 1; 
	    	$html = "";
	    	foreach($query as $q1)
	    	{
	    		if($q1->work_status == "completed"){
					$work_status_review = '<a href="javascript:void(0)" class="shrt-btn vw-btn short-font" onclick=open_modal_completeProj("'.$q1->project_name.'","'.$q1->project_id.'","'.$q1->client_id.'","'.$q1->lawyer_id.'")>Client Review</a>';
	    		}else{
					$work_status_review = 'Work in progress';	
	    		}

	    		$html .= '<tr>
	                           <td> '.$i.'</td>
	                           <td>'.$q1->project_name.'</td>
	                           <td>'.date('F d,Y',strtotime($q1->project_start_date)).'</td>
	                           <td>'.$q1->work_status.'</td>
	                           <td>'.$work_status_review.'</td>
	                        </tr>';
	            $i++;
	    	}
	    	$data['msg'] = 'msg';
	    	$data['html'] = $html;
	    }
	    else
	    {
	    	$data['msg'] = 'no_msg';
	    	$data['html'] = '<tr>
                           <td colspan="5"> <center><i class="fa fa-times"><i> No projects in your queue yet</center></td>
                        </tr>';
	    }
    	echo  json_encode($data);
    }

    // project status client project load
    public function page_load_client_proj_status()
    {
    	  $query = ChatProjectModel::where('client_id',Auth::user()->id)->get();
    	  $countQuery = ChatProjectModel::where('client_id',Auth::user()->id)->count();

    	  	// count checking 
    	  if($countQuery > 0 )
    	  {
    		  // Query
    		  $i = 1; 
    		  $html = "";
    		  foreach($query as $q1)
    		  {
    		  	if($q1->work_status == "completed")
    		  	{
    		  		$main_html = "Already Rated";
    		  	}
    		  	else
    		  	{
    		  		$main_html = '<a href="javascript:void(0)" class="shrt-btn vw-btn short-font" onclick=open_modal_completeProj("'.$q1->project_name.'","'.$q1->project_id.'","'.$q1->client_id.'","'.$q1->lawyer_id.'")>Completed</a>';
    		  	}

    		   	$html .= '<tr>
    		                <td> '.$i.'</td>
    		                <td>'.$q1->project_name.'</td>
    		                <td>'.date('F d,Y',strtotime($q1->project_start_date)).'</td>
    		                <td>'.$q1->work_status.'</td>
    		                <td>'.$main_html.'</td>
    		             </tr>';
    		         $i++;
    		  	}
    		   	$data['msg'] = 'msg';
    		   	$data['html'] = $html;
    	  }
    	  else
    	  {
    		$data['msg'] = 'no_msg';
    		$data['html'] = '<tr>
    	                        <td colspan="5"> <center><i class="fa fa-times"><i> No projects in your queue yet</center></td>
    	                     </tr>';
    	  }
    	  echo  json_encode($data);
    }

    // project complete status
    public function complete_project_ajax_submit()
    {
    	$service_star = $_GET['service_star'];
    	$value_star = $_GET['value_star'];
    	$time_star = $_GET['time_star'];
    	$summary = $_GET['summary'];
    	$review = $_GET['review'];
    	$pname = $_GET['pname'];
    	$pid = $_GET['pid'];
    	$cid = $_GET['cid'];
    	$lid = $_GET['lid'];

    	$arr = [
    		'reviewer_id' => $cid,
    		'review_id' => $lid,
    		'review_title' => $summary,
    		'review_details' => $review,
    		'review_service_count' => $service_star,
    		'review_value_count' => $value_star,
    		'review_time_count'  => $time_star,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => date('Y-m-d H:i:s')
   		];

   		CtoLmodel::insert($arr);

   		$updated_arr = [
   			'client_id' => $cid,
   			'lawyer_id' => $lid,
   			'project_id' => $pid,
   			'project_name' => $pname
   		];

   		$updateQ = 	ChatProjectModel::where($updated_arr)->update(['work_status' => 'completed', 'project_close_date' => date('Y-m-d H:i:s')]);

   		echo json_encode("success");
    }

    public function give_client_review_ajax_submit()
    {
    	$service_star = $_GET['service_star'];
    	$value_star = $_GET['value_star'];
    	$time_star = $_GET['time_star'];
    	$summary = $_GET['summary'];
    	$review = $_GET['review'];
    	$pname = $_GET['pname'];
    	$pid = $_GET['pid'];
    	$cid = $_GET['cid'];
    	$lid = $_GET['lid'];

    	$arr = [
    		'reviewer_id' => $lid,
    		'review_id' => $cid,
    		'review_title' => $summary,
    		'review_details' => $review,
    		'review_service_count' => $service_star,
    		'review_value_count' => $value_star,
    		'review_time_count'  => $time_star,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => date('Y-m-d H:i:s')
   		];

   		LtoCmodel::insert($arr);

   		echo json_encode("success");
    }
}
