<?php

namespace App\Http\Controllers\front;


use App\User;
use App\ProposalSendModel;
use App\AdminSystemMsgModel;
use App\JobAnswerClinetDescModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SystemMsgController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.system-msg');
    }

    public function all_msg_show()
    {
    	$query = DB::table('users')->leftJoin('system_msg_tbl','system_msg_tbl.client_or_lawyer_id', '=', 'users.id')->select('system_msg_tbl.updated_at as systemDate','system_msg_tbl.id as sysMsgId','system_msg_tbl.*','users.*')->orderBy('system_msg_tbl.updated_at','desc')->where(['users.id' => Auth::user()->id, 'system_msg_tbl.status_system' => 1])->get();
    	$html = '';
    	if(count($query) > 0)
    	{
    		foreach($query as $get_data)
    		{
    			if($get_data->project_name == null)
    			{
    				$administrator_msg = "Administrator alert message";
    			}
    			else 
    			{
    				$administrator_msg = "Administrator message on ".$get_data->project_name." project";
    			}



    			if(strlen($get_data->administrator_msg) > 200)
    			{
    				$msg = substr($get_data->administrator_msg,0,200)."...";
    			}
    			else
    			{
    				$msg = $get_data->administrator_msg;
    			}

    			if($get_data->unseen_status == 0)
    			{
    				$seen_status_class = "unread-notify";
    			}
    			else
    			{
    				$seen_status_class = "read-notify";
    			}

    			$html .= '<li class="'.$seen_status_class.'">
                      <div class="left-step">                        
                  		<div class="media">
                  			 <a href="javascript: ;" onclick="close_system_msg('.$get_data->sysMsgId.')"><div class="close-circle"><i class="fa fa-times" aria-hidden="true"></i></div></a>                        
                  			  <div class="media-body">
                  			  	 <h5><a href="/current-system-message-details/'.base64_encode($get_data->sysMsgId).'">'.$administrator_msg.'</a></h5>
                  			  	 <p><a href="/current-system-message-details/'.base64_encode($get_data->sysMsgId).'">'.$msg.'</a></p>
                  			  </div>
                  		</div>
                  	</div>

                  	 <div class="right-step">                     
                           <span class="date-text">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>'.date("Y/m/d",strtotime($get_data->systemDate)).'
                           </span>
                        </div> 
                  </li>';
    		}
    	}
    	else
    	{
    		$html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No data according to search</h5></li>';
    	}

    	echo json_encode($html);
    }

    // cuurent system msg view
    public function single_view()
    {
    	return view('frontend.front-pages.system-msg-single-view');
    }

    // single view ajax
    public function single_msg_ajax()
    {
   		$get_data_id = $_GET['system_id'];

   		$msg_full_view_ajax = AdminSystemMsgModel::where(['id' => $get_data_id])->get();

   		echo json_encode($msg_full_view_ajax);
    }

    // unseen to seen
    public function unseen_to_seen_function()
    {
    	$get_data_id = $_GET['system_id'];

    	$update = DB::table('system_msg_tbl')->where(['id' => $get_data_id])->update(['unseen_status' => 1]);
    	echo json_encode('success');
    }

    // notify system message
    public function unread_system_msg_count()
    {
    	$query_count = AdminSystemMsgModel::where(['client_or_lawyer_id' => Auth::user()->id])->count();

    	// count unread msg
    	$session_msg_system_count = Session::get('system_msg_id');
    	if($session_msg_system_count != $query_count)
    	{
    		$count_system_msg = ($query_count-$session_msg_system_count);
    	}
    	else
    	{
    		$count_system_msg = 0;
    	}
    	echo json_encode($count_system_msg);

    }

    //  session create system message
    public function count_system_msg_session()
    {
    	$query_count = AdminSystemMsgModel::where(['client_or_lawyer_id' => Auth::user()->id])->count();
    	Session::put('system_msg_id', $query_count);
    	echo json_encode($query_count);
    }

    // close system message
    public function close_system_msg()
    {
   		$msg_id = $_GET['id'];

   		$query_count = AdminSystemMsgModel::where(['id' => $msg_id])->update(['status_system' => 0]);
   		echo json_encode($query_count);

    }
}
