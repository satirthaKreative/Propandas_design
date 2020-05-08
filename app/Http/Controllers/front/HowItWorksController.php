<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HowItWorksModel;

class HowItWorksController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.how-it-works');
    }

    public function showInfo($id)
    {
    	$totalResult = HowItWorksModel::where('id', $id)->get();
    	return view('admin.howitworks.edit',compact('totalResult'));
    }

    public function updateLegalInfo(Request $request, HowItWorksModel $how_it_works)
    {
    	$array_data_upload = [
    		'video_iframe_links'=>$request->input('video_iframe_links'),
    		'post_your_job_detail1'=>$request->input('post_your_job_detail1'),
    		'post_your_job_detail2'=>$request->input('post_your_job_detail2'),
    		'get_proposal1'=>$request->input('get_proposal1'),
    		'get_proposal2'=>$request->input('get_proposal2'),
    		'hire_lawyer1'=>$request->input('hire_lawyer1'),
    		'hire_lawyer2'=>$request->input('hire_lawyer2'),
    		'register_yourself1'=>$request->input('register_yourself1'),
    		'register_yourself2'=>$request->input('register_yourself2'),
    		'search_job1'=>$request->input('search_job1'),
    		'search_job2'=>$request->input('search_job2'),
    		'get_a_client1'=>$request->input('get_a_client1'),
    		'get_a_client2'=>$request->input('get_a_client2'),
    	];

    	$how_it_works->update($array_data_upload);

    	$totalResult = HowItWorksModel::where('id', 1)->get();
    	return view('admin.howitworks.edit',compact('totalResult'));
    }

    public function showLegalFrontInfo()
    {
    	$totalResult = HowItWorksModel::where('id', 1)->get();
    	echo json_encode($totalResult);
    }
}
