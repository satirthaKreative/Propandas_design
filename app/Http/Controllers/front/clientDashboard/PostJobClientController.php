<?php

namespace App\Http\Controllers\front\clientDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\admincategory;
use App\Country_model;
use App\JobAnswerClinetDescModel;
use App\LawyerNotificationModel;

class PostJobClientController extends Controller
{
    //
    public function index()
    {
    	$cateAllQuery = admincategory::get();
    	return view('frontend.front-pages.client.client-job-posted',compact('cateAllQuery'));
    }

    // lawyers after job posted by client end

    public function related_lawyers()
    {
    	return view('frontend.front-pages.client.related-lawyer-view');
    }

    // 

    public function related_lawyers_ajax()
    {
    	// if(session('send_invite_lawyer_session')){
    	// 	session()->forget('send_invite_lawyer_session');  
    	// }
    	if(session('related_lawyers_after_job_session')){
            $get_session = Session::get('related_lawyers_after_job_session');  

            $get_category = admincategory::where(['id' => $get_session])->get();
            foreach ($get_category as $get_cate) {
            	$category_name = $get_cate->category_name;
            }

            $countQueryMain = DB::table('lawyer_category_models')
            					->leftJoin('users','lawyer_category_models.user_id','=','users.id')
            					->where(['lawyer_category_models.category_id' => $get_session])

            					->count();

           	if($countQueryMain > 0)
           	{
           		$mainQuery = DB::table('lawyer_category_models')
            					->leftJoin('users','lawyer_category_models.user_id','=','users.id')
            					->where(['lawyer_category_models.category_id' => $get_session])

            					->get();
           	}
           	else if($countQueryMain == 0)
           	{
           		$mainQuery = DB::table('lawyer_category_models')
            					->leftJoin('users','lawyer_category_models.user_id','=','users.id')
            					->get();
           	}

            
           	$html = '';
           	$html .= '<div class="detail-content">
                   		<div class="media ">                         
                             <div class="media-body">
                               <h5>'.$category_name.' Lawyers</h5>
                               <h6><b>Job Category : </b>'.$category_name.' Job. </h6>
                               <p>Welcome to propandas, our best lawyers in '.$category_name.' job type category.</p>
                             </div>
                        </div>
               		</div> 
               		<hr>
               		<h6>The best lawyers</h6>
               		<ul class="filter-result"> ';
               		$my_id = Auth::user()->id;
            $count = 8;
           	foreach($mainQuery as $main_details)
           	{
           		if($main_details->profileImg != ''){
           			$profile_img = $main_details->profileImg;
           		}else{
           			$profile_img = 'frontAssets/images/no-img.jpg';
           		}

           		$country_id = $main_details->country;
           		$querys = Country_model::where(['id' => $country_id])->get();
           		foreach($querys as $q1){
           			$country_name = $q1->nicename;
           		}

           		$last_proj_id = JobAnswerClinetDescModel::where(['client_id' => Auth::user()->id])->orderBy('id','DESC')->limit(1)->get();
           		foreach($last_proj_id as $last_project)
           		{
           			$project_id = $last_project->id;
           		}

           		if(session('send_invite_lawyer_session'))
           		{
           			// $my_array_session = Session::get('send_invite_lawyer_session');
           			if(in_array($count, Session::get('send_invite_lawyer_session'))){
           				// print_r(Session::get('send_invite_lawyer_session'));
           				// die();
           				$send_invitation = '<a href="javascript:void(0)" class="shrt-btn vw-btn short-font text-success" ><i class="fa fa-check"></i> Invited</a>';
           			}else{
           				$send_invitation = '<a href="javascript:void(0)" class="shrt-btn vw-btn short-font" onclick="send_invite('.$project_id.','.$main_details->user_id.','.$my_id.','.$count.')">Send Invitation</a>';
           			}
           		}
           		else
           		{
           			$send_invitation = '<a href="javascript:void(0)" class="shrt-btn vw-btn short-font" onclick="send_invite('.$project_id.','.$main_details->user_id.','.$my_id.','.$count.')">Send Invitation</a>';
           		}

              $count_review_query = DB::table('clienttolawyerreview_tbls')->where('review_id',$main_details->user_id)->count();
              if($count_review_query > 0)
              {
                $my_review_query = DB::table('clienttolawyerreview_tbls')->where('review_id',$main_details->user_id)->get();

                $main_review = 0;

                foreach($my_review_query as $m1)
                {
                  $review1 = $m1->review_service_count;
                  $review2 = $m1->review_value_count;
                  $review3 = $m1->review_time_count;

                  $main_review1 = (($review3+$review2+$review1)/3)+$main_review;
                  $main_review = (int)$main_review1;
                }

                $count_review = $main_review/$count_review_query;

                $star_view = '';
                for($r = 1; $r < 6; $r++)
                {
                  if($r < ($count_review+1)){
                    $star_view .= '<i class="fa fa-star" aria-hidden="true"></i>';
                  }else{
                    $star_view .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
                  }
                }
              }
              else
              {
                $star_view = '';
                for($r = 1; $r < 6; $r++)
                {
                  
                    $star_view .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
                }
              }

           		$html .= '<li>
                    <div class="left-step">
                      <div class="media">
                         <img class="md-img" src="'.$profile_img.'" alt="image">

                          <div class="media-body">
                             <h5>'.$main_details->name.' '.$main_details->lname.'</h5>
                             <div class="rating-bx">                              
                                '.$star_view.'
                                <label class="rv-number"><a href="/lawyer-review/'.$main_details->user_id.'"><i class="fa fa-plus-circle" aria-hidden="true"></i>'.$count_review_query.' Reviews</a></label>
                             </div>
                             <p class="dg-text"><em>'.$category_name.' Lawyer</em></p>
                             <p><i class="fa fa-map-marker icn-show" aria-hidden="true" style="margin-right: 5px;"></i> '.$main_details->law_firm.' '.$main_details->law_firm_address.' '.$country_name.'</p>
                          </div>
                      </div>
                    </div>
                    <div class="right-step">
                      <br>'.$send_invitation.'
                    </div> 
                  </li>';
                  $count++;
           	}
           	$html .= '</ul>';
        }
        echo json_encode($html);
    	
    }

    public function notification_send_to_related_lawyer()
    {
    	$client_id = $_GET['client_id'];
    	$lawyer_id = $_GET['lawyer_id'];
    	$project_id = $_GET['project_id'];
    	$count_id = $_GET['count_id'];


    	if(session('send_invite_lawyer_session'))
        {
        	Session::push('send_invite_lawyer_session',$count_id);
        }
        else
        {
    		Session::put('send_invite_lawyer_session',array($count_id));
    	}

    	$get_project_name = JobAnswerClinetDescModel::where('id',$project_id)->get();
    	foreach($get_project_name as $p_name)
    	{
    		$proj_name = $p_name->projectId;
    	}
    	$insert_Arr = [
    		'lawyer_id' => $lawyer_id,
    		'client_id' => $client_id,
    		'project_id' => $project_id,
    		'project_name' => $proj_name,
    		'notify_type' => 'invite',
    		'created_at' => date('Y-m-d'),
    		'updated_at' => date('Y-m-d')
   		];

   		$insert_invite = LawyerNotificationModel::insert($insert_Arr);
   		echo json_encode("Success");
    }
}
