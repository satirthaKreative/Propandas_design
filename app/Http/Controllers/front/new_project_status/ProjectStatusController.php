<?php

namespace App\Http\Controllers\front\new_project_status;

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
use App\Models\invoice\InvoiceModel;
use App\AdminLegalinfoModel;
use App\JobAnswerClinetDescModel;
use App\Models\chat_before_accept\ChatAndAcceptModel;

class ProjectStatusController extends Controller
{
    // client project page show

    public function client_project_status_index()
    {
    	return view('frontend.front-pages.new-project-status.client-project-status');
    }



    // lawyer project page show

    public function lawyer_project_status_index()
    {
    	return view('frontend.front-pages.new-project-status.lawyer-project-status');
    }


    // client project page status table view

    public function client_project_status_all_data()
    {
    	$getClientQuery = JobAnswerClinetDescModel::where(['client_id' => Auth::user()->id])->get();
    	$html = "";
    	if(count($getClientQuery) > 0)
    	{
    		$i = 1;
    		foreach($getClientQuery as $getCQ)
    		{

    			// get the client name 
    			$checking_lawyer_name = ChatAndAcceptModel::where(['project_id' => $getCQ->id, 'project_name' => $getCQ->projectId])->orderBy('id','ASC')->get();
    			if(count($checking_lawyer_name) == 1)
    			{
    				foreach($checking_lawyer_name as $lawyer_names)
    				{
    					// lawyer id
    					$lawyer_id = $lawyer_names->lawyer_id;
    					$getting_lawyer_name_query = User::where(['id' => $lawyer_id])->get();
    					foreach($getting_lawyer_name_query as $lawyer_full_name)
    					{
    						$lawyer_name = $lawyer_full_name->name.' '.$lawyer_full_name->lname;
    					}


    					// lawyer 

    					$main_checking_purpose_query = ChatProjectModel::where(['client_id' => Auth::user()->id, 'project_id' => $getCQ->id, 'project_name' => $getCQ->projectId])->limit(1)->get();
    					if(count($main_checking_purpose_query) > 0)
    					{
    						foreach($main_checking_purpose_query as $mainCPquery)
    						{
    							$actual_start_date = date('M d,y',strtotime($mainCPquery->project_start_date));
    							$actual_Status_of_project = strtotime($mainCPquery->project_start_date);
    							// main work status

    							$main_work_status = $mainCPquery->work_status;

    								// checking work status
    								if($main_work_status == "started")
    								{
    									if(strtotime(date('Y-m-d')) == $actual_Status_of_project)
    									{
    										$actual_work_status_class = "initiated";
    										$working_status = "Initiated";
    									}
    									else if(strtotime(date('Y-m-d')) > $actual_Status_of_project)
    									{
    										$actual_work_status_class = "in-progress";
    										$working_status = "In Progress";
    									}
    								}
    								else if($main_work_status == "completed")
    								{
    									$actual_work_status_class = "completed";
    									$working_status = "Completed";
    								}
    								else if($main_work_status == "closed")
    								{
    									$actual_work_status_class = "closed";
    									$working_status = "Closed";
    								}

    							// end of main work status
    						}
    					}
    					else
    					{
    						$main_proposal_query = ProposalSendModel::where(['client_id' => Auth::user()->id, 'lawyer_id' => $lawyer_id, 'project_id' => $getCQ->id])->limit(1)->get();
    						if(count($main_proposal_query) > 0){
    							foreach($main_proposal_query as $mainQ2)
    							{
    								$actual_start_date = date('M d,y',strtotime($mainQ2->created_at));

    								$actual_work_status_class = "proposal";
    								$working_status = "Proposal";
    							}
    						}
    						else
    						{
    							$actual_start_date = date('M d,y',strtotime($lawyer_names->created_at));

    							$actual_work_status_class = "not-started";
    							$working_status = "Not Started";
    						}
    						
    					}
    					
    				}
    				
    			}
    			else if(count($checking_lawyer_name) > 1)
    			{
    				$lawyer_name = '<select name="type" onchange=lawyer_wish_project_status_change('.$i.','.$getCQ->id.',"'.$getCQ->projectId.'",'.Auth::user()->id.') id="lawyer-wish-project-status-change-id'.$i.'" class="form-control md-control" aria-hidden="true">';
    				foreach($checking_lawyer_name as $lawyer_names)
    				{
    					// lawyer ids
    					$lawyer_id = $lawyer_names->lawyer_id;
    					$getting_lawyer_name_query = User::where(['id' => $lawyer_id])->get();
    					foreach($getting_lawyer_name_query as $lawyer_full_name)
    					{
    						$lawyer_name .= '<option value="'.$lawyer_full_name->id.'">'.$lawyer_full_name->name.' '.$lawyer_full_name->lname.'</option>';
    					}



    					// lawyer 

    					$main_checking_purpose_query = ChatProjectModel::where(['client_id' => Auth::user()->id, 'project_id' => $getCQ->id, 'project_name' => $getCQ->projectId])->limit(1)->get();
    					if(count($main_checking_purpose_query) > 0)
    					{
    						foreach($main_checking_purpose_query as $mainCPquery)
    						{
    							$actual_start_date = date('M d,y',strtotime($mainCPquery->project_start_date));
    							$actual_Status_of_project = strtotime($mainCPquery->project_start_date);
    							// main work status

    							$main_work_status = $mainCPquery->work_status;

    								// checking work status
    								if($main_work_status == "started")
    								{
    									if(strtotime(date('Y-m-d')) == $actual_Status_of_project)
    									{
    										$actual_work_status_class = "initiated";
    										$working_status = "Initiated";
    									}
    									else if(strtotime(date('Y-m-d')) > $actual_Status_of_project)
    									{
    										$actual_work_status_class = "in-progress";
    										$working_status = "In Progress";
    									}
    								}
    								else if($main_work_status == "completed")
    								{
    									$actual_work_status_class = "completed";
    									$working_status = "Completed";
    								}
    								else if($main_work_status == "closed")
    								{
    									$actual_work_status_class = "closed";
    									$working_status = "Closed";
    								}

    							// end of main work status
    						}
    					}
    					else
    					{
    						$main_proposal_query = ProposalSendModel::where(['client_id' => Auth::user()->id, 'lawyer_id' => $lawyer_id, 'project_id' => $getCQ->id])->limit(1)->get();
    						if(count($main_proposal_query) > 0){
    							foreach($main_proposal_query as $mainQ2)
    							{
    								$actual_start_date = date('M d,y',strtotime($mainQ2->created_at));

    								$actual_work_status_class = "proposal";
    								$working_status = "Proposal";
    							}
    						}
    						else
    						{
    							$actual_start_date = date('M d,y',strtotime($lawyer_names->created_at));

    							$actual_work_status_class = "not-started";
    							$working_status = "Not Started";
    						}
    						
    					}


    				}
    				$lawyer_name .= '</select>';
    			}
    			else
    			{
    				$lawyer_name = '<span class="no-lawyer"> No Lawyer</span>';
    				$actual_start_date = '<span class="no-lawyer">No Date</span>';

    				$actual_work_status_class = "not-accepted";
    				$working_status = "Not Accepted";
    			}
    			// end of the getting client name
    			
    		$html .= '<tr>
           	<td>'.$i.'</td>
            <td>'.$getCQ->projectId.'</td>
            <td>'.$lawyer_name.'</td>
            <td id="actual-project-status-start-date-id'.$i.'">'.$actual_start_date.'</td>
            <td><span class="job-status '.$actual_work_status_class.'" id="actual-project-status-change-id'.$i.'">'.$working_status.'</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange=client_project_status_change_by_client_function('.$i.',"'.$getCQ->id.',"'.$getCQ->projectId.'",'.Auth::user()->id.')">
                   <option selected="selected" value="">Status</option>
                   <option value="proposal">Proposal</option>
                   <option value="initiated">Initiated</option>
                   <option value="in_progress">In Progress</option>
                   <option value="completed">Completed </option>
                   <option value="closed">Closed</option>                            
                </select>
              </td>            
          	</tr>';

    		$i++;
    		}
    	}
    	else
    	{
    		$html .= '<tr class="no-data">
                        <td colspan="6">                                    
                            No data found regarding current search                          
                        </td> 
                    </tr>';
    	}

    	echo  json_encode($html);
    }


    // client project status page by changes with lawyer name change

    public function client_page_lawyer_wish_project_status_change()
    {
    	// variable define 

    	$id_of_project_status = $_GET['id_of_project_status'];
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];
    	$client_id = $_GET['client_id'];
    	$lawyer_id = $_GET['lawyer_id'];

    	// end of variable define


    	//  main query by project status 

    	$getProjectStatusQuery = ChatProjectModel::where(['client_id' => $client_id, 'project_id' => $project_id, 'project_name' => $project_name, 'lawyer_id' => $lawyer_id])->get();

    	if(count($getProjectStatusQuery) > 0)
    	{
    		foreach($getProjectStatusQuery as $mainCPquery)
    		{
    			$actual_start_date = date('M d,y',strtotime($mainCPquery->project_start_date));
    			$actual_Status_of_project = strtotime($mainCPquery->project_start_date);
    			// main work status

    			$main_work_status = $mainCPquery->work_status;

    				// checking work status
    				if($main_work_status == "started")
    				{
    					if(strtotime(date('Y-m-d')) == $actual_Status_of_project)
    					{
    						$actual_work_status_class = "initiated";
    						$working_status = "Initiated";
    					}
    					else if(strtotime(date('Y-m-d')) > $actual_Status_of_project)
    					{
    						$actual_work_status_class = "in-progress";
    						$working_status = "In Progress";
    					}
    				}
    				else if($main_work_status == "completed")
    				{
    					$actual_work_status_class = "completed";
    					$working_status = "Completed";
    				}
    				else if($main_work_status == "closed")
    				{
    					$actual_work_status_class = "closed";
    					$working_status = "Closed";
    				}

    			// end of main work status
    		}
    	}
    	else
    	{
    		$main_proposal_query = ProposalSendModel::where(['client_id' => $client_id, 'project_id' => $project_id, 'lawyer_id' => $lawyer_id])->get();
    		if(count($main_proposal_query) > 0){
    			foreach($main_proposal_query as $mainQ2)
    			{
    				$actual_start_date = date('M d,y',strtotime($mainQ2->created_at));

    				$actual_work_status_class = "proposal";
    				$working_status = "Proposal";
    			}
    		}
    		else
    		{
    			$actual_start_date = '<span class="no-lawyer">No date</span>';

    			$actual_work_status_class = "not-started";
    			$working_status = "Not Started";
    		}
    	}

    	$html['actual_start_date'] = $actual_start_date;
    	$html['actual_work_status_class'] = $actual_work_status_class;
    	$html['working_status'] = $working_status;
    	// end of main query by project status

    	echo json_encode($html);
    } 

