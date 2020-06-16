<?php

namespace App\Http\Controllers\front\chats;

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
use App\models\ChatModel;
use App\models\ChatProjectModel;
use App\models\ChatJobQAModel;

class ChatController extends Controller
{
    //  chating view page 

    public function index()
    {
    	if(session('project_chat_session_id') && session('project_chat_session_name') && session('chat_last_session_id'))
    	{
    		session()->forget('project_chat_session_id');  
            session()->forget('project_chat_session_name');
            session()->forget('chat_last_session_id');
    	}
    	return view('frontend.front-pages.chat.chat');
    }

    // sidebar chat
    public function chat_sideboard_ajax()
    {
        $querySidebar = ChatProjectModel::where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->get();
        echo json_encode($querySidebar);
    }

    // chat show first time
    public function project_chat_ajax()
    {
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];
    	// session data
    	$sessionQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name])->orderBy('id','DESC')->limit(1)->get();
    		// count data
    		$countQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name])->count();
    	if($countQuery > 0)
    	{
    		foreach($sessionQuery as $session_query)
    		{
    			$main_last_id_of_project = $session_query->id;
    			Session::put('chat_last_session_id', $main_last_id_of_project);
    		}
    		Session::put('project_chat_session_id', $project_id);
    		Session::put('project_chat_session_name', $project_name);
    	}
    	
    	// Session data
    	$queryCount = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name])->count();
    	if($queryCount > 0)
    	{
    		$countMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->count();
    		if($countMainChat > 0){
    			$getMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->get();
    			$html = '';
    			foreach($getMainChat as $mainChat){
    				$getUser = User::where('id',$mainChat->senderID)->get();
    				// sender user details
    				foreach($getUser as $currentClient){
    					$user_fname = $currentClient->name;
    					$user_lname = $currentClient->lname;

    					$fullname = $user_fname." ".$user_lname;

    					if($currentClient->profileImg == ""){
    						$client_img = 'frontAssets/images/no-img.jpg';
    					}else{
    						$client_img = $currentClient->profileImg;
    					}
    				}
    				// Query time of counting 
    				$countTotalReply = ChatModel::where('parenID',$mainChat->id)->count();
    				if($countTotalReply > 0)
    				{
    					$lastParentIDQuery = ChatModel::where('parenID',$mainChat->id)->orderBy('id','DESC')->limit(1)->get();
    					foreach($lastParentIDQuery  as $lastKindParent)
    					{

    						$now = time(); // or your date as well
    						$dateOne = date('Y-m-d',strtotime($lastKindParent->updated_at));
    						$your_date = strtotime($dateOne);
    						$current_date = strtotime(date('Y-m-d'));
    						$datediff = $now - $your_date;

    						$days_count =  round($datediff / (60 * 60 * 24));

    						if($your_date == $current_date)
    						{
    							$days = "Last reply on today";
    						} 
    						else if($days_count == 1)
    						{
    							$days = "Last reply 1 day ago";
    						}
    						else if($days_count == 2)
    						{
    							$days = "Last reply 2 days ago";
    						}
    						else
    						{
    							$days = "Last reply on '".$dateOne."'";
    						}
    					}
    					$mainCountReply = '<div class="rpl-box"><a href="#">
                        <span class="rptext"><i class="fa fa-user" aria-hidden="true"></i>'.$countTotalReply.' replies</span> <span class="date-usg">'.$days.'</span></a></div>';
    				}
    				else if($countTotalReply == 0)
    				{
    					$mainCountReply = "";
    				}
    				//  end user sender details
    				if($mainChat->parenID == 0){
    					if($mainChat->msg_type == "txt"){
    						$html .= '<div class="front-msg">
                  <div class="usg-img">
                     <img src="'.$client_img.'" alt="'.$fullname.'" title="'.$fullname.'"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>'.$fullname.'</strong></a> <span class="date-usg">'.date("H:i a",strtotime($mainChat->updated_at)).' | '.date("F d",strtotime($mainChat->updated_at)).'</span></h6>
                        <p>'.$mainChat->msg_content.'</p>
                     </div>
                     '.$mainCountReply.'
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>';
    					}
    				}
    			}
    			echo json_encode($html);
    		}else{
    			echo json_encode("no_data");
    		}
    	}
    	else
    	{
    		echo json_encode("no_data");
    	}
    }

    // loading every time if new msgs are arriving

    public function every_second_chat_loading()
    {
    	if(session('project_chat_session_id') && session('project_chat_session_name') && session('chat_last_session_id'))
    	{
    		// project variables 
    		$project_id = Session::get('project_chat_session_id');
    		$project_name = Session::get('project_chat_session_name');
    		// end of project variables
    		$mainQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name])->orderBy('id','DESC')->limit(1)->get();
    		
	    	foreach($mainQuery as $session_query)
	    	{
	    		$main_last_id_of_project = $session_query->id;
	    	}

	    	// session chat contraller
	    	$mainChatID = Session::get('chat_last_session_id');

	    	if($mainChatID != $main_last_id_of_project)
	    	{
	    		$getMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->orderBy('id','DESC')->limit(1)->get();

    			$html = '';
    			foreach($getMainChat as $mainChat){
    				$getUser = User::where('id',$mainChat->senderID)->get();
    				// sender user details
    				foreach($getUser as $currentClient){
    					$user_fname = $currentClient->name;
    					$user_lname = $currentClient->lname;

    					$fullname = $user_fname." ".$user_lname;

    					if($currentClient->profileImg == ""){
    						$client_img = 'frontAssets/images/no-img.jpg';
    					}else{
    						$client_img = $currentClient->profileImg;
    					}
    				}
    				//  end user sender details
    				if($mainChat->parenID == 0){
    					if($mainChat->msg_type == "txt"){
    						$html .= '<div class="front-msg">
                  <div class="usg-img">
                     <img src="'.$client_img.'" alt="'.$fullname.'" title="'.$fullname.'"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>'.$fullname.'</strong></a> <span class="date-usg">'.date("H:i a",strtotime($mainChat->updated_at)).' | '.date("F d",strtotime($mainChat->updated_at)).'</span></h6>
                        <p>'.$mainChat->msg_content.'</p>
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     	</div>
                  	</div>
               	</div>';
    					}
    				}
    			}
    			// changing time 
    			$timeChangingQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name])->orderBy('id','DESC')->limit(1)->get();
    			foreach($timeChangingQuery as $changingTimeQuery){
    				Session::put('chat_last_session_id', $changingTimeQuery->id);
    				Session::put('project_chat_session_id', $project_id);
    				Session::put('project_chat_session_name', $project_name);
    			}
    			// end changing time 
    			echo json_encode($html);
	    	}else{
	    		echo json_encode("no_data");
	    	}
    	}else{
    		echo json_encode("no_data");
    	}
    }

    // end of loading time

    // count total members of chat-top
    public function count_chat_member_ajax()
    {
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];
    	$countQuery = ChatProjectModel::where(['id'=>$project_id, 'project_name'=>$project_name])->count();
    	if($countQuery > 0){
    		$queryGet = ChatProjectModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
    		foreach($queryGet as $queryOne)
    		{
    			$myData = $queryOne->total_users_ids;

    			$my_data_explode = explode(",",$myData);

    			$k = 0;
    			$my_data_arr0 = array();
    			foreach ($my_data_explode as $key_value) {
    				array_push($my_data_arr0, $key_value);
    				$k++;
    			}
    			$my_data_arr['client_and_lawyer_id'] = $my_data_arr0;
    			$my_data_arr['count_total'] = $k;
    		}
    	}else{

    	}
    	echo json_encode($my_data_arr);
    }

    // insert text type chat
    public function insert_chat_text_add_ajax()
    {
    	$project_id = $_GET['proj_id'];
    	$project_name = $_GET['proj_name'];
    	$main_text = $_GET['main_text'];

    	$getProjectUserIds = ChatProjectModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
    	foreach ($getProjectUserIds as $get_user_ids) {
    		$user_ids = $get_user_ids->total_users_ids;
    	}

    	$insertTextChat = [
    		'senderID' => Auth::user()->id,
    		'projectID' => $project_id,
    		'projectNameID' => $project_name,
    		'msg_type' => "txt",
    		'msg_content' => $main_text,
    		'chatting_visible_ids' => $user_ids,
    		'created_at' => date('y-m-d H:i:s'),
    		'updated_at' => date('y-m-d H:i:s')
   		];

   		$insertTextChat = ChatModel::insert($insertTextChat);

   		echo json_encode("success");
    }

    // adding chat members
    public function add_member_to_chat()
    {
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];

    	// members of array on client/lawyer
    		$clinet_Arr = array();
    		$lawyer_Arr = array();
    	// end of members of array

    	$chat_full_query = ChatProjectModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
    	foreach($chat_full_query as $main_content)
    	{
    		$explode_content = explode(",",$main_content->total_users_ids);
    		foreach($explode_content as $main_users)
    		{
    			$user_data = User::where('id',$main_users)->get();
    			foreach($user_data as $user_ids)
    			{
    				if($user_ids->is_lawyer == 0)
    				{
    					array_push($clinet_Arr, $user_ids->id);
    				}
    				else if($user_ids->is_lawyer == 1)
    				{
    					array_push($lawyer_Arr, $user_ids->id);
    				}
    			}
    		}
    	}
    	// users id chating client array
    	
    	$clientAvailableQuery = User::whereNotIn('id', $clinet_Arr)->where('is_lawyer',0)->get();
    	$html = '';
    	foreach($clientAvailableQuery as $clientZero)
    	{
    		$html .= '<option value="'.$clientZero->id.'">'.$clientZero->name.' '.$clientZero->lname.'</option>';
    	}
    	$data['avail_client_arr'] = $html;

    	// users id chating lawyer array
    	
    	$lawyerAvailableQuery = User::whereNotIn('id', $lawyer_Arr)->where('is_lawyer',1)->get();
    	$html1 = '';
    	foreach($lawyerAvailableQuery as $lawyerZero)
    	{
    		$html1 .= '<option value="'.$lawyerZero->id.'">'.$lawyerZero->name.' '.$lawyerZero->lname.'</option>';
    	}
    	$data['avail_lawyer_arr'] = $html1;

    	echo json_encode($data);
    }


    // adding chatting 
    public function adding_members_form_chatting()
    {
    	if(session('project_chat_session_id') && session('project_chat_session_name'))
    	{
    		// project variables 
    		$project_id = Session::get('project_chat_session_id');
    		$project_name = Session::get('project_chat_session_name');

    		$chat_full_query = ChatProjectModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
    		foreach($chat_full_query as $chatOne){
    			$pre_ids = $chatOne->total_users_ids;
    		}


    		$elements = array($pre_ids);

    		if(isset($_GET['chat_rest_client_name'])){
    			foreach($_GET['chat_rest_client_name'] as $arrOne) {
    			    //do something
    			    $elements[] = $arrOne;
    			}
    		}

    		if(isset($_GET['chat_rest_lawyer_name'])){
    			foreach($_GET['chat_rest_lawyer_name'] as $arrTwo) {
    			    //do something
    			    $elements[] = $arrTwo;
    			}
    		}
    		$mine = implode(',', $elements);
    		
    		// update data 
    		$updateQueries = ChatProjectModel::where(['id' => $project_id, 'project_name' => $project_name])->update(['total_users_ids' => $mine]);

    		// main data
    		$mainQueryData = ChatProjectModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
    		foreach($mainQueryData as $qData)
    		{
    			$users_all_id = $qData->total_users_ids;

    			$myExplodeOne = explode(",",$users_all_id);

    			$k = 0;
    			foreach($myExplodeOne as $myOneArray){
    				$k++;
    			}

    			echo json_encode($k);
    		}
    	}
    }


}