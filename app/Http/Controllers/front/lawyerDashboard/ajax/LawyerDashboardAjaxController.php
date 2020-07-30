<?php

namespace App\Http\Controllers\front\lawyerDashboard\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ProposalSendModel;
use App\NotificationModel;
use App\JobAnswerClinetDescModel;
use App\User;

class LawyerDashboardAjaxController extends Controller
{
    //


    public function index(){
     
      $data = $_GET['data'];
      $url_encode_id = base64_encode($data);
      $html = '';
    	$selectResultQuery = DB::table('jobanswerclinetdesc')->where('id',$data)->get();
    	foreach($selectResultQuery as $newQ)
    	{
        


        $clientQuery = DB::table('users')->where('id',$newQ->client_id)->get();
          foreach($clientQuery as $user_name_via)
          {
            if($user_name_via->profileImg != '' || $user_name_via->profileImg != null)
            {
              $newImg = $user_name_via->profileImg;
            }else{
              $newImg = "frontAssets/images/no-img.jpg";
            }

            $client_name = "Client Name : ".$user_name_via->name." ".$user_name_via->lname;
            if($newQ->phone_number == 91){
              $client_phone = "";
            }else{
              $client_phone = "<p>Contact Number : <a href='tel:".$newQ->phone_number."'>".$newQ->phone_number."</a></p>";
            }
            
            $client_email = "Email Address : <a href='mailto:".$user_name_via->email."'>".$user_name_via->email."</a>";
            $html .= '<img class="md-img" src="'.asset($newImg).'" alt="image"><div class="media-body"><div class="back-page"><a href="/posted-jobs"><i class="fa fa-arrow-left" aria-hidden="true"></i>back</a></div>';
        }


        $cate_id_main = $newQ->category_id;
        $selectCategoryQuery = DB::table('admincategories')->where('id',$cate_id_main)->get();
        foreach($selectCategoryQuery as $cate_name_data)
        {
          $html .= "<h5>Job Id : ".$newQ->projectId." <small>(".$cate_name_data->category_name." Job)</small></h5><p>".$cate_name_data->category_title."</p><p>".$cate_name_data->category_description."</p>";
        }
        
        $html .= '<p><strong>Client Personal Details</strong></p><p>'.$client_name.'</p>'.$client_phone.'<p>'.$client_email.'</p><p><strong>Client Job Requirments :</strong></p>';
    		$dataQ = $newQ->quesAnsDescrip;
    		$newTotal = explode(",",$dataQ);

    		$arr = array();
    		$arr1 = array();
        $arr2 = array();
        $arr3 = array();

        
        $final_arr1 = array();
        $final_arr2 = array();

			    foreach($newTotal as $key=>$value)
			    {
				      $newTotal1 = explode('=>',$value);

				      foreach($newTotal1 as $v2=>$v1){
					      array_push($arr,$v1);
				      }
			    }

          $count_arr_value = count($arr);

          for($i = 1; $i <= $count_arr_value; $i++)
          {
            if($i%2 !== 0)
            {
              array_push($arr1,$arr[$i-1]);
            }
            else if($i%2 == 0)
            {
              array_push($arr2,$arr[$i-1]);
            }
          }

          $data_c = count($arr1);
          $data_c1 = count($arr2);

          for ($k=0; $k<$data_c; $k++)
          {
            if($k == ($data_c-1)){
              $data_ques_choose = $arr1[$k];
              $data_value_choose = $arr2[$k];
              array_push($arr3, $data_ques_choose);
              array_push($arr3, $data_value_choose);
            }else{
                if($arr1[$k] == $arr1[$k+1]){
                  
                }
                else
                {
                  
                  $data_ques_choose = $arr1[$k];
                  $data_value_choose = $arr2[$k];
                  array_push($arr3, $data_ques_choose);
                  array_push($arr3, $data_value_choose);
                }
            }
          }


          $count_main_data_arr = count($arr3);
          for($l = 1; $l <= $count_main_data_arr; $l++)
          {
            if($l%2 !== 0)
            {
              array_push($final_arr1,$arr3[$l-1]);
            }
            else if($l%2 == 0)
            {
              array_push($final_arr2,$arr3[$l-1]);
            }
          }

          $final_data_c = count($final_arr1);
          $final_data_c1 = count($final_arr2);

          for($lcount=0; $lcount<$final_data_c; $lcount++)
          {
            if($final_arr1[$lcount] != 0 )
            {
              $selectQuestions = DB::table('adminquestions')
                                    ->where('id',$final_arr1[$lcount])
                                    ->get();
              
              foreach($selectQuestions as $dataV){
                $html .= "<p><strong>".$dataV->question_name."</strong></p>";
              }
              if(is_numeric($final_arr2[$lcount]) == 1){
                  $selectOptions = DB::table('adminoptions')
                                        ->where('id',$final_arr2[$lcount])
                                        ->get();
                  foreach($selectOptions as $dataO){
                    $html .= "<ul><li>".$dataO->option_label."</li></ul>";
                  }
              }
              if(is_numeric($final_arr2[$lcount]) == 0){
                $html .= "<ul><li>".$final_arr2[$lcount]."</li></ul>";
              }
            }


            if($final_arr1[$lcount] == 0)
            {
              $previous_question = $final_arr1[$lcount-1];
              $previous_opt = $final_arr2[$lcount-1];
              $my_c_id = $cate_id_main;
              if(is_numeric($previous_opt)){
                $rest_fetch_query = DB::table('admincateques')->where(['category_id'=>$my_c_id,'question_id'=>$previous_question,'option_id'=>$previous_opt])->get();
              }else{
                $rest_fetch_query = DB::table('admincateques')->where(['category_id'=>$my_c_id,'question_id'=>$previous_question,'option_id'=>0])->get();
              }
              if(count($rest_fetch_query)>0){
                foreach($rest_fetch_query as $dataV1){
                  $actual_ques_id = $dataV1->next_ques_id;
                }
                $selectQuestions1 = DB::table('adminquestions')
                                    ->where('id',$actual_ques_id)
                                    ->get();
                foreach($selectQuestions1 as $dataVL){
                  $html .= "<p><strong>".$dataVL->question_name."</strong></p>";
                }

                if(is_numeric($final_arr2[$lcount])){
                  $selectOptionsL = DB::table('adminoptions')
                                    ->where('id',$final_arr2[$lcount])
                                    ->get();
                  foreach($selectOptionsL as $dataOL){
                    $html .= "<ul><li>".$dataOL->option_label."</li></ul>";
                  }
                }else{
                  $html .= "<ul><li>".$final_arr2[$lcount]."</li></ul>";
                }
              }
            }
            
          }

          $job_push_check = ProposalSendModel::where(['project_id'=>$newQ->id,'lawyer_id'=>Auth::user()->id,'active_status'=>1])->get();
          if(count($job_push_check) > 0){
              $actual_check_status = '<a href="javascript: ;" onclick="coming_soon_modal()" class="dt-btn">View Proposal </a>';
          }else{
              $actual_check_status = '<a href="/apply-job/'.$url_encode_id.'" class="dt-btn">Apply</a>';
          }

    	}
    	
    	$html1 = $html.'<p><span>'.$actual_check_status.'</span><span><a href="javascript:void(0)" class="dt-btn">Decline</a></span><span><a href="javascript: ;" class="dt-btn">Chat</a></span></p></div>';
      echo  json_encode($html1);
    }


