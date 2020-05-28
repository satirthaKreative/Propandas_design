<?php

namespace App\Http\Controllers\Admin;

use App\AdminSystemMsgModel;
use App\User;
use App\ProposalSendModel;
use App\JobAnswerClinetDescModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminSystemMsg extends Controller
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
        return view('admin.systeMessage.add');
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
        $request->validate([
            'administrator_msg' => 'required',
            'client_or_lawyer_type' => 'required',
            'client_or_lawyer_id' => 'required',
        ]);

        $insert_array = [
            'administrator_msg' => $request->input('administrator_msg'),
            'client_or_lawyer_type' => $request->input('client_or_lawyer_type'),
            'client_or_lawyer_id' => $request->input('client_or_lawyer_id'),
            'project_name' => $request->input('project_name'),
        ];
        AdminSystemMsgModel::create($insert_array);
        return redirect('/admin/system-message/')->with('success','System Message Successfully Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminSystemMsgModel  $adminSystemMsgModel
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSystemMsgModel $adminSystemMsgModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminSystemMsgModel  $adminSystemMsgModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSystemMsgModel $adminSystemMsgModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminSystemMsgModel  $adminSystemMsgModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSystemMsgModel $adminSystemMsgModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminSystemMsgModel  $adminSystemMsgModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSystemMsgModel $adminSystemMsgModel)
    {
        //
    }

    // client project-lawyer name

    public function show_client_by_type()
    {
        $user_id = $_GET['u_id'];

        $query = User::where(['is_lawyer' => $user_id])->get();
        echo  json_encode($query);
    }


    // Project name 

    public function show_project_by_client()
    {
        $user_name_id = $_GET['user_name_id'];

        $client_type = User::where(['id' => $user_name_id])->get();

        foreach($client_type as $client_show_name)
        {
            $is_lawyer_not = $client_show_name->is_lawyer;
        }

        $html = '<label>Projects Name:</label><div class="input-group"><div class="input-group-addon"><i class="fa fa-file"></i></div>';
        if($is_lawyer_not == 1){
            $query = ProposalSendModel::where(['lawyer_id' => $user_name_id])->get();
            $count_query = ProposalSendModel::where(['lawyer_id' => $user_name_id])->count();

            if($count_query > 0){
                $html .= '<select class="form-control" name="project_name" ><option value="">Select a project</option>';
                foreach($query as $query_tags){
                    $getJobs = JobAnswerClinetDescModel::where(['id' => $query_tags->project_id])->get();
                    foreach($getJobs as $get_jobs)
                    {
                        $html .= '<option value="'.$get_jobs->projectId.'">'.$get_jobs->projectId.'</option>';
                    }
                }
                $html .= '</select>';
            }else if($count_query == 0){
                $html .= '<input type="text" class="form-control" name="project_name" />';
            }
        }else if($is_lawyer_not == 0){
            $query = JobAnswerClinetDescModel::where(['client_id' => $user_name_id])->get();
            $count_query = JobAnswerClinetDescModel::where(['client_id' => $user_name_id])->count();

            if($count_query > 0){
                $html .= '<select class="form-control" name="project_name" ><option value="">Select a project</option>';
                foreach($query as $query_tags){
                    $html .= '<option value="'.$query_tags->projectId.'">'.$query_tags->projectId.'</option>';
                }
                $html .= '</select>';
            }else if($count_query == 0){
                $html .= '<input type="text" class="form-control" name="project_name" />';
            }
        }

        $html .='</div>';

        $html1 = $html;

        echo  json_encode($html1);
    }
} 