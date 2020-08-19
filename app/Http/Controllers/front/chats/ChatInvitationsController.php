<?php

namespace App\Http\Controllers\front\chats;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\chat_invitations\ChatInvitationModel;

class ChatInvitationsController extends Controller
{
    // chat invitations

    public function index()
    {
    	$invite_type = $_GET['invite_user_type'];
    	$invite_mail = $_GET['invite_user_email'];

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
    			$countInvite = ChatInvitationModel::where(['sender_id' => Auth::user()->id, 'receiver_id' => $receiver_id ])->count();
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

}