    // 2 days left
    public function checking_days_left()
    {
      $selectResultQuery = DB::table('jobanswerclinetdesc')->get();

      foreach($selectResultQuery as $sRQuery)
      {
        $blank_arr = array();
        if($sRQuery->inserted_ids !== null){
          $explode_arr = explode(",",$sRQuery->inserted_ids);
          foreach($explode_arr as $got_arr)
          {
            $blank_arr[] = $got_arr;
          }
        }

        $blank_arr2 = array();
        if($sRQuery->not_action_ids !== null){
          $explode_arr2 = explode(",",$sRQuery->not_action_ids);
          foreach($explode_arr2 as $got_arr2)
          {
            $blank_arr2[] = $got_arr2;
          }
        }

        $blank_arr3 = array();
        if($sRQuery->chat_Or_act_ids !== null){
          $explode_arr3 = explode(",",$sRQuery->chat_Or_act_ids);
          foreach($explode_arr3 as $got_arr3)
          {
            $blank_arr3[] = $got_arr3;
          }
        }
        

        if(in_array(Auth::user()->id, $blank_arr))
        {
          $today_date = date('Y-m-d H:i:s');
          $enc_today_date = strtotime($today_date);

          $update_date = strtotime($sRQuery->updated_at);
          $compare_date = strtotime('+ 2 days', $update_date);

          if($enc_today_date > $compare_date)
          {
            if($sRQuery->chat_Or_act_ids !== null)
            {

              $blank_final_arr = array();
              $explode_final_1st_arr = explode(",",$sRQuery->inserted_ids);
              $explode_final_2nd_arr = explode(",",$sRQuery->chat_Or_act_ids);
              // start this 
              foreach($explode_final_1st_arr as $final_array1)
              {
                $final_check_1st_data = $final_array1;
                foreach ($explode_final_2nd_arr as $final_array2) {
                  if($final_array2 !== $final_check_1st_data)
                  {
                    $blank_final_arr[] = $final_check_1st_data;
                  }
                }
              }
              // end of this

              $blank_not_action_final_arr = array();
              if($sRQuery->not_action_ids !== null)
              {
                $final_not_action_ids_arr = explode(",",$sRQuery->not_action_ids);
                foreach($final_not_action_ids_arr as $final_not_ids_array)
                {
                  $blank_not_action_final_arr[] = $final_not_ids_array;
                }
              }

              // final not appear array format
              $final_where_not_array = array_merge($blank_final_arr, $blank_not_action_final_arr);

              $final_not_id_store = implode(",",$blank_final_arr);

              $new_insert_ids = array();
              $new_elements_query =  User::whereNotIn('id', $final_where_not_array)->where('is_lawyer',1)->limit(10)->get();

              foreach($new_elements_query as $newE1)
              {
                $new_insert_ids[] = $newE1->id;
              }

              $implode_final_new_insert_ids = implode(",",$new_insert_ids);
              $main_date = date('Y-m-d H:i:s',strtotime($sRQuery->updated_at.'+2 days'));
              $insert_arr_make_new = [
                'inserted_ids' => $implode_final_new_insert_ids,
                'not_action_ids' => $final_not_id_store,
                'updated_at' => $main_date
              ];

               $final_insert_query = JobAnswerClinetDescModel::where('id',$sRQuery->id)->update($insert_arr_make_new);


            }
            else if($sRQuery->chat_Or_act_ids == null)
            {
              $blank_final_arr = array();
              $explode_final_1st_arr = explode(",",$sRQuery->inserted_ids);
              // start this 
              foreach($explode_final_1st_arr as $final_array1)
              {
                $blank_final_arr[] = $final_array1;
              }
              // end of this

              $blank_not_action_final_arr = array();
              if($sRQuery->not_action_ids !== null)
              {
                $final_not_action_ids_arr = explode(",",$sRQuery->not_action_ids);
                foreach($final_not_action_ids_arr as $final_not_ids_array)
                {
                  $blank_not_action_final_arr[] = $final_not_ids_array;
                }
              }

              // final not appear array format
              $final_where_not_array = array_merge($blank_final_arr, $blank_not_action_final_arr);

              $final_not_id_store = implode(",",$final_where_not_array);

              $new_insert_ids = array();
              $new_elements_query =  User::whereNotIn('id', $final_where_not_array)->where('is_lawyer',1)->limit(10)->get();

              foreach($new_elements_query as $newE1)
              {
                $new_insert_ids[] = $newE1->id;
              }

              $implode_final_new_insert_ids = implode(",",$new_insert_ids);
              $main_date = date('Y-m-d H:i:s',strtotime($sRQuery->updated_at.'+2 days'));
              $insert_arr_make_new = [
                'inserted_ids' => $implode_final_new_insert_ids,
                'not_action_ids' => $final_not_id_store,
                'updated_at' => $main_date     
              ];

               $final_insert_query = JobAnswerClinetDescModel::where('id',$sRQuery->id)->update($insert_arr_make_new);

            }

            echo json_encode("success");
          }
          echo json_encode("success");
        }else{
          echo json_encode("error");
        }


      }
    }
    // end of 2 days left


