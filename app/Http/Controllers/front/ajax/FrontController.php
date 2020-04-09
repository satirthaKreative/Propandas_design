<?php

namespace App\Http\Controllers\front\ajax;

use App\frontAjaxModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('admincategories')->get();
        echo json_encode($result);
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
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function show(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function edit(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    // main job category select from home
    public function categoryFuncSelect()
    {
        $data = $_GET['data'];
        $category_count = DB::table('admincateques')
                        ->join('admincategories','admincategories.id','admincateques.category_id')
                        ->join('adminquestions','adminquestions.id','admincateques.question_id')
                        ->where('admincateques.category_id',$data)
                        ->get();
        echo json_encode($category_count);
    }

    public function mycountstate()
    {
        $data = $_GET['data'];
        $category_count1 = DB::table('admincateques')
                        ->where('admincateques.category_id',$data)
                        ->count();
        echo json_encode($category_count1);
    }

    public function jobQuesOptSelect()
    {
        $data = $_GET['q_id'];
        $get_data = DB::table('adminquestions')->join('adminoptions','adminquestions.id','adminoptions.ques_id')->where('ques_id',$data)->get();
        echo json_encode($get_data);
    }

    public function myCategoryQ()
    {
        $data = $_GET['cate_id'];
        $get_category = DB::table('admincategories')->where('id',$data)->get();
        echo  json_encode($get_category);
    }

    public function nextQuestionRound()
    {

         $category_count = array();   
            
                if(!session('myClientCate'))
                {
                    Session::put('myClientCate', $_GET['c_id']);
                }
        
         
        if(isset($_GET['nxt_id']))
        {
           $nxt_id = $_GET['nxt_id']; 
        }
        if(isset($_GET['c_id']))
        {
           $c_id = $_GET['c_id'];
        }
        if(isset($_GET['opt_val']))
        {
           $opt_val = $_GET['opt_val'];
        }
        if($nxt_id != 0 )
        {
            $qti = DB::table('adminquestions')->where('id',$nxt_id)->first();
            $fetch_quli = $qti->question_type;
        }
        else
        {
            $fetch_quli = 0;
        }
        
        
        
        $checking_ques = DB::table('admincateques')->where(['category_id'=>$c_id, 'question_id'=>$nxt_id])->count();
        if($checking_ques > 0)
        {
            $category_count['my_status'] = 5;
            if($fetch_quli == 1 || $fetch_quli == 3){
               $category_count['without_opt'] = DB::table('admincateques')
                               ->join('admincategories','admincategories.id','admincateques.category_id')
                               ->join('adminquestions','adminquestions.id','admincateques.question_id')
                               // ->join('adminoptions','adminquestions.id','adminoptions.ques_id')
                               ->where('admincateques.question_id',$nxt_id)
                               ->where('admincateques.category_id',$c_id)
                               // ->where('admincateques.option_id',$data)
                               ->get(); 
            }else{
                $category_count['without_opt'] = DB::table('admincateques')
                                ->join('admincategories','admincategories.id','admincateques.category_id')
                                ->join('adminquestions','adminquestions.id','admincateques.question_id')
                                ->where('admincateques.question_id',$nxt_id)
                                ->where('admincateques.category_id',$c_id)
                                ->get(); 
                $category_count['with_opt'] = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();               
            }
        }else{
            $category_count['my_status'] = 10;
            if (Auth::user())
            {
                $category_count['user_jio'] = 'success';
            }
            else
            {
                $category_count['user_jio'] = 'error';
            }

            // check
            if($nxt_id != 0)
            {
                $category_count['my_log'] = 10;
                if($fetch_quli == 1 || $fetch_quli == 3){
                   $category_count['without_opt'] = DB::table('adminquestions')
                                    ->where('adminquestions.id',$nxt_id)
                                    ->get(); 
                }else{
                    $category_count['without_opt'] =DB::table('adminquestions')
                                    ->where('adminquestions.id',$nxt_id)
                                    ->get(); 
                    $category_count['with_opt'] = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();               
                }
            }else{
                $category_count['my_log'] = 5;
            }
        } 
        
        echo json_encode($category_count);
    }

    public function multiOptionN()
    {
        $nxt_id = $_GET['nxt_id']; 
        $quesOpt = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();
        echo json_encode($quesOpt);
    }

    public function nextQuesInitId()
    {
        $quesAnsSessionClient = [
            'question_name' => $_GET['q_id'],
            'Answer' => $_GET['opt_id'],
        ];   

        Session::push('cart', $quesAnsSessionClient);   
        

        $c_id = $_GET['c_id'];
        $q_id = $_GET['q_id'];
        if($q_id == 1 || $q_id == 3)
        {

            $q_select = DB::table('admincateques')
                        ->where('admincateques.question_id',$q_id)
                        ->where('admincateques.category_id',$c_id)
                        ->get();
        }else{
            $opt_id = $_GET['opt_id'];

            $q_select = DB::table('admincateques')
                        ->where('admincateques.question_id',$q_id)
                        ->where('admincateques.category_id',$c_id)
                        ->where('admincateques.option_id',$opt_id)
                        ->get();
        }
        echo  json_encode($q_select);
    }

    public function submitClientJobData()
    {
        $redire['redirectTo_page1'] = Session::get('myClientCate');
        $redire['son_id_json1'] = Session::get('cart');
        if(isset($_GET['phn_no']) || $_GET['phn_no'] !=''){
            $phn_no = $_GET['phn_no'];
        }else{
            $phn_no = 91;
        }
        
        Session::put('myClientPhoneCall', $phn_no);
        $redire['clientPhone'] = Session::get('myClientPhoneCall');

       if (Auth::user())
        {
            $redire['redirectTo_page'] = 1;
        }
        else
        {
            $redire['redirectTo_page'] = 0;
        }
        echo  json_encode($redire);
    }

    public function checking_email_registration()
    {
        $mail_check = $_GET['mail_check'];
        $lawyer_value = $_GET['lawyer_value'];

        $count_exist = DB::table('users')->where(['is_lawyer' => $lawyer_value, 'email' => $mail_check])->count();
        if($count_exist > 0)
        {
            $data = 0;
        }
        else
        {
            $data = 1;
        }

        echo json_encode($data);
    }
}
