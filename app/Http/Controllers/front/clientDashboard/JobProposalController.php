<?php

namespace App\Http\Controllers\front\clientDashboard;

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

class JobProposalController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.client.all-proposal-view');
    }

    public function all_full_proposal()
    {
    	$project_id = $_GET['url_id'];
    	$notify_data = DB::table('jobanswerclinetdesc')
    						->leftJoin('proposal_tbl','jobanswerclinetdesc.id = proposal_tbl.project_id','jobanswerclinetdesc')
    						->where('jobanswerclientdesc.client_id',Auth::user()->id)
    						->where('proposal_tbl.project_id',$project_id)
    						->where('proposal_tbl.status',1)
    						->orderBy('created_at','DESC')
    						->get();
    	$html = '';
    	foreach($notify_data as $count_notify)
    	{
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


    public function project_id_wish_proposal()
    {
        $project_id = $_GET['url_id'];
        

        $mainQuery = ProposalSendModel::where(['project_id' => $project_id, 'client_id' => Auth::user()->id])->get();
        $html = '';

        if(count($mainQuery) > 0)
        {

            foreach($mainQuery as $main_data)
            {
                if(strlen($main_data->lawyer_comment) > 90){
                    $msg_des = substr($main_data->lawyer_comment,0,90)."...";
                }else{
                    $msg_des = $main_data->lawyer_comment;
                } 



                if($main_data->billing_option == 1){
                    $main_content = "per hour";
                }else if($main_data->billing_option == 0){
                    $main_content = "Fixed Price";
                }


                $userQuery = user::where('id',$main_data->lawyer_id)->get();
                foreach($userQuery as $user_data){

                    if($user_data->profileImg){
                        $data_img = asset($user_data->profileImg);
                    }else{
                        $data_img = asset('frontAssets/images/no-img.jpg');
                    }

                    $html .= '<li>
                             <div class="left-step">
                                <div class="media">
                                    <img class="md-img" src="'.$data_img.'" alt="image">
                                     <div class="media-body">
                                       <h5>'.$user_data->name.' '.$user_data->lname.'</h5> 
                                       <h6 class="highlight-list">
                                         <span>€ '.$main_data->billing_rate.' / '.$main_content.'</span>
                                         <span class="date-text"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/m/d',strtotime($main_data->created_at)).'</span>
                                      </h6>                             
                                                                
                                       <p>'.$msg_des.'</p>
                                   </div>
                                </div>
                             </div>

                             <div class="right-step">
                                <br>
                                   <a href="/proposal-view/'.base64_encode($main_data->id).'" class="shrt-btn vw-btn">View Details</a>
                                </div>  
                            
                          </li>';
                }
            } 

        }else{
            $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No proposal according for this project</h5></li>';
        }
        echo json_encode($html);
    }


    // searching ...

    public function proposal_search_update_ajax()
    {
        $project_id = $_GET['url_id'];
        
        if(isset($_GET['city_id']) && isset($_GET['country_id']) && isset($_GET['budget_id'])){

            $get_country_name = LawyerCountryModel::where(['id' => $_GET['country_id']])->get();

            foreach($get_country_name as $c_name){
              $country_name = $c_name->country_name;
            }

            $get_city_name = LawyerCitiesModel::where(['id' => $_GET['city_id']])->get();

            foreach($get_city_name as $c_name1){
              $city_name = $c_name1->city_name;
            }

            if($_GET['budget_id'] == 1){
              $data_new = 'proposal_tbl.billing_rate < 100';
            }else if($_GET['budget_id'] == 2){
              $data_new = 'proposal_tbl.billing_rate = 100';
            }else if($_GET['budget_id'] == 3){
              $data_new = 'proposal_tbl.billing_rate > 100 && proposal_tbl.billing_rate < 200';
            }else if($_GET['budget_id'] == 4){
              $data_new = 'proposal_tbl.billing_rate >= 200 && proposal_tbl.billing_rate < 300';
            }else if($_GET['budget_id'] == 5){
              $data_new = 'proposal_tbl.billing_rate >= 400 && proposal_tbl.billing_rate < 500';
            }else if($_GET['budget_id'] == 6){
              $data_new = 'proposal_tbl.billing_rate > 500';
            }

            $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->whereRaw($data_new)
                            ->where('users.city', 'like', '%' . $city_name . '%')
                            ->where('country_list.name', 'like', '%' . $country_name . '%')
                            ->get();
        }else if(!isset($_GET['city_id']) && !isset($_GET['country_id']) && isset($_GET['budget_id'])){

            
          if($_GET['budget_id'] != 0){
            if($_GET['budget_id'] == 1){
              $data_new = 'proposal_tbl.billing_rate < 100';
            }else if($_GET['budget_id'] == 2){
              $data_new = 'proposal_tbl.billing_rate = 100';
            }else if($_GET['budget_id'] == 3){
              $data_new = 'proposal_tbl.billing_rate > 100 && proposal_tbl.billing_rate < 200';
            }else if($_GET['budget_id'] == 4){
              $data_new = 'proposal_tbl.billing_rate >= 200 && proposal_tbl.billing_rate < 300';
            }else if($_GET['budget_id'] == 5){
              $data_new = 'proposal_tbl.billing_rate >= 400 && proposal_tbl.billing_rate < 500';
            }else if($_GET['budget_id'] == 6){
              $data_new = 'proposal_tbl.billing_rate > 500';
            }

            $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->whereRaw($data_new)
                            ->get();
            }else if($_GET['budget_id'] == 0){
              $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->get();
            }
        }else if(!isset($_GET['city_id']) && isset($_GET['country_id']) && !isset($_GET['budget_id'])){
          if($_GET['country_id'] != 0){
            $get_country_name = LawyerCountryModel::where(['id' => $_GET['country_id']])->get();

            foreach($get_country_name as $c_name){
              $country_name = $c_name->country_name;
            }

            
            $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->where('country_list.name', 'like', '%' . $country_name . '%')
                            ->get();
            }else if($_GET['country_id'] == 0){
              $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->get();
            }
        }else if(isset($_GET['city_id']) && !isset($_GET['country_id']) && !isset($_GET['budget_id'])){

          if($_GET['city_id'] != 0){

            $get_city_name = LawyerCitiesModel::where(['id' => $_GET['city_id']])->get();

            foreach($get_city_name as $c_name1){
              $city_name = $c_name1->city_name;
            }


            $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date','proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->where('users.city', 'like', '%' . $city_name . '%')
                            ->get();
            }else if($_GET['city_id'] == 0){
              $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->get();
            }
        }else{
          $mainQuery = DB::table('proposal_tbl')
                            ->leftJoin('jobanswerclinetdesc', 'jobanswerclinetdesc.id' , '=', 
                              'proposal_tbl.project_id')
                            ->leftJoin('users','users.id', '=', 'proposal_tbl.lawyer_id')
                            ->LeftJoin('country_list','country_list.id', '=', 'users.country')
                            ->select('users.name as fname', 'proposal_tbl.created_at as proposal_create_date', 'proposal_tbl.id as mainID','proposal_tbl.*','users.*','jobanswerclinetdesc.*','country_list.*')
                            ->where(['proposal_tbl.project_id' => $project_id, 'proposal_tbl.client_id' => Auth::user()->id])
                            ->get();
        }
        
        $html = '';

        if(count($mainQuery) > 0)
        {

            foreach($mainQuery as $main_data)
            {
                if(strlen($main_data->lawyer_comment) > 90){
                    $msg_des = substr($main_data->lawyer_comment,0,90)."...";
                }else{
                    $msg_des = $main_data->lawyer_comment;
                } 



                if($main_data->billing_option == 1){
                    $main_content = "per hour";
                }else if($main_data->billing_option == 0){
                    $main_content = "Fixed Price";
                }


                

                    if($main_data->profileImg){
                        $data_img = asset($main_data->profileImg);
                    }else{
                        $data_img = asset('frontAssets/images/no-img.jpg');
                    }

                    $html .= '<li>
                             <div class="left-step">
                                <div class="media">
                                    <img class="md-img" src="'.$data_img.'" alt="image">
                                     <div class="media-body">
                                       <h5>'.$main_data->fname.' '.$main_data->lname.'</h5> 
                                       <h6 class="highlight-list">
                                         <span>€ '.$main_data->billing_rate.' / '.$main_content.'</span>
                                         <span class="date-text"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date('Y/m/d',strtotime($main_data->proposal_create_date)).'</span>
                                      </h6>                             
                                                                
                                       <p>'.$msg_des.'</p>
                                   </div>
                                </div>
                             </div>

                             <div class="right-step">
                                <br>
                                   <a href="/proposal-view/'.base64_encode($main_data->mainID).'" class="shrt-btn vw-btn">View Details</a>
                                </div>  
                            
                          </li>';
            } 

        }else{
            $html .= '<li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No proposal according to the search</h5></li>';
        }
        echo json_encode($html);
    }

    // end searching ...


    public function proposal_view()
    {
        return view('frontend.front-pages.client.single-proposal');
    }


    public function ajax_proposal_singlr_view()
    {
        $proposal_id = $_GET['url_id'];
        

        $mainQuery = ProposalSendModel::where(['id' => $proposal_id, 'client_id' => Auth::user()->id])->get();
        $html = '';

        if(count($mainQuery) > 0)
        {
            foreach($mainQuery as $main_data)
            {
                $userQuery = user::where('id',$main_data->lawyer_id)->get();

                if($main_data->billing_option == 1){
                    $main_content = "per hour";
                }else if($main_data->billing_option == 0){
                    $main_content = "Fixed Price";
                }


                foreach($userQuery as $user_data)
                {

                    if($user_data->profileImg){
                        $data_img = asset($user_data->profileImg);
                    }else{
                        $data_img = asset('frontAssets/images/no-img.jpg');
                    }


                    $select_country = Country_model::where('id',$user_data->country)->get();
                    foreach($select_country as $selectQueryCountry)
                    {
                        $country_name = $selectQueryCountry->nicename;
                    }


                    if($user_data->city != ''){
                        $city_name = $user_data->city.' , ';
                    }else{
                        $city_name = '';
                    }

                    $html .= '<img class="md-img" src="'.$data_img.'" alt="image">
                              <div class="media-body">
                               <h5>'.$user_data->name.' '.$user_data->lname.'</h5>
                                <p class="dg-text"><em>Lawyer</em></p>
                               <h6><span>Location :</span>'.$city_name.$country_name.'. </h6>

                                <h6><span>Price :</span><label>€ '.$main_data->billing_rate.'</label> / '.$main_content.' </h6>
                               <p>'.$main_data->lawyer_des.' <br/> '.$main_data->lawyer_comment.'</p>

                              <p>
                                 <span><a href="javascript:void(0)" class="dt-btn" data-toggle="modal" data-target="#lawyer-modal">Accept Lawyer</a></span>
                                 <span><a href="/all-proposal/'.base64_encode($main_data->project_id).'" class="dt-btn">Decline Lawyer</a></span>
                                 </p>


                                 <div class="modal fade theme-modal show" id="lawyer-modal" >
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-body text-center">
                                             <div class="center-part">
                                                <h3><span><i class="fa fa-user fa-3x" aria-hidden="true"></i></span>You have choose lawyer</h3>                                               
                                                  <h6><strong>'.$user_data->name.' '.$user_data->lname.'</strong> </h6>
                                                   <h6><span>Price :</span>€ '.$main_data->billing_rate.' / '.$main_content.'</h6>                                                    
                                              
                                                <p>please confirm to click</p>
                                                <a href="javascript:void(0)"  onclick="accept_lawyer_proposal_function('.$proposal_id.','.$main_data->project_id.','.$main_data->lawyer_id.','.$main_data->client_id.')" class="cnt-btn">Accept Lawyer</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               
                             </div>';
                }
            }
        }else{
            $html .= '<ul><li class="no-search-file"><h5 class="text-danger"><i class="fa fa-times"></i> No proposal according for this project</h5></li></ul>';
        }

        echo json_encode($html);
    }

    // country load

    public function country_load()
    {
        $countries = LawyerCountryModel::all();
        $country_view = '<label for="">Countries</label><select name="type" id="type"  class="form-control lawyer-country-search-id" onchange="country_change_for_city_load()"  aria-hidden="true"><option selected="selected" value="">Select Country</option> ';
        foreach($countries as $country_show){
            $country_view .= '<option value="'.$country_show->id.'">'.$country_show->country_name.'</option>';
        }
        $country_view .= '</select>';

        echo json_encode($country_view);
    }

    // cities load

    public function cities_load()
    {

        $country_id = $_GET['country_id'];

        $countries = LawyerCitiesModel::where(['country_id' => $country_id])->get();
        $country_view = '<label for="">Popular Cities</label><select name="type" id="type"  class="form-control lawyer-cities-search-id" onchange="lawyer_cities_search()" aria-hidden="true"><option selected="selected" value="">Select Cities</option> ';
        foreach($countries as $country_show){
            $country_view .= '<option value="'.$country_show->id.'">'.$country_show->city_name.'</option>';
        }
        $country_view .= '</select>';

        echo json_encode($country_view);
    }


    // Accepting Proposals

    public function accepting_proposal_ajax()
    {
        $proposal_id = $_GET['proposal_id'];
        $project_id = $_GET['project_id'];
        $lawyer_id = $_GET['lawyer_id'];
        $client_id = $_GET['client_id'];

        // updating project 
        $updateProject = ChatJobQAModel::where('id', $project_id)->update(['status'=>0,'active_status'=>0,'project_status'=>'accepting']);

        // getting project
        $getting_project = ChatJobQAModel::where('id',$project_id)->get();
        foreach($getting_project as $get_proj)
        {
            $project_mainId = $get_proj->projectId;
        }

        // get proposal details
        $get_proposal_details = ProposalSendModel::where(['id' => $proposal_id, 'client_id' => Auth::user()->id])->get();
        foreach($get_proposal_details as $get_propo)
        {
            $price = $get_propo->billing_rate;
            if($get_propo->billing_option == 1)
            {
                $main_price = ' / hrs';
            }
            else if($get_propo->billing_option == 0)
            {
                $main_price = ' / fixed';
            }
        }
        // update proposal details
        $updateQuery = ProposalSendModel::where('id', $proposal_id)->update(['active_status' => 0]);
        // total proposal users id
        $my_Array_query = array($client_id, $lawyer_id);
        $my_implode = implode(",",$my_Array_query);

        // insert array in chat project table
        $insertArr = [
            'client_id' =>$client_id,
            'lawyer_id' =>$lawyer_id,
            'project_id' =>$project_id,
            'project_name' =>$project_mainId,
            'budget_of_project' => $price.$main_price,
            'work_status' => 'started',
            'project_start_date' => date('Y-m-d'),
            'created_at' =>date('Y-m-d'),
            'updated_at' =>date('Y-m-d'),
            'total_users_ids' =>$my_implode,
      ];

      // insert query 
      $insertQuery = ChatProjectModel::insert($insertArr);

      echo json_encode("Success");
    }

    

}
