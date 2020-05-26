<?php

namespace App\Http\Controllers\front\clientDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.client.notification');
    }

    public function all_notification()
    {
    	$notify_data = DB::table('notification_tbl')
    						->leftJoin('jobanswerclinetdesc','jobanswerclinetdesc.id','=','notification_tbl.project_id')
    						->leftJoin('admincategories','admincategories.id', '=', 'jobanswerclinetdesc.category_id')
    						->leftJoin('users','users.id','=','notification_tbl.client_id')
    						->select('*','users.id as mainId','notification_tbl.created_at as actual_date','notification_tbl.id as propandasId','notification_tbl.notify_type as main_notification_type')
    						->where('users.id',Auth::user()->id)
    						->where('notification_tbl.active_status',1)
    						->orderBy('notification_tbl.created_at','DESC')
    						->get();
    	
    	echo json_encode($notify_data);
    }

    public function current_notification()
    {
    	return view('frontend.front-pages.client.single-notification');
    }

    public function single_full_view()
    {
    	$main_content['proposal_data'] = DB::table('notification_tbl')->where('id',$_GET['data'])->get();
    	$notify_data = DB::table('notification_tbl')->where('id',$_GET['data'])->get();
    	foreach ($notify_data as $key_value) {
            if($key_value->unread_status == 'unread'){
                $update_data = DB::table('notification_tbl')->where('id',$_GET['data'])->update(['unread_status' => 'read']);
            }
    		$main_content['user_data'] = DB::table('users')->where('id',$key_value->lawyer_id)->get();
    	}

    	echo json_encode($main_content);

    }

    public function remove_notification()
    {
    	$update_data = DB::table('notification_tbl')->where('id',$_GET['data'])->update(['active_status' => 0]);
    	echo json_encode('success');
    }

    public function unread_notify_count(){
        $notify_data = DB::table('notification_tbl')
                            ->leftJoin('jobanswerclinetdesc','jobanswerclinetdesc.id','=','notification_tbl.project_id')
                            ->leftJoin('admincategories','admincategories.id', '=', 'jobanswerclinetdesc.category_id')
                            ->leftJoin('users','users.id','=','notification_tbl.client_id')
                            ->select('*','users.id as mainId','notification_tbl.created_at as actual_date','notification_tbl.id as propandasId')
                            ->where('users.id',Auth::user()->id)
                            ->where('notification_tbl.active_status',1)
                            ->where('notification_tbl.unread_status','unread')
                            ->orderBy('notification_tbl.created_at','DESC')
                            ->count();
        echo json_encode($notify_data);
    }
}