    public function full_view_all_jobs()
    {

        $selectResultQuery = DB::table('jobanswerclinetdesc')->get();
        $html = '';
        if(count($selectResultQuery) > 0){
        foreach($selectResultQuery as $newQ)
        {

          // 
          $show_array = explode(",",$newQ->inserted_ids);
          $ele_arr = array();
          foreach($show_array as $s_arr1)
          {
            $ele_arr[] = $s_arr1;
          }

          // 
          $ele_arr1 = array();
          if($newQ->not_action_ids !== null){
              $show_array1 = explode(",",$newQ->not_action_ids);
          
              foreach($show_array1 as $s_arr2)
              {
                $ele_arr1[] = $s_arr2;
              }
          }

          // 
          $ele_arr2 = array();
          if($newQ->chat_Or_act_ids !== null){
              $show_array2 = explode(",",$newQ->chat_Or_act_ids);
          
              foreach($show_array2 as $s_arr3)
              {
                $ele_arr2[] = $s_arr3;
              }
          }

          if((in_array(Auth::user()->id, $ele_arr) && !in_array(Auth::user()->id, $ele_arr1)) && (in_array(Auth::user()->id, $ele_arr2) || !in_array(Auth::user()->id, $ele_arr2))){

          $html .= '<li><div class="left-step"><div class="media">';
          $cate_id_main = $newQ->category_id;
          $client_id = $newQ->client_id;

          // client fetch
          $clientQuery = DB::table('users')->where('id',$client_id)->get();
          foreach($clientQuery as $user_name_via)
          {
            if($user_name_via->profileImg != '' || $user_name_via->profileImg != null)
            {
              $newImg = $user_name_via->profileImg;
            }else{
              $newImg = "frontAssets/images/no-img.jpg";
            }
            $html .= '<img class="md-img" src="'.$newImg.'" alt="image">';
          }

          // category fetch
          $selectCategoryQuery = DB::table('admincategories')->where('id',$cate_id_main)->get();
          foreach($selectCategoryQuery as $cate_name_data)
          {

            if(strlen($cate_name_data->category_title)>200){
              $category_details = substr($cate_name_data->category_title,0,200)."...";
            }else{
              $category_details = $cate_name_data->category_title;
            }
            $html .= '<div class="media-body"><h5>Job Id : '.$newQ->projectId.' </h5><p>'.$category_details.'</p></div>';
            // ('.$cate_name_data->category_name.' job)
          }

          $mydata= base64_encode($newQ->id); 

          $job_push_check = ProposalSendModel::where(['project_id'=>$newQ->id,'lawyer_id'=>Auth::user()->id,'active_status'=>1])->get();
          if(count($job_push_check) > 0){
            $actual_check_status = '<a href="javascript: ;" onclick="coming_soon_modal()" class="shrt-btn vw-btn">View Proposal </a>';
          }else{
            $main_date_occur = date('Y-m-d H:i:s',strtotime($newQ->updated_at.'+2 days'));
            $today_date = date('Y-m-d H:i:s');
            $date1_occur=date_create($main_date_occur);
            $date2_occur=date_create($today_date);
            $diff_occur=date_diff($date1_occur,$date2_occur);

            $days_left = $diff_occur->format("%a");

            // 
            if($days_left > 0){
              $main_date_reflect = $days_left." days left to apply";
            }else{
              $main_date_reflect = "last day to apply";
            }
            // 

            if(in_array(Auth::user()->id, $ele_arr2)){
              $day_class_data = "(".$main_date_reflect.")";
            }
            else if(!in_array(Auth::user()->id, $ele_arr2))
            {
              $day_class_data = "(chat started)";
            }
            

            $actual_check_status = '<a href="/apply-job/'.$mydata.'" class="shrt-btn vw-btn">Apply<span id="day-class"><br>'.$day_class_data.' </span></a>';
          }

          $html .= '</div></div>';
          $html .= '<div class="right-step"><a href="/job-full-view/'.$mydata.'"  class="shrt-btn vw-btn">View Job</a>'.$actual_check_status.'</div></li>';
        }
        }
        }else{
          $html .= '<p class="text-danger text-center"><i class="fa fa-times"></i> No jobs are posted yet </p>';
        }
        echo json_encode($html);
    }


