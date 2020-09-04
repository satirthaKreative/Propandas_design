<?php

namespace App\Http\Controllers\front\proposal;

use App\models\proposal\ChatProposalModel;
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


class ChatProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\proposal\ChatProposalModel  $chatProposalModel
     * @return \Illuminate\Http\Response
     */
    public function show(ChatProposalModel $chatProposalModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\proposal\ChatProposalModel  $chatProposalModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatProposalModel $chatProposalModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\proposal\ChatProposalModel  $chatProposalModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatProposalModel $chatProposalModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\proposal\ChatProposalModel  $chatProposalModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatProposalModel $chatProposalModel)
    {
        //
    }

    public function accepting_proposal_checking()
    {
        $clientID = $_GET['clientID'];
        $projectID = $_GET['projectID'];
        $projectName = $_GET['projectName'];
        $jobBeforeID = $_GET['jobBeforeID'];
        $lawyerID = $_GET['lawyerID'];

        // by default : "not acepting" & by checking : "accepting"
        // checking column : "propoal_act"


        $checkingProposal = ProposalSendModel::where(['project_id' => $projectID, 'client_id' => $clientID, 'lawyer_id' => $lawyerID])->count();
        if($checkingProposal > 0)
        {
            $returnData = 'yes_data';
        }
        else if($checkingProposal == 0)
        {
            $returnData = 'no_data';
        }
        else
        {
            $returnData = 'error';
        }


        echo json_encode($returnData);
   }

   // submit proposal

   public function submit_chat_proposal_from_client()
   {
        $proj_id = $_GET['proposal_project_id'];
        $proj_name = $_GET['proposal_project_name'];
        $proj_client_id = $_GET['proposal_project_client_id'];
        $proj_lawyer_id = $_GET['proposal_project_lawyer_id'];

        $proj_des = $_GET['proposal_project_lawyer_description'];
        $proj_comment = $_GET['proposal_project_lawyer_comments'];
        $proj_bill_type = $_GET['proposal_project_billing_type'];
        $proj_bill_rate = $_GET['proposal_project_billing_rate'];

        $pre_exist_count = ProposalSendModel::where(['lawyer_id' => $proj_lawyer_id, 'project_id' => $proj_id, 'client_id' => $proj_client_id,])->count();

        if($pre_exist_count > 0)
        {
            $msg = "already_exist";
        }
        else
        {
            $insertProposalArr = [
                'lawyer_des' => $proj_des,
                'lawyer_comment' => $proj_comment,
                'billing_option' => $proj_bill_type,
                'billing_rate' => $proj_bill_rate,
                'lawyer_id' => $proj_lawyer_id,
                'project_id' => $proj_id,
                'client_id' => $proj_client_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];


            $insert_chat_proposal = ProposalSendModel::insert($insertProposalArr);
            $post_count = ProposalSendModel::count();

            if($insert_chat_proposal)
            {
                $msg = "success";
            }
            else
            {
                $msg  = "error";
            }
        }
        
        echo json_encode($msg);
    }

    // submit acceptation proposal

    public function submit_acceptation_proposal()
    {
        $clientID = $_GET['clientID'];
        $projectID = $_GET['projectID'];
        $projectName = $_GET['projectName'];
        $jobBeforeID = $_GET['jobBeforeID'];
        $lawyerID = $_GET['lawyerID'];

        $checkingQuery = ProposalSendModel::where(['project_id' => $projectID, 'client_id' => $clientID, 'lawyer_id' => $lawyerID, 'propoal_act' => 'accepting'])->count();
        if($checkingQuery > 0)
        {
            $msg = "already_exists";
        }
        else if($checkingQuery == 0)
        {
            // get proposal details
            $get_proposal_details = ProposalSendModel::where(['project_id' => $projectID, 'client_id' => $clientID, 'lawyer_id' => $lawyerID])->get();
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
            // proposal get


            $my_implode = $clientID.",".$lawyerID;
            $mainInsertArr = [
                'client_id' =>$clientID,
                'lawyer_id' =>$lawyerID,
                'project_id' =>$projectID,
                'project_name' =>$projectName,
                'budget_of_project' => $price.$main_price,
                'work_status' => 'started',
                'project_start_date' => date('Y-m-d'),
                'created_at' =>date('Y-m-d'),
                'updated_at' =>date('Y-m-d'),
                'total_users_ids' =>$my_implode
            ];

            // updating accepting on particular project

            $updateQuery = $get_proposal_details = ProposalSendModel::where(['project_id' => $projectID, 'client_id' => $clientID, 'lawyer_id' => $lawyerID])->update(['propoal_act' => 'accepting']);

            // main insert details 

            $mainInsertQuery = ChatProjectModel::insert($mainInsertArr);

            if($mainInsertArr)
            {
                $msg = "success";
            }
            else
            {
                $msg = "error";
            }

        } 
        else
        {
            $msg = "server_error";
        }
        
        echo json_encode($msg);

    }

    // chat

    public function chatInvitation()
    {
        
    } 


     
}
