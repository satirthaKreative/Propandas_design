<?php

namespace App\Http\Controllers\front\chats;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\chat_invitations\ChatInvitationModel;
use App\Models\chat_before_accept\ChatAndAcceptModel;

class ChatInvitationsController extends Controller
{
    // chat invitations

    public function index()
    {
    	$invite_type = $_GET['invite_user_type'];
    	$invite_mail = $_GET['invite_user_email'];
    	$member_proj_id = $_GET['member_proj_id'];
    	$member_proj_name = $_GET['member_proj_name'];


    	if($invite_type == "" || $invite_type == null)
    	{
    		$html = "<strong class='text-danger'><i class='fa fa-times'></i> Choose atleast one type</strong>";
    	}
    	else if($invite_mail == "" || $invite_mail == null)
    	{
    		$html = "<strong class='text-danger'><i class='fa fa-times'></i> Enter atleast a user email address</strong>";
    	}
    	else if(!filter_var($invite_mail, FILTER_VALIDATE_EMAIL))
    	{
    		$html ="<strong class='text-danger'><i class='fa fa-times'></i> Enter atleast a valid email address</strong>";
    	}
    	else
    	{
    		$countQuery = User::where(['email' => $invite_mail, 'is_lawyer' => $invite_type ])->count();
    		if($countQuery > 0)
    		{
    			$getQuery = User::where(['email' => $invite_mail, 'is_lawyer' => $invite_type ])->get();
    			foreach($getQuery as $getReceiverId)
    			{
    				$receiver_id = $getReceiverId->id;
    			}

    			// count chat invitation
    			$countInvite = ChatInvitationModel::where(['sender_id' => Auth::user()->id, 'receiver_id' => $receiver_id, 'project_name' => $member_proj_name ])->count();
    			// end count chat invitation

    			if($countInvite > 0 )
    			{
    				$html = "<strong class='text-danger'><i class='fa fa-times'></i> Invitation already send  </strong>";
    			}
    			else
    			{
    				$insertArr = [
    					'sender_id' => Auth::user()->id,
    					'receiver_id' => $receiver_id,
    					'project_id' => $member_proj_id,
    					'project_name' => $member_proj_name,
    					'created_at' => date('Y-m-d H:i:s'),
    					'updated_at' => date('Y-m-d H:i:s') 
    				];

    				$insertQuery = ChatInvitationModel::insert($insertArr);
    				if($insertQuery)
    				{
    					$html = "<strong class='text-success'><i class='fa fa-check'></i> Invitation send successfully </strong>";
    				}
    				else
    				{
    					$html = "<strong class='text-danger'><i class='fa fa-times'></i> Server got an error! Try later </strong>";
    				}
    			}
    			

    		}
    		else if($countQuery == 0)
    		{
    			$html = "<strong class='text-danger'><i class='fa fa-times'></i> No user registered with this email address </strong>";
    		}
    		else
    		{
    			$html = "<strong class='text-danger'><i class='fa fa-times'></i> Server got an error! Try later </strong>";
    		}
    	}
    	echo json_encode($html);
    }

    // checking invitation table view

    public function check_invite_page_show_function()
    {
    	return view('frontend.front-pages.invite.chat-invite-page');
    }

    // invite page list content load