    // all category ajax
    public function jcategory_ajax()
    {
      $cateQuery = DB::table('admincategories')->get();
      $html = '';
      $html .= '<option selected="selected" value="">Select Job Type</option>';
      foreach ($cateQuery as $keyCate) {
        $html .= '<option value="'.$keyCate->id.'">'.$keyCate->category_name.' Job</option>';
      }
      echo json_encode($html);
    }

    public function search_job_ajax()
    {
      if(isset($_GET['date_type']) && isset($_GET['job_type'])){
        $job_type = $_GET['job_type'];
        if($_GET['date_type'] == 1){
          $order_by = 'DESC';
        }else if($_GET['date_type'] == 2){
          $order_by = 'ASC';
        }
        $selectResultQuery = DB::table('jobanswerclinetdesc')->where(['category_id' => $job_type])->orderBy('id',$order_by)->get();
      }else if(!isset($_GET['date_type']) && isset($_GET['job_type'])){
        $job_type = $_GET['job_type'];
        $selectResultQuery = DB::table('jobanswerclinetdesc')->where(['category_id' => $job_type])->get();
      }else if(isset($_GET['date_type']) && !isset($_GET['job_type'])){
        if($_GET['date_type'] == 1){
          $order_by = 'DESC';
        }else if($_GET['date_type'] == 2){
          $order_by = 'ASC';
        }
        $selectResultQuery = DB::table('jobanswerclinetdesc')->orderBy('id',$order_by)->get();
      }


      
      $html = '';

      if(count($selectResultQuery) > 0){
        foreach($selectResultQuery as $newQ)
        {
          $html .= '<li><div class="left-step"><div class="media">';
          $cate_id_main = $newQ->category_id;
          $client_id = $newQ->client_id;

          // client fetch
          $clientQuery = DB::table('users')->where('id',$client_id)->get();
          foreach($clientQuery as $user_name_via)
          {
            if($user_name_via->profileImg != '' || $user_name_via->profileImg != null)
            {
              $newImg = $user_name_via->profileImg;
            }else{
              $newImg = "frontAssets/images/no-img.jpg";
            }
            $html .= '<img class="md-img" src="'.$newImg.'" alt="image">';
          }

          // category fetch
          $selectCategoryQuery = DB::table('admincategories')->where('id',$cate_id_main)->get();
          foreach($selectCategoryQuery as $cate_name_data)
          {

            if(strlen($cate_name_data->category_title)>200){
              $category_details = substr($cate_name_data->category_title,0,200)."...";
            }else{
              $category_details = $cate_name_data->category_title;
            }
            $html .= '<div class="media-body"><h5>Job Id : '.$newQ->projectId.'</h5><p>'.$category_details.'</p></div>';
          }

          $mydata= base64_encode($newQ->id); 


          $job_push_check = ProposalSendModel::where(['project_id'=>$newQ->id,'lawyer_id'=>Auth::user()->id,'active_status'=>1])->get();
          if(count($job_push_check) > 0){
            $actual_check_status = '<a href="javascript: ;" onclick="coming_soon_modal()" class="shrt-btn vw-btn">View Proposal </a>';
          }else{
            $actual_check_status = '<a href="/apply-job/'.$mydata.'" class="shrt-btn vw-btn">Apply</a>';
          }

          $html .= '</div></div>';
          $html .= '<div class="right-step"><a href="/job-full-view/'.$mydata.'"  class="shrt-btn vw-btn">View Job</a>'.$actual_check_status.'</div></li>';
        }
      }else{
        $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No jobs are available according to your search</h5><p><a href="/posted-jobs" class="shrt-btn vw-btn">View all Jobs</a></p></li>';
      }
      echo json_encode($html);


    }