    // client project status :: changing project status by project status

    public function changing_client_project_status_function()
    {
    	$id_of_project_status = $_GET['id_of_project_status'];
    	$project_id = $_GET['project_id'];
    	$project_name = $_GET['project_name'];
    	$client_id = $_GET['client_id'];
    	$lawyer_id = $_GET['lawyer_id'];

    	// checking client project status 
    	$checkingOne = ChatProjectModel::where(['client_id' => $client_id, 'project_id' => $project_id, 'project_name' => $project_name, 'lawyer_id' => $lawyer_id])->get();
    	if(count($checkingOne) > 0)
    	{
    		foreach($checkingOne as $checking1)
    		{
    			$mainProject = $checking1->project_name;
    		}
    	}
    	else
    	{

    	}
    }





    // -------------------------------2020.09.10------------------------------



    // lawyer project page status table view

    public function lawyer_project_status_all_data()
    {
    	// project status taking by lawyer

    	$projectQuery = ChatAndAcceptModel::where(['lawyer_id' => Auth::user()->id])->get();
    	$html['view_project_status'] = "";

    	// first checking : chat started
    	if(count($projectQuery) > 0)
    	{
    		$j = 1;
    		foreach($projectQuery as $projectOne)
    		{
    			
    			// main checking on job accept table 

    			$jobAcceptQuery = ChatProjectModel::where(['project_id' => $projectOne->project_id, 'project_name' => $projectOne->project_name, 'lawyer_id' => Auth::user()->id])->get();

    			// checking job accept 

    			if(count($jobAcceptQuery) > 0)
    			{
    				foreach($jobAcceptQuery as $jobAcceptCheck)
    				{
    					if($jobAcceptCheck->work_status == "started")
    					{
    						$actual_project_date = strtotime($jobAcceptCheck->project_start_date);

    						$today_date = strtotime(date('Y-m-d'));

    						if($today_date == $actual_project_date)
    						{
    							$dateQ = date('M d,y', strtotime($jobAcceptCheck->project_start_date));
    							$actual_work_status_class = "initiated";
    							$working_status = "Initiated";
    						}
    						else if($today_date > $actual_project_date)
    						{
    							$dateQ = date('M d,y', strtotime($jobAcceptCheck->project_start_date));
    							$actual_work_status_class = "in-progress";
    							$working_status = "In Progress";
    						}
    					}
    					else if($jobAcceptCheck->work_status == "completed")
    					{
    						$dateQ = date('M d,y', strtotime($jobAcceptCheck->project_start_date));
    						$actual_work_status_class = "completed";
    						$working_status = "Completed";
    					}
    					else if($jobAcceptCheck->work_status == "closed")
    					{
    						$dateQ = date('M d,y', strtotime($jobAcceptCheck->project_start_date));
    						$actual_work_status_class = "closed";
    						$working_status = "Closed";
    					}
    				}
    			}
    			else
    			{
    				$dateQ = '<span class="no-lawyer">No date</span>';
    				$actual_work_status_class = "not-started";
    				$working_status = "Not Started";
    			}

    			// get client name
    			$userQuery = User::where('id',$projectOne->client_id)->get();
    			foreach($userQuery as $uQuery)
    			{
    				$main_full_user_name = $uQuery->name." ".$uQuery->lname;
    			}
    			//  end of get client name

    			$html['view_project_status'] .= '<tr>
           											<td>'.$j.'</td>
            										<td>'.$projectOne->project_name.'</td>
            										<td>'.$main_full_user_name.'</td>
            										<td>'.$dateQ.'</td>
            										<td><span class="job-status '.$actual_work_status_class.'">'.$working_status.'</span></td>
          										</tr>';
          		$j++;
    		}
    	}
    	else
    	{
    		// proposal query 
    		$proposalQuery = ProposalSendModel::where(['lawyer_id' => Auth::user()->id])->get();

    		// checking proposal having 
    		if(count($proposalQuery) > 0)
    		{
    			$j = 1;
    			foreach($proposalQuery as $projOne)
    			{

    				// project name getting 
    				$JobAnswerClinetDescModelQuery = JobAnswerClinetDescModel::where(['id' => $projOne->project_id])->get();
    				foreach($JobAnswerClinetDescModelQuery as $mainJobQ)
    				{
    					$project_main_name = $manJobQ->projectId;
    				}

    				// get client name
    				$userQuery = User::where('id',$projOne->client_id)->get();
    				foreach($userQuery as $uQuery)
    				{
    					$main_full_user_name = $userQuery->name." ".$userQuery->lname;
    				}
    				//  end of get client name

    				// end of project name getting

    				$dateQ = date('M d,y',strtotime($projOne->created_at));
    				$actual_work_status_class = "proposal";
    				$working_status = "Proposal";

    				$html['view_project_status'] .= '<tr>
           												<td>'.$j.'</td>
            											<td>'.$project_main_name.'</td>
            											<td>'.$main_full_user_name.'</td>
            											<td>'.$dateQ.'</td>
            											<td><span class="job-status '.$actual_work_status_class.'">'.$working_status.'</span></td>
          											</tr>';

         			$j++;
    			}
    		}
    		else
    		{
    			$dateQ = '<span class="no-lawyer">No date</span>';
    			$actual_work_status_class = "not-started";
    			$working_status = "Not Started";

    			$html['view_project_status'] .= '<tr class="no-data"><td colspan="6">  No data found regarding current search </td></tr>';
    		}
    		
    	}


    	echo json_encode($html);
    }
}
