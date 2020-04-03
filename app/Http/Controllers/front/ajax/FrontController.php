<?php

namespace App\Http\Controllers\front\ajax;

use App\frontAjaxModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

        $qti = DB::table('adminquestions')->where('id',$nxt_id)->first();
        $fetch_quli = $qti->question_type;
        
        if($fetch_quli == 1 || $fetch_quli == 3){
           $category_count = DB::table('admincateques')
                           ->join('admincategories','admincategories.id','admincateques.category_id')
                           ->join('adminquestions','adminquestions.id','admincateques.question_id')
                           // ->join('adminoptions','adminquestions.id','adminoptions.ques_id')
                           ->where('admincateques.question_id',$nxt_id)
                           ->where('admincateques.category_id',$c_id)
                           // ->where('admincateques.option_id',$data)
                           ->get(); 
        }else{
            $category_count = DB::table('admincateques')
                            ->leftJoin('admincategories','admincategories.id','admincateques.category_id')
                            ->leftJoin('adminquestions','adminquestions.id','admincateques.question_id')
                            ->leftJoin('adminoptions','adminquestions.id','adminoptions.ques_id')
                            ->where('admincateques.question_id',$nxt_id)
                            ->where('admincateques.category_id',$c_id)
                            ->groupBy('adminoptions.id')
                            // ->where('admincateques.option_id',$data)
                            ->get();
        }
        
        echo json_encode($category_count);
    }

    public function nextQuesInitId()
    {
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
}
