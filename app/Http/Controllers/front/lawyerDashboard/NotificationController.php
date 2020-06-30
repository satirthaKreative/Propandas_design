<?php

namespace App\Http\Controllers\front\lawyerDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\admincategory;
use App\Country_model;
use App\JobAnswerClinetDescModel;
use App\LawyerNotificationModel;
use App\User;
use App\lawyerCategoryModel;

class NotificationController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.lawyer.notification');
    }

    public function lawyer_notify()
    {
    	$mainQueryCount = LawyerNotificationModel::where(['lawyer_id' => Auth::user()->id, 'active_status' => 1, 'status' => 1])->count();
    	$html = '';
    	if($mainQueryCount > 0)
    	{

    		$mainQuery = LawyerNotificationModel::where(['lawyer_id' => Auth::user()->id, 'active_status' => 1, 'status' => 1])->get();
    		foreach ($mainQuery as $key_value) {
    			$user_query = User::where('id',$key_value->client_id)->get();
    			foreach ($user_query as $key_data) {
    				$fname = $key_data->name;
    				$lname = $key_data->lname;
    				if($key_data->profileImg != ''){
    					$profile_img = $key_data->profileImg;
    				}else{
    					$profile_img = 'frontAssets/images/no-img.jpg';
    				}
    			}
    			$project_name = $key_value->project_name;
    			if($key_value->notify_type == 'invite')
    			{
    				$notify_data = "New invitation";
    				$type_heading = "you got an invitation from ".$fname." ".$lname." <b> (project : ".$project_name.")</b>";
    			}

    			if($key_value->unread_status == 'unread')
    			{
    				$status_class = 'unread-notify';
    			}
    			else
    			{
    				$status_class = 'read-notify';
    			}

    			$html .= '<li class="'.$status_class.' readORunread'.$key_value->id.'" onmouseover="changeNotityLawyer('.$key_value->id.')"> 
                     <div class="left-step">
                     <div class="media">
                            <img class="md-img" src="'.$profile_img.'" alt="image">
                             <div class="media-body">
                               <h5><a href="/job-full-view/'.base64_encode($key_value->project_id).'">'.$notify_data.'</a></h5>
                               <p><a href="/job-full-view/'.base64_encode($key_value->project_id).'">'.$type_heading.'</a></p>
                             </div>
                        </div>
                  </div>  

                  <div class="right-step">
                     <br>
                           <span> <a href="/apply-job/'.base64_encode($key_value->project_id).'" class="shrt-btn acpt-btn ">Accept</a></span>
                           <span>&nbsp;&nbsp;&nbsp;<a href="javascript: ;" onclick="coming_soon_modal()" class="shrt-btn declin-btn">Decline</a></span>
                        </div>
                  </li>';
    		}


    	}
    	else
    	{
    		$html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> notification box is empty</h5></li>';
    	}
    	echo json_encode($html);
    }

    // load notification every time
    public function count_unread_notification()
    {
    	$mainQuery = LawyerNotificationModel::where(['lawyer_id' => Auth::user()->id, 'active_status' => 1, 'status' => 1, 'unread_status' => 'unread'])->count();
    	echo json_encode($mainQuery);
    }

    //
    public function change_notify_lawyer_ajax()
    {
    	$p_id = $_GET['id'];

    	$updateQuery = LawyerNotificationModel::where(['id' => $p_id])->update(['unread_status' => 'read']);
    	echo json_encode("success");
    }

    public function category_lawyer_speacialization_ajax()
    {
        $all_cateQuery = admincategory::all();
        $count_user_speacialization = lawyerCategoryModel::where(['user_id' => Auth::user()->id])->count();
        $html = '';
        // $html .= '<option value="">Specialization</option>';
        if($count_user_speacialization > 0){
            
            foreach ($all_cateQuery as $key_value1) {
                $get_user_speacialization_count = lawyerCategoryModel::where(['user_id' => Auth::user()->id, 'category_id' => $key_value1->id])->count();
                if($get_user_speacialization_count > 0){
                    $html .= '<option value="'.$key_value1->id.'" selected="selected">'.$key_value1->category_name.'</option>';
                }else{
                    $html .= '<option value="'.$key_value1->id.'">'.$key_value1->category_name.'</option>';
                }
            }
        }else{
            foreach ($all_cateQuery as $key_value) {
                $html .= '<option value="'.$key_value->id.'">'.$key_value->category_name.'</option>';
            }
        }

        echo json_encode($html);
    }
}
