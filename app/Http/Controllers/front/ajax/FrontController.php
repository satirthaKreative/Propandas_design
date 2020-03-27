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
        $get_data = DB::table('adminoptions')->where('ques_id',$data)->get();
        echo json_encode($get_data);
    }

    public function myCategoryQ()
    {
        $data = $_GET['cate_id'];
        $get_category = DB::table('admincategories')->where('id',$data)->get();
        echo  json_encode($get_category);
    }
}
