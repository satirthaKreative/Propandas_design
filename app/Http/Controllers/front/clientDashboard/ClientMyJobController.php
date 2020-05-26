<?php

namespace App\Http\Controllers\front\clientDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\admincategory;
use App\ProposalSendModel;
use App\NotificationModel;
use App\JobAnswerClinetDescModel;

class ClientMyJobController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.client.client-my-jobs');
    }

    public function my_job_full_view()
    {
    	$notify_data = DB::table('jobanswerclinetdesc')
    						->where('client_id',Auth::user()->id)
    						->where('status',1)
    						->orderBy('created_at','DESC')
    						->get();
    	$html = '';
    	foreach($notify_data as $count_notify)
    	{
    		$count_proposal = DB::table('proposal_tbl')
    								->where('client_id',$count_notify->client_id)
    								->where('project_id',$count_notify->id)
    								->groupBy('project_id')
    								->count();
    		$category_id = DB::table('admincategories')->where('id',$count_notify->category_id)->get();
    		foreach($category_id as $cate_id)
    		{
    			$category_description = $cate_id->category_description;
    		}


    		// checking details
    		if(strlen($category_description) > 200){
    			$cate_des = substr($category_description,0,200)."...";
    		}else{
    			$cate_des = $category_description;
    		}

    		$my_jobs_view = '<li>
                        <div class="left-step">
                        <h5><a href="/my-current-job/'.base64_encode($count_notify->id).'">Project Id : '.$count_notify->projectId.'</a></h5>
                               <p class="dg-text"><span class="date-text">
                              <i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/d/m',strtotime($count_notify->created_at)).'
                           </span></p>
                               <p>'.$cate_des.'</p>
                     </div>

                      <div class="right-step">
                           <p ><a href="/all-proposal/'.base64_encode($count_notify->id).'" class="bid-text"><label>'.$count_proposal.'</label>Proposals</a></p>
                        </div>                       
                   
                  </li>';
            $html .= $my_jobs_view;
    	}
    	
    	echo json_encode($html);
    }


    public function single_client_job()
    {
    	return view('frontend.front-pages.client.client-single-job');
    }


    // category ajax
    public function client_myjob_category_ajax()
    {
        $category_all = admincategory::all();
        $html = '<option selected="selected" value="">Select Job Type</option>';

        foreach($category_all as $cateG)
        {
            $html .= '<option value="'.$cateG->id.'">'.$cateG->category_name.' Job </option>';
        }

        echo json_encode($html);
    }


    // ajax call proposal show with all job category wish

    public function my_job_full_view_ajax()
    {
        $cate_data = $_GET['data'];
        if($cate_data == ''){
            $notify_data = DB::table('jobanswerclinetdesc')
                            ->where('client_id',Auth::user()->id)
                            ->where('status',1)
                            ->orderBy('created_at','DESC')
                            ->get();
        }else{
            $notify_data = DB::table('jobanswerclinetdesc')
                            ->where('category_id',$cate_data)
                            ->where('client_id',Auth::user()->id)
                            ->where('status',1)
                            ->orderBy('created_at','DESC')
                            ->get(); 
        }
        
        $html = '';
        
        if(count($notify_data) > 0){
            foreach($notify_data as $count_notify)
            {
                $count_proposal = DB::table('proposal_tbl')
                                        ->where('client_id',$count_notify->client_id)
                                        ->where('project_id',$count_notify->id)
                                        ->groupBy('project_id')
                                        ->count();
                $category_id = DB::table('admincategories')->where('id',$count_notify->category_id)->get();
                foreach($category_id as $cate_id)
                {
                    $category_description = $cate_id->category_description;
                }


                // checking details
                if(strlen($category_description) > 200){
                    $cate_des = substr($category_description,0,200)."...";
                }else{
                    $cate_des = $category_description;
                }

                $my_jobs_view = '<li>
                          <div class="left-step">
                            <h5><a href="/my-current-job/'.base64_encode($count_notify->id).'">Project Id : '.$count_notify->projectId.'</a></h5>
                                   <p class="dg-text"><span class="date-text">
                                  <i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/d/m',strtotime($count_notify->created_at)).'
                               </span></p>
                                   <p>'.$cate_des.'</p>
                         </div>

                          <div class="right-step">
                               <p ><a href="/all-proposal/'.base64_encode($count_notify->id).'" class="bid-text"><label>'.$count_proposal.'</label>Proposals</a></p>
                            </div>                       
                       
                      </li>';
                $html .= $my_jobs_view;
            }
        }else{
            $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No data according to search</h5></li>';
        }
        
        echo json_encode($html);
    }


    public function client_myjob_input_search_ajax()
    {
        $cate_data = $_GET['data'];
        if($cate_data == ''){
            $notify_data = DB::table('jobanswerclinetdesc')
                            ->where('client_id',Auth::user()->id)
                            ->where('status',1)
                            ->orderBy('created_at','DESC')
                            ->get();
        }else{
            $notify_data = DB::table('jobanswerclinetdesc')
                            ->where('projectId', 'LIKE', "%{$cate_data}%")
                            ->where('client_id',Auth::user()->id)
                            ->where('status',1)
                            ->orderBy('created_at','DESC')
                            ->get(); 
        }
        
        $html = '';
        
        if(count($notify_data) > 0){
            foreach($notify_data as $count_notify)
            {
                $count_proposal = DB::table('proposal_tbl')
                                        ->where('client_id',$count_notify->client_id)
                                        ->where('project_id',$count_notify->id)
                                        ->groupBy('project_id')
                                        ->count();
                $category_id = DB::table('admincategories')->where('id',$count_notify->category_id)->get();
                foreach($category_id as $cate_id)
                {
                    $category_description = $cate_id->category_description;
                }


                // checking details
                if(strlen($category_description) > 200){
                    $cate_des = substr($category_description,0,200)."...";
                }else{
                    $cate_des = $category_description;
                }

                $my_jobs_view = '<li>
                          <div class="left-step">
                            <h5><a href="/my-current-job/'.base64_encode($count_notify->id).'">Project Id : '.$count_notify->projectId.'</a></h5>
                                   <p class="dg-text"><span class="date-text">
                                  <i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/d/m',strtotime($count_notify->created_at)).'
                               </span></p>
                                   <p>'.$cate_des.'</p>
                         </div>

                          <div class="right-step">
                               <p ><a href="/all-proposal/'.base64_encode($count_notify->id).'" class="bid-text"><label>'.$count_proposal.'</label>Proposals</a></p>
                            </div>                       
                       
                      </li>';
                $html .= $my_jobs_view;
            }
        }else{
            $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No data according to search</h5></li>';
        }
        
        echo json_encode($html);
    }


    public function client_myjob_full_form_search_ajax()
    {
            $cate_data = $_GET['cate'];
            $search_jobs = $_GET['search_jobs'];

            $notify_data = DB::table('jobanswerclinetdesc')
                            ->where('projectId', 'LIKE', "%{$search_jobs}%")
                            ->where('category_id',$cate_data)
                            ->where('client_id',Auth::user()->id)
                            ->where('status',1)
                            ->orderBy('created_at','DESC')
                            ->get(); 
        
        $html = '';
        
        if(count($notify_data) > 0){
            foreach($notify_data as $count_notify)
            {
                $count_proposal = DB::table('proposal_tbl')
                                        ->where('client_id',$count_notify->client_id)
                                        ->where('project_id',$count_notify->id)
                                        ->groupBy('project_id')
                                        ->count();
                $category_id = DB::table('admincategories')->where('id',$count_notify->category_id)->get();
                foreach($category_id as $cate_id)
                {
                    $category_description = $cate_id->category_description;
                }


                // checking details
                if(strlen($category_description) > 200){
                    $cate_des = substr($category_description,0,200)."...";
                }else{
                    $cate_des = $category_description;
                }

                $my_jobs_view = '<li>
                          <div class="left-step">
                            <h5><a href="/my-current-job/'.base64_encode($count_notify->id).'">Project Id : '.$count_notify->projectId.'</a></h5>
                                   <p class="dg-text"><span class="date-text">
                                  <i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/d/m',strtotime($count_notify->created_at)).'
                               </span></p>
                                   <p>'.$cate_des.'</p>
                         </div>

                          <div class="right-step">
                               <p ><a href="/all-proposal/'.base64_encode($count_notify->id).'" class="bid-text"><label>'.$count_proposal.'</label>Proposals</a></p>
                            </div>                       
                       
                      </li>';
                $html .= $my_jobs_view;
            }
        }else{
            $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No data according to search</h5></li>';
        }
        
        echo json_encode($html);
    }


    public function single_job_page_with_proposal_count()
    {
        $data = $_GET['get_id'];
        $url_encode_id = base64_encode($data);
        $selectResultQuery = DB::table('jobanswerclinetdesc')->where('id',$data)->get();

        $html = '';
        $html .= '<div class="row"><div class="col-md-8">';


        foreach($selectResultQuery as $newQ)
        {
        
        $cate_id_main = $newQ->category_id;
        $selectCategoryQuery = DB::table('admincategories')->where('id',$cate_id_main)->get();
        foreach($selectCategoryQuery as $cate_name_data)
        {
          $html .= "<h5>Job Id : ".$newQ->projectId."</h5>"."<p><span class='date-text text-left'><i class='fa fa-clock-o' aria-hidden='true'></i>".date('Y/m/d',strtotime($newQ->created_at))."</span></p>";
          $html .= '<h6><span>Category Name :</span>'.$cate_name_data->category_name.' </h6>';

        }
        $html .= '</div>
                  <div class="col-md-4">
                  <p class="top-prsp-btn"><span><a href="/all-proposal/'.$url_encode_id.'" class="dt-btn">View Proposal</a></span> </p>
                  </div>
                </div> <hr>';
        
        $html .= '<h6>Job Description </h6>';
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

        }
        
        $html1 = $html;
      echo  json_encode($html1);
    }


}