    public function list_content_load()
    {
    	$countQuery = ChatInvitationModel::where(['receiver_id' => Auth::user()->id, 'status' => 0])->count();
    	if($countQuery > 0)
    	{
    		$getQuery = ChatInvitationModel::where(['receiver_id' => Auth::user()->id, 'status' => 0])->orderBy('created_at','DESC')->get();
    		$html = '';
    		foreach($getQuery as $gData)
    		{
    			if($gData->readable_or == "no")
    			{
    				$show_li_class = "unseen-notify";
    			}
    			else
    			{
    				$show_li_class = "";
    			}

    			// check applied or not

    			if($gData->active_or_inActive == "yes")
    			{
    				$accept_type_btn = '<span><a class="shrt-btn rc-acpt-btn  ">Accepted</a></span>';
    			}
    			else if($gData->active_or_inActive == "no")
    			{
    				$accept_type_btn = '<br>
                           <span><a href="javascript:void(0)" onclick=chat_invite_accept('.$gData->project_id.',"'.$gData->project_name.'") class="shrt-btn acpt-btn ">Accept</a></span>
                           <span><a href="javascript:void(0)" onclick=chat_invite_decline('.$gData->project_id.',"'.$gData->project_name.'")  class="shrt-btn declin-btn">Decline</a></span>';
    			}

    			// sender name and img fetch
    			$userQuery = User::where(['id' => $gData->sender_id])->get();
    			foreach($userQuery as $uQuery)
    			{
    				$userName = $uQuery->name.' '.$uQuery->lname;
    				if($uQuery->profileImg == null)
    				{
    					$img_view = "frontAssets/images/no-img.jpg";
    				}
    				else if($uQuery->profileImg !== null)
    				{
    					$img_view = $uQuery->profileImg;
    				}
    			}
    			// end of sender name and img fetch

    			$html .= '<li class="'.$show_li_class.'">
                        <div class="left-step">
                           <div class="media">
                              <div class="close-circle"><a href="javascript: ;" onclick=closing_invite('.$gData->project_id.',"'.$gData->project_name.'")><i class="fa fa-times" aria-hidden="true"></i></a> </div>
                              <img class="md-img" src="'.$img_view.'" alt="image">                  
                              <div class="media-body">
                                 <h5><a href="javascript: ;" onclick=chat_invite_decline('.$gData->project_id.',"'.$gData->project_name.'")>'.$gData->project_name.'</a></h5>
                                 <p>you got an invitation from <b>'.$userName.'</b> </p>
                              </div>
                           </div>
                        </div>
                        <div class="right-step">
                           '.$accept_type_btn.'
                        </div>
                     </li>';
    		}
    	}
    	else if($countQuery == 0 )
    	{
    		$html = 	'<div class="no-data">
         					No data found regarding current search
        				</div>';
    	}
    	echo json_encode($html);
    }

    // unread invite when on load the page

    public function unread_on_load()
    {
    	$unreadQuery = ChatInvitationModel::where(['receiver_id' => Auth::user()->id])->update(['readable_or' => 'yes']);
    	echo json_encode("success");
    }

    // chat invite accept

    public function chat_invite_accept()
    {
    	$project_job_before_id = $_GET['p_id'];
    	$project_job_before_name = $_GET['p_name'];


    	$acceptQuery = ChatAndAcceptModel::where(['id' => $project_job_before_id, 'project_name' => $project_job_before_name])->get();
    	foreach($acceptQuery as $aQuery)
    	{
    		$totalUsers = $aQuery->total_users_ids;

    		$store_arr = array();

    		$explode_arr = explode(",",$totalUsers);
    		
    			if(in_array(Auth::user()->id, $explode_arr)){
    				foreach($explode_arr as $eArr)
    				{
    					$store_arr[] = $eArr;
    				}
    			}else if(!in_array(Auth::user()->id, $explode_arr)){
    				foreach($explode_arr as $eArr)
    				{
    					$store_arr[] = $eArr;
    				}
    				$store_arr[] = Auth::user()->id;
    			}
    		

    		// 

    		 $store_in_string = implode(",",$store_arr);

    		 // before post job
    		 $updateQuery1 = ChatAndAcceptModel::where(['id' => $project_job_before_id, 'project_name' => $project_job_before_name])->update(['total_users_ids' => $store_in_string]);

    		 // chat invite
    		 $updateQuery2 = ChatInvitationModel::where(['receiver_id' => Auth::user()->id, 'project_id' => $project_job_before_id, 'project_name' => $project_job_before_name])->update(['active_or_inActive' => 'yes']);
    		 if($updateQuery2)
    		 {
    		 	$json_resp = "success";
    		 }
    		 else
    		 {
    		 	$json_resp = "error";
    		 }

    		 echo json_encode($json_resp);

    	}
    }

    // chat invite decline

    public function chat_invite_decline()
    {
    	$project_id = $_GET['p_id'];
    	$project_name = $_GET['p_name'];
    	$receiver_id = Auth::user()->id;

    	$updateDecline = ChatInvitationModel::where(['receiver_id' => $receiver_id, 'project_id' => $project_id, 'project_name' => $project_name])->update(['status' => 1]);

    	echo json_encode("success");

    }

    // closing invite

    public function closing_invite()
    {
    	$project_id = $_GET['p_id'];
    	$project_name = $_GET['p_name'];
    	$receiver_id = Auth::user()->id;

    	$updateDecline = ChatInvitationModel::where(['receiver_id' => $receiver_id, 'project_id' => $project_id, 'project_name' => $project_name])->update(['status' => 1]);

    	echo json_encode("success");

    }

}