    // lawyer proposal send
    function apply_job_ajax(){
      
      $getJobFullDetails = JobAnswerClinetDescModel::where('id',$_GET['project_id'])->first();
      $client_id = $getJobFullDetails->client_id;
      $unit_arr = [
        'lawyer_des'=>$_GET['lawyer_des'],
        'lawyer_comment'=>$_GET['lawyer_comment'],
        'billing_option'=>$_GET['billing_option'],
        'billing_rate'=>$_GET['billing_rate'],
        'lawyer_id'=>Auth::user()->id,
        'project_id'=>$_GET['project_id'],
        'client_id'=>$client_id,
        'active_status'=>1
      ];

      $unit_arr1 = [
        'lawyer_des'=>$_GET['lawyer_des'],
        'lawyer_comment'=>$_GET['lawyer_comment'],
        'billing_option'=>$_GET['billing_option'],
        'billing_rate'=>$_GET['billing_rate'],
        'lawyer_id'=>Auth::user()->id,
        'project_id'=>$_GET['project_id'],
        'client_id'=>$client_id,
        'active_status'=>1,
        'unread_status'=>'unread',
        'notify_type' => 'proposal'
      ];

      $insert_query_notify = NotificationModel::insert($unit_arr1);
      $insert_query = ProposalSendModel::insert($unit_arr);
      if($insert_query){
        $succ_msg = 1;
      }else{
        $succ_msg = 0;
      }
      echo json_encode($succ_msg);
    }
}
