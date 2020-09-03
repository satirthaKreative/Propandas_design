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
use App\Models\ChatModel;
use App\Models\ChatProjectModel;
use App\Models\ChatJobQAModel;
use App\Models\FileSizeModel;
use App\Models\FileWithPriceModel;
use App\Models\chat_before_accept\ChatAndAcceptModel;

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

    	if(session('chat_reply_hide_tbl_id') && session('project_reply_hide_tbl_name') && session('project_reply_hide_tbl_id') )
    	{
    		session()->forget('chat_reply_hide_tbl_id');  
        session()->forget('project_reply_hide_tbl_name');
        session()->forget('project_reply_hide_tbl_id');
    	}

    	if(session('reply_chat_lastID_session'))
    	{
    		session()->forget('reply_chat_lastID_session');
    	}
    	return view('frontend.front-pages.chat.chat');
    }

    // sidebar chat
    public function chat_sideboard_ajax()
    {
      if(Auth::user()->is_lawyer == 1)
      {
        $querySidebar = ChatAndAcceptModel::where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->get();
      }
      else if(Auth::user()->is_lawyer == 0)
      {
        $querySidebar = DB::table('job_chat_before_accept_tbls')->groupBy('project_name')->pluck('project_name')->toArray();
      }
        
        $countSidebar = ChatAndAcceptModel::where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->count();
        $userChecking = User::where(['id' => Auth::user()->id])->get();
        foreach ($userChecking as $key_value) {
          $lawyer_status = $key_value->is_lawyer;
        }

        // count sidebar
        if($countSidebar > 0)
        {
          $html = '';
          foreach($querySidebar as $qS)
          {
            if($lawyer_status == 1)
            {
              $html .= '<div class="chat_list prject-line active_chat"><a href="javascript:;" onclick=project_chat_click('.$qS->id.',"'.$qS->project_name.'")><div class="chat_ib"><h5><i class="fa fa fa-lock" aria-hidden="true"></i>'.$qS->project_name.'</h5></div></a></div>';
            }
            else if($lawyer_status == 0)
            {
              $html .= '<div class="chat_list prject-line active_chat"><a href="javascript:;" onclick=project_click_for_client_to_lawyers_view('.Auth::user()->id.',"'.$qS.'")><div class="chat_ib"><h5><i class="fa fa fa-lock" aria-hidden="true"></i>'.$qS.'</h5></div></a></div>';
            }
          }
        }
        else if($countSidebar == 0)
        {
          $html = '<div class="no-convertion"><p>No conversation selected</p></div>';
        }
        // end of count sidebar
        echo json_encode($html);
    }

    public function chat_sideboard_client_new_ajax()
    {
      
        $querySidebar = ChatAndAcceptModel::where('project_name', $_GET['project_actual_name'])->where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->get();
        
        $countSidebar = ChatAndAcceptModel::where('project_name', $_GET['project_actual_name'])->where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->count();
        $userChecking = User::where(['id' => Auth::user()->id])->get();
        foreach ($userChecking as $key_value) {
          $lawyer_status = $key_value->is_lawyer;
        }

        // count sidebar
        if($countSidebar > 0)
        {
          $html = '';
          foreach($querySidebar as $qS)
          {
            $actual_profile_img = 'frontAssets/images/no-img.jpg';
            $userQueryNew = User::where('id',$qS->lawyer_id)->get();
            foreach($userQueryNew as $qU)
            {
              $new_user_name = $qU->name.' '.$qU->lname;

              if($qU->profileImg == null)
              {
                $actual_profile_img = 'frontAssets/images/no-img.jpg';
              }
              else
              {
                $actual_profile_img = $qU->profileImg;
              }
            }
              $html .= '<div class="chat_list prject-line active_chat"><a href="javascript:;" onclick=project_chat_click('.$qS->id.',"'.$qS->project_name.'")><div class="chat_ib includ-member">
                                     <h5>
                                         <span class="member-img">
                                          <img src="'.$actual_profile_img.'" alt="'.$new_user_name.'"> 
                                         </span> '.$new_user_name.'</h5>
                                  </div></a></div>';
            
          }
        }
        else if($countSidebar == 0)
        {
          $html = '<div class="no-convertion"><p>No conversation started</p></div>';
        }
        // end of count sidebar
        echo json_encode($html);
    }

    // side bar active project
    public function chat_active_proj_sideboard_ajax()
    {
        $querySidebar = ChatProjectModel::where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->where('work_status','<>','completed')->get();
        echo json_encode($querySidebar);
    }

    // side bar completed project
    public function chat_completed_proj_sideboard_ajax()
    {
        $querySidebar = ChatProjectModel::where('total_users_ids', 'like', '%'.Auth::user()->id.'%')->where('work_status','completed')->get();
        echo json_encode($querySidebar);
    }

    // chat show first time
    public function project_chat_ajax()
    {
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];
    	// session data
    	$sessionQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name, 'parenID' => 0])->orderBy('id','DESC')->limit(1)->get();
    		// count data
    		$countQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name, 'parenID' => 0])->count();
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
    	$queryCount = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name, 'parenID' => 0])->count();
    	if($queryCount > 0)
    	{
    		$countMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name , 'parenID' => 0])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->count();
    		if($countMainChat > 0){
    			$getMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name, 'parenID' => 0])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->get();
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
    					$mainCountReply = '<div class="rpl-box"><a href="javascript: ;" onclick=reply_thread_function('.$mainChat->id.','.$mainChat->projectID.',"'.$mainChat->projectNameID.'")>
                        <span class="rptext"><i class="fa fa-user" aria-hidden="true"></i>'.$countTotalReply.' replies</span> <span class="date-usg">'.$days.'</span></a></div>';
    				}
    				else if($countTotalReply == 0)
    				{
    					$mainCountReply = "";
    				}



    				//  end user sender details
    				if($mainChat->parenID == 0){
    					if($mainChat->msg_type == "txt"){
    						$main_content_chatting = '<p>'.$mainChat->msg_content.'</p>';
    					}else if($mainChat->msg_type == "webm" || $mainChat->msg_type == "mp4"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li><li>
                                          <video controls>
                                             <source src="'.$mainChat->msg_content.'" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                </div>';
    					}else if($mainChat->msg_type == "mpeg" || $mainChat->msg_type == "mp3"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <audio controls>
                                    <source src="'.$mainChat->msg_content.'" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($mainChat->msg_type == "jpeg" || $mainChat->msg_type == "jpg" || $mainChat->msg_type == "png" || $mainChat->msg_type == "gif"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <img src="'.$mainChat->msg_content.'" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($mainChat->msg_type == "doc" || $mainChat->msg_type == "docx" || $mainChat->msg_type == "pdf" || $mainChat->msg_type == "text"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <object data="'.$mainChat->msg_content.'" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}

    						$html .= '<div class="front-msg">
                  <div class="usg-img">
                     <img src="'.$client_img.'" alt="'.$fullname.'" title="'.$fullname.'"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>'.$fullname.'</strong></a> <span class="date-usg">'.date("H:i a",strtotime($mainChat->updated_at)).' | '.date("F d",strtotime($mainChat->updated_at)).'</span></h6>
                        '.$main_content_chatting.'
                     </div>
                     '.$mainCountReply.'
                     <div class="shrt-view">
                        <ul>
                           <li><a href="javascript: ;" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="javascript: ;" onclick=reply_thread_function('.$mainChat->id.','.$mainChat->projectID.',"'.$mainChat->projectNameID.'") class="reply-thread"  data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="javascript: ;" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>';
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
    		$mainQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name, 'parenID' => 0])->orderBy('id','DESC')->limit(1)->get();
    		
	    	foreach($mainQuery as $session_query)
	    	{
	    		$main_last_id_of_project = $session_query->id;
	    	}

	    	// session chat contraller
	    	$mainChatID = Session::get('chat_last_session_id');

	    	if($mainChatID != $main_last_id_of_project)
	    	{
	    		$getMainChat = ChatModel::where(['projectID'=>$project_id, 'projectNameID'=>$project_name, 'parenID' => 0])->where('chatting_visible_ids', 'like', '%'.Auth::user()->id.'%')->orderBy('id','DESC')->limit(1)->get();

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
    						$main_content_chatting = '<p>'.$mainChat->msg_content.'</p>';
    					}else if($mainChat->msg_type == "webm" || $mainChat->msg_type == "mp4"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li><li>
                                          <video controls>
                                             <source src="'.$mainChat->msg_content.'" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                </div>';
    					}else if($mainChat->msg_type == "mpeg" || $mainChat->msg_type == "mp3"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <audio controls>
                                    <source src="'.$mainChat->msg_content.'" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($mainChat->msg_type == "jpeg" || $mainChat->msg_type == "jpg" || $mainChat->msg_type == "png" || $mainChat->msg_type == "gif"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <img src="'.$mainChat->msg_content.'" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($mainChat->msg_type == "doc" || $mainChat->msg_type == "docx" || $mainChat->msg_type == "pdf" || $mainChat->msg_type == "text"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <object data="'.$mainChat->msg_content.'" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="'.$mainChat->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}

    						$html .= '<div class="front-msg">
                  <div class="usg-img">
                     <img src="'.$client_img.'" alt="'.$fullname.'" title="'.$fullname.'"> 
                  </div>
                  <div class="cont-msg">
                     <div class="usg-name">
                        <h6><a href="#"><strong>'.$fullname.'</strong></a> <span class="date-usg">'.date("H:i a",strtotime($mainChat->updated_at)).' | '.date("F d",strtotime($mainChat->updated_at)).'</span></h6>
                        '.$main_content_chatting.'
                     </div>
                     <div class="shrt-view">
                        <ul>
                           <li><a href="#" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></li>
                           <li><a href="javascript: ;" onclick=reply_thread_function('.$mainChat->id.','.$mainChat->projectID.',"'.$mainChat->projectNameID.'") class="reply-thread"  data-toggle="tooltip" data-placement="top" title="Start a Reply"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                           <li><a href="javascript: ;" data-toggle="tooltip" data-placement="top" title="42kb"><i class="fa fa-file-image-o" aria-hidden="true"></i></a></li>
                        </ul>
                     	</div>
                  	</div>
               	</div>';
    				}
    			}
    			// changing time 
    			$timeChangingQuery = ChatModel::where(['projectID' => $project_id, 'projectNameID' => $project_name, 'parenID' => 0])->orderBy('id','DESC')->limit(1)->get();
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
    	$countQuery = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->count();
    	if($countQuery > 0){
    		$queryGet = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
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
        $my_data_arr['all_users_details'] = $queryGet;
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

    	$getProjectUserIds = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
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

    // insert main file chat
    public function main_chat_file_insert_ajax(Request $request)
    {
    	$data_new = $request->file('attach_file_main_chat');
    	// echo  json_encode($data_new);
    	if($request->hasFile('attach_file_main_chat'))
    	{

    		$project_name = $request->input('project_name_hide');
    		$project_id = $request->input('project_id_hide');

    		$getProjectUserIds = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
    		foreach ($getProjectUserIds as $get_user_ids) {
    			$user_ids = $get_user_ids->total_users_ids;
    		}
    		$rand_var = rand(10000,99999);
    		$file = $request->file('attach_file_main_chat');
    		$file_name = $file->getClientOriginalName();
    		$file_type = $file->getClientOriginalExtension();
    		$enc_type = $file->getClientOriginalExtension();
    		$real_path = $file->getRealPath();
    		$file_size = $file->getSize();
    		$meme_type = $file->getMimeType();
    		$destinationPath = 'uploads/chat/main';
    		$file->move($destinationPath,$rand_var.$file->getClientOriginalName());

    		// chat extra

    		$count_checking_filesize = FileSizeModel::where(['project_id' => $project_id, 'project_name' => $project_name, 'user_main_id' => Auth::user()->id])->count();
    		 		$file_in_kb = (int)($file_size/1024);
    		 		if($count_checking_filesize > 0){
    		 			$get_checking_filesize = FileSizeModel::where(['project_id' => $project_id, 'project_name' => $project_name, 'user_main_id' => Auth::user()->id])->get();
    		 			foreach($get_checking_filesize as $main_file_size)
    		 			{
    		 				$client_fileSize = $main_file_size->file_size;
    		 				$actual_fileSize = $main_file_size->actual_file_size;
    		 			}
    		 			$file_size_arr = [
    		 				'file_size' => intval($file_in_kb)+intval($client_fileSize),
    		 				'updated_at' => date('Y-m-d H:i:s'),
    					];
    					$insertFilesize = FileSizeModel::where(['project_id'=> $project_id,'project_name' => $project_name,'user_main_id' => Auth::user()->id])->update($file_size_arr);
    		 		}else{
    		 			$get_actual_file_size = FileWithPriceModel::where(['id' => 1])->get();
    		 			foreach($get_actual_file_size as $getAFileSize)
    		 			{
    		 				$aproj_size = $getAFileSize->size_in_kb;
    		 			} 
    		 			$file_size_arr = [
    		 				'file_size' => $file_in_kb,
    		 				'project_id' => $project_id,
    		 				'project_name' => $project_name,
    		 				'actual_file_size' => $aproj_size,
    		 				'user_main_id' => Auth::user()->id,
    		 				'created_at' => date('Y-m-d H:i:s'),
    		 				'updated_at' => date('Y-m-d H:i:s'),
    					];
    					$insertFilesize = FileSizeModel::insert($file_size_arr);
    		 		}

    		// end of chat extra

    		 		// continue
    		 		$contineQuery = FileSizeModel::where(['project_id' => $project_id, 'project_name' => $project_name, 'user_main_id' => Auth::user()->id])->get();
    		 			foreach($contineQuery as $cQuery)
    		 			{
    		 				$continue_fileSize = $cQuery->file_size;
    		 				$continue_actual_fileSize = $cQuery->actual_file_size;
    		 			}

    	if((int)$continue_fileSize < (int)$continue_actual_fileSize){
    		 		// end of continue

    		

    		$myActualPath = $destinationPath.'/'.$rand_var.$file_name;

    		if($enc_type == 'docx'){
				$chat_type_data = "docx";    			
    		}else if($enc_type == 'txt'){
				$chat_type_data = "text";
    		}else if($enc_type == 'doc'){
				$chat_type_data = "doc";
    		}else if($enc_type == 'pdf'){
				$chat_type_data = "pdf";
    		}else if($enc_type == 'jpeg'){
				$chat_type_data = "jpeg";
    		}else if($enc_type == 'jpg'){
				$chat_type_data = "jpg";
    		}else if($enc_type == 'webp'){
				$chat_type_data = "webp";
    		}else if($enc_type == 'png'){
				$chat_type_data = "png";
    		}else if($enc_type == 'gif'){
				$chat_type_data = "gif";
    		}else if($enc_type == 'mp4'){
				$chat_type_data = "mp4";
    		}else if($enc_type == 'mpeg'){
				$chat_type_data = "mpeg";
    		}else if($enc_type == 'mp3'){
    			$chat_type_data = "mp3";	
    		}else{
    			$chat_type_data = "txt";
    		}
                       
    		
    		$insertTextChat = [
    		    		'senderID' => Auth::user()->id,
    		    		'projectID' => $project_id,
    		    		'projectNameID' => $project_name,
    		    		'msg_type' => $chat_type_data,
    		    		'msg_content' => $myActualPath,
    		    		'chatting_visible_ids' => $user_ids,
    		    		'created_at' => date('y-m-d H:i:s'),
    		    		'updated_at' => date('y-m-d H:i:s')
    		   		];

    		   		$insertTextChat = ChatModel::insert($insertTextChat);

    		 		// chatting text for file impllode
    		 		
    		   		echo json_encode("success");
    		   	}else if((int)$continue_fileSize > (int)$continue_actual_fileSize){
    		   		echo json_encode("new_payment");
    		   	}
    	}
    	else
    	{
    		echo json_encode('invalid');
    	}
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

    	$chat_full_query = ChatAndAcceptModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
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

    		$chat_full_query = ChatAndAcceptModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
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
    		$updateQueries = ChatAndAcceptModel::where(['id' => $project_id, 'project_name' => $project_name])->update(['total_users_ids' => $mine]);

    		// main data
    		$mainQueryData = ChatAndAcceptModel::where(['id' => $project_id, 'project_name' => $project_name])->get();
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

    // reply thread 
    public function chat_reply_thread_ajax()
    {
    	
    	$chat_tbl_id = $_GET['chat_tbl_id'];
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];

    	Session::put('chat_reply_hide_tbl_id', $chat_tbl_id);
    	Session::put('project_reply_hide_tbl_id', $project_id);
    	Session::put('project_reply_hide_tbl_name', $project_name);
    	// last query getting last-id
    	$count_lastIDQuery = ChatModel::where(['parenID' => $chat_tbl_id])->count();
    	if($count_lastIDQuery > 0)
    	{
    		$lastIDQuery = ChatModel::where(['parenID' => $chat_tbl_id])->orderBy('id', 'DESC')->limit(1)->get();
    		foreach($lastIDQuery as $get_last_row)
    		{
    			$lastInsertReplyId = $get_last_row->id;
    		}
    	}
    	else if($count_lastIDQuery == 0)
    	{
    		$lastInsertReplyId = "zero_select";
    	}

    	Session::put('reply_chat_lastID_session', $lastInsertReplyId);
    	
    	// chatting message 
    	$chatMainTopic = ChatModel::where(['id' => $chat_tbl_id])->get();
    	foreach($chatMainTopic as $chat_topic)
    	{
    		$msg_content = $chat_topic->msg_content;
    	}

    	// chatting wih reply tbl
    	$chattingReply = ChatModel::where(['parenID' => $chat_tbl_id])->get();
    	$chattingReplyCount = ChatModel::where(['parenID' => $chat_tbl_id])->count();
    	if($chattingReplyCount == 0)
    	{
    		$main_count_context = "No reply";
    	}
    	else if($chattingReplyCount == 1)
    	{
    		$main_count_context = "1 reply";
    	}
    	else if($chattingReplyCount > 1)
    	{
    		$main_count_context = $chattingReplyCount." replies";
    	}
    	$html = "";
    	$html .= '<div class="front-msg">
                           <div class="usg-img">
                              
                           </div>
                           <div class="cont-msg">
                              <div class="usg-name">
                                 <p>'.$msg_content.'</p>
                              </div>
                           </div>
                           <div class="reply-count">
                              <p>'.$main_count_context.'</p>
                              <hr>
                           </div>
                        </div>';
        $html .= '<div class="reply-main-chat-center">';
    	foreach($chattingReply as $chat_reply)
    	{	
    		$user_times_date = date("F d",strtotime($chat_reply->updated_at));
    		$user_times_zone = date("H:i a",strtotime($chat_reply->updated_at));

    		if($chat_reply->msg_type == "txt"){
    						$main_content_chatting = '<p>'.$chat_reply->msg_content.'</p>';
    					}else if($chat_reply->msg_type == "webm" || $chat_reply->msg_type == "mp4"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li><li>
                                          <video controls>
                                             <source src="'.$chat_reply->msg_content.'" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="'.$chat_reply->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                </div>';
    					}else if($chat_reply->msg_type == "mpeg" || $chat_reply->msg_type == "mp3"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <audio controls>
                                    <source src="'.$chat_reply->msg_content.'" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="'.$chat_reply->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($chat_reply->msg_type == "jpeg" || $chat_reply->msg_type == "jpg" || $chat_reply->msg_type == "png" || $chat_reply->msg_type == "gif"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <img src="'.$chat_reply->msg_content.'" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="'.$chat_reply->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($chat_reply->msg_type == "doc" || $chat_reply->msg_type == "docx" || $chat_reply->msg_type == "pdf" || $chat_reply->msg_type == "text"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <object data="'.$chat_reply->msg_content.'" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="'.$chat_reply->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}

    		$userQuery = User::where("id",$chat_reply->senderID)->get();
    		foreach($userQuery as $userQueryOne)
    		{
    			if($userQueryOne->profileImg == "")
    			{
    				$user_img = 'frontAssets/images/no-img.jpg';
    			}else{
    				$user_img = $userQueryOne->profileImg;
    			}

    			$user_full_name = $userQueryOne->name." ".$userQueryOne->lname;
    		}
    		$html .= '<div class="front-msg">
                           <div class="usg-img">
                              <img src="'.$user_img.'" alt="'.$user_full_name.'"> 
                           </div>
                           <div class="cont-msg">
                              <div class="usg-name">
                                 <h6><a href="#"><strong>'.$user_full_name.'</strong></a> <span class="date-usg">'.$user_times_zone.' | '.$user_times_date.'</span></h6>
                                 '.$main_content_chatting.'
                              </div>
                           </div>
                      </div>';
    	}
    	$html .= '</div>';
    	$html .= '<div class="type_msg">
                        <div class="input_msg_write">
                           <form id="reply-chat-file-id" enctype="multipart/form-data" method="POST">
                           	<input type="hidden" id="reply-hide-proj-id" name="reply_hide_proj_id" value="" />
                           	<input type="hidden" id="reply-hide-chat-id" name="reply_hide_chat_id" value="" />
                           	<input type="hidden" id="reply-hide-proj-name" name="reply_hide_proj_name" value="" />
                              <textarea id="reply-chat-main-text" name="reply_chat_main_text" class="form-control write_msg" placeholder="Type your message..."></textarea>
                              <div class="setd-tag">
                                 <div class="attach-icn" data-toggle="tooltip" data-placement="top" title="Attach file">
                                    <input type="file" name="attach_file_reply_chat"  id="attach-file-main-reply-id" onchange="attached_file_reply_change()">
                                    <span class="file-span"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                                 </div>
                                 <button class="msg_send_btn" type="button" id="msg-reply-text-btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                     </div>';
    	$completeHtml = $html; 
    	// end of chatting reply tbl

    	echo json_encode($completeHtml);
    }
    // end of reply thread

    // insert reply thread
    public function insert_rly_chat_ajax()
    {
    	$project_id = $_GET['proj_id'];
    	$project_name = $_GET['proj_name'];
    	$main_text = $_GET['main_text'];
    	$chat_tbl_id = $_GET['chat_tbl_id'];


    	$getProjectUserIds = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
    	foreach ($getProjectUserIds as $get_user_ids) {
    		$user_ids = $get_user_ids->total_users_ids;
    	}

    	$insertTextChat = [
    		'senderID' => Auth::user()->id,
    		'projectID' => $project_id,
    		'projectNameID' => $project_name,
    		'msg_type' => "txt",
    		'msg_content' => $main_text,
    		'parenID' => $chat_tbl_id,
    		'chatting_visible_ids' => $user_ids,
    		'created_at' => date('y-m-d H:i:s'),
    		'updated_at' => date('y-m-d H:i:s')
   		];

   		$insertTextChat = ChatModel::insert($insertTextChat);

   		echo json_encode("success");
    }
    // reply file insert
    public function reply_chat_file_insert_ajax(Request $request)
    {
    	$project_id = $request->input('reply_hide_proj_id');
    	$project_name = $request->input('reply_hide_proj_name');
    	$chat_tbl_id = $request->input('reply_hide_chat_id');

    		$rand_var = rand(10000,99999);
    		$file = $request->file('attach_file_reply_chat');
    		$file_name = $file->getClientOriginalName();
    		$file_type = $file->getClientOriginalExtension();
    		$enc_type = $file->getClientOriginalExtension();
    		$real_path = $file->getRealPath();
    		$file_size = $file->getSize();
    		$meme_type = $file->getMimeType();
    		$destinationPath = 'uploads/chat/reply';
    		$file->move($destinationPath,$rand_var.$file->getClientOriginalName());

    		$myActualPath = $destinationPath.'/'.$rand_var.$file_name;

    		if($enc_type == 'docx'){
				$chat_type_data = "docx";    			
    		}else if($enc_type == 'txt'){
				$chat_type_data = "text";
    		}else if($enc_type == 'doc'){
				$chat_type_data = "doc";
    		}else if($enc_type == 'pdf'){
				$chat_type_data = "pdf";
    		}else if($enc_type == 'jpeg'){
				$chat_type_data = "jpeg";
    		}else if($enc_type == 'jpg'){
				$chat_type_data = "jpg";
    		}else if($enc_type == 'webp'){
				$chat_type_data = "webp";
    		}else if($enc_type == 'png'){
				$chat_type_data = "png";
    		}else if($enc_type == 'gif'){
				$chat_type_data = "gif";
    		}else if($enc_type == 'mp4'){
				$chat_type_data = "mp4";
    		}else if($enc_type == 'mpeg'){
				$chat_type_data = "mpeg";
    		}else if($enc_type == 'mp3'){
    			$chat_type_data = "mp3";	
    		}else{
    			$chat_type_data = "txt";
    		}
    	$getProjectUserIds = ChatAndAcceptModel::where(['id'=>$project_id, 'project_name'=>$project_name])->get();
    	foreach ($getProjectUserIds as $get_user_ids) {
    		$user_ids = $get_user_ids->total_users_ids;
    	}

    	$insertTextChat = [
    		'senderID' => Auth::user()->id,
    		'projectID' => $project_id,
    		'projectNameID' => $project_name,
    		'msg_type' => $chat_type_data,
    		'msg_content' => $myActualPath,
    		'parenID' => $chat_tbl_id,
    		'chatting_visible_ids' => $user_ids,
    		'created_at' => date('y-m-d H:i:s'),
    		'updated_at' => date('y-m-d H:i:s')
   		];

   		$insertTextChat = ChatModel::insert($insertTextChat);



   		echo json_encode("success");
    }
    // end of reply thread

    // loading every second on chatting reply
    public function every_sec_ajax_reply()
    {
    	
    	if(session('chat_reply_hide_tbl_id') && session('project_reply_hide_tbl_name') && session('project_reply_hide_tbl_id') && session('reply_chat_lastID_session'))
    	{

    		$main_chat_tbl_id = Session::get('chat_reply_hide_tbl_id');
    		$the_last_reply_id = Session::get('reply_chat_lastID_session');

    		if($the_last_reply_id != "zero_select"){
	    		$lastIDQuery = ChatModel::where(['parenID' => $main_chat_tbl_id])->orderBy('id', 'DESC')->limit(1)->get();
	    		$countTestlastIDQuery = ChatModel::where(['parenID' => $main_chat_tbl_id])->count();
	    		foreach($lastIDQuery as $get_last_row)
	    		{
	    			$lastInsertReplyId = $get_last_row->id;
	    		}

	    		if($the_last_reply_id == $lastInsertReplyId){
	    			$mainReturnData['main_msg'] = 'no_response'; 
	    		}else if($the_last_reply_id != $lastInsertReplyId){
	    			Session::put('reply_chat_lastID_session', $lastInsertReplyId);
	    			$lastIDQueryExec = ChatModel::where(['id' => $lastInsertReplyId])->get();
	    			foreach($lastIDQueryExec as $execLastID)
	    			{

	    				$lastMsgReplyDetails = $execLastID->msg_content;
	    				if($execLastID->msg_type == "txt"){
    						$main_content_chatting = '<p>'.$execLastID->msg_content.'</p>';
    					}else if($execLastID->msg_type == "webm" || $execLastID->msg_type == "mp4"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li><li>
                                          <video controls>
                                             <source src="'.$execLastID->msg_content.'" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                </div>';
    					}else if($execLastID->msg_type == "mpeg" || $execLastID->msg_type == "mp3"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <audio controls>
                                    <source src="'.$execLastID->msg_content.'" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($execLastID->msg_type == "jpeg" || $execLastID->msg_type == "jpg" || $execLastID->msg_type == "png" || $execLastID->msg_type == "gif"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <img src="'.$execLastID->msg_content.'" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($execLastID->msg_type == "doc" || $execLastID->msg_type == "docx" || $execLastID->msg_type == "pdf" || $execLastID->msg_type == "text"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <object data="'.$execLastID->msg_content.'" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}
	    				// users start
	    				$user_times_date = date("F d",strtotime($execLastID->updated_at));
	    				$user_times_zone = date("H:i a",strtotime($execLastID->updated_at));
	    				$userQuery = User::where("id",$execLastID->senderID)->get();
	    				foreach($userQuery as $userQueryOne)
	    				{
	    					if($userQueryOne->profileImg == "")
	    					{
	    						$user_img = 'frontAssets/images/no-img.jpg';
	    					}else{
	    						$user_img = $userQueryOne->profileImg;
	    					}

	    					$user_full_name = $userQueryOne->name." ".$userQueryOne->lname;
	    				}
	    				// ending the users
	    			}
	    			$mainReturnData['main_msg'] = 'response';
	    			$mainReturnData['my_content'] = '<div class="front-msg">
	                           <div class="usg-img">
	                              <img src="'.$user_img.'" alt="'.$user_full_name.'"> 
	                           </div>
	                           <div class="cont-msg">
	                              <div class="usg-name">
	                                 <h6><a href="#"><strong>'.$user_full_name.'</strong></a> <span class="date-usg">'.$user_times_zone.' | '.$user_times_date.'</span></h6>
	                                 '.$main_content_chatting.'
	                              </div>
	                           </div>
	                      </div>';

	    		}
	    		$mainReturnData['main_count_part'] = $countTestlastIDQuery;
	    		echo json_encode($mainReturnData);
    		}else if($the_last_reply_id == "zero_select"){
    			
	    		$countTestlastIDQuery = ChatModel::where(['parenID' => $main_chat_tbl_id])->count();
	    		if($countTestlastIDQuery > 0){
	    			$lastIDQuery = ChatModel::where(['parenID' => $main_chat_tbl_id])->orderBy('id', 'DESC')->limit(1)->get();
	    		foreach($lastIDQuery as $get_last_row)
	    		{
	    			$lastInsertReplyId = $get_last_row->id;
	    		}

	    		if($the_last_reply_id == $lastInsertReplyId){
	    			$mainReturnData['main_msg'] = 'no_response'; 
	    		}else if($the_last_reply_id != $lastInsertReplyId){
	    			Session::put('reply_chat_lastID_session', $lastInsertReplyId);
	    			$lastIDQueryExec = ChatModel::where(['id' => $lastInsertReplyId])->get();
	    			foreach($lastIDQueryExec as $execLastID)
	    			{

	    				$lastMsgReplyDetails = $execLastID->msg_content;
	    				if($execLastID->msg_type == "txt"){
    						$main_content_chatting = '<p>'.$execLastID->msg_content.'</p>';
    					}else if($execLastID->msg_type == "webm" || $execLastID->msg_type == "mp4"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li><li>
                                          <video controls>
                                             <source src="'.$execLastID->msg_content.'" type="video/mp4">
                                          </video>
                                          <div class="upld-btn">
                                             <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                                       </li>
                                    </ul>
                                </div>';
    					}else if($execLastID->msg_type == "mpeg" || $execLastID->msg_type == "mp3"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <audio controls>
                                    <source src="'.$execLastID->msg_content.'" type="audio/mpeg">
                                 </audio>
                                 <div class="upld-btn">
                                    <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($execLastID->msg_type == "jpeg" || $execLastID->msg_type == "jpg" || $execLastID->msg_type == "png" || $execLastID->msg_type == "gif"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <img src="'.$execLastID->msg_content.'" alt="images" class="img-fluid">
                                          <div class="upld-btn">
                                             <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                          </div>
                              </li>
                              </ul>
                            </div>';
    					}else if($execLastID->msg_type == "doc" || $execLastID->msg_type == "docx" || $execLastID->msg_type == "pdf" || $execLastID->msg_type == "text"){
    						$main_content_chatting = '<div class="upload-kit"><ul><li>
                                 <object data="'.$execLastID->msg_content.'" width="300" height="200"></object>                       
                                 <div class="upld-btn">
                                    <span><a href="'.$execLastID->msg_content.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a></span>
                                 </div>
                              </li>
                              </ul>
                            </div>';
    					}
	    				// users start
	    				$user_times_date = date("F d",strtotime($execLastID->updated_at));
	    				$user_times_zone = date("H:i a",strtotime($execLastID->updated_at));
	    				$userQuery = User::where("id",$execLastID->senderID)->get();
	    				foreach($userQuery as $userQueryOne)
	    				{
	    					if($userQueryOne->profileImg == "")
	    					{
	    						$user_img = 'frontAssets/images/no-img.jpg';
	    					}else{
	    						$user_img = $userQueryOne->profileImg;
	    					}

	    					$user_full_name = $userQueryOne->name." ".$userQueryOne->lname;
	    				}
	    				// ending the users
	    			}
	    			$mainReturnData['main_msg'] = 'response';
	    			$mainReturnData['my_content'] = '<div class="front-msg">
	                           <div class="usg-img">
	                              <img src="'.$user_img.'" alt="'.$user_full_name.'"> 
	                           </div>
	                           <div class="cont-msg">
	                              <div class="usg-name">
	                                 <h6><a href="#"><strong>'.$user_full_name.'</strong></a> <span class="date-usg">'.$user_times_zone.' | '.$user_times_date.'</span></h6>
	                                 '.$main_content_chatting.'
	                              </div>
	                           </div>
	                      </div>';

	    		}
	    		$mainReturnData['main_count_part'] = $countTestlastIDQuery;
	    		echo json_encode($mainReturnData);
    		}else{
    			$mainReturnData['main_msg'] = 'no_response';
    			echo json_encode($mainReturnData); 
    		}
    		}
    	}
    }
    // ending loading every seconds on reply

    // paypal add more size
    public function paypal_add_file_size()
    {
    	$proj_name = $_GET['proj_name'];
    	$proj_id = $_GET['proj_id'];

    	// main add size - price
    	$query = FileWithPriceModel::where('id',1)->get();
    	foreach($query as $q1){
    		$file_size = $q1->size_in_kb;
    	}
    	// end of main size - price
    	$contineQuery = FileSizeModel::where(['project_id' => $proj_id, 'project_name' => $proj_name, 'user_main_id' => Auth::user()->id])->get();
    		foreach($contineQuery as $cQuery)
    		{
    			$continue_fileSize = $cQuery->file_size;
    			$continue_actual_fileSize = $cQuery->actual_file_size;
    		}
    		$total_file_size = (int)$continue_actual_fileSize+(int)$file_size;

    	$updateQuery = FileSizeModel::where(['project_id' => $proj_id, 'project_name' => $proj_name, 'user_main_id' => Auth::user()->id])->update(['actual_file_size' => $total_file_size]);
    	echo json_encode("success");
    }
    // paypal end
}