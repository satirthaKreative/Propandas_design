<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HowItWorkModel;

class HowItWorkController extends Controller
{
    //
    //
    Public function index()
    {
    	$totalResult = HowItWorkModel::get();
    	return view('admin.workHome.view',compact('totalResult'));
    }

    public function showAddForm()
    {
    	return view('admin.workHome.add');
    }

    public function deleteBanner(Request $request,HowItWorkModel $banner)
    {
    	$banner->delete();
    	$totalResult = HowItWorkModel::get();
    	return view('admin.workHome.view',compact('totalResult'));

    }

    public function showBanner($id)
    {
    	$totalResult = HowItWorkModel::where('id', $id)->get();
    	return view('admin.workHome.edit',compact('totalResult'));
    }


    public function updateBanner(Request $request, HowItWorkModel $howitwork)
    {

    	
    	$file = $request->file('howit_images');
    	if($file != null){


    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/howitworks';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;


    	        $array_data_upload = [
    	        	'heading_title'=>$request->input('heading_title'),
    	        	'descriptions'=>$request->input('descriptions'),
    	        	'year_count'=>$request->input('year_count'),
    	        	'year_text'=>$request->input('year_text'),
    	        	'contact_no'=>$request->input('contact_no'),
    	        	'contact_text'=>$request->input('contact_text'),
    	        	'howit_images'=> $myActualPath
    	        ];

    	        $howitwork->update($array_data_upload);

    	        $totalResult = HowItWorkModel::get();
    	        return view('admin.workHome.view',compact('totalResult'));
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.workHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    	        	'heading_title'=>$request->input('heading_title'),
    	        	'descriptions'=>$request->input('descriptions'),
    	        	'year_count'=>$request->input('year_count'),
    	        	'year_text'=>$request->input('year_text'),
    	        	'contact_no'=>$request->input('contact_no'),
    	        	'contact_text'=>$request->input('contact_text'),
    	        ];
    	    $howitwork->update($array_data_upload);

    	    $totalResult = HowItWorkModel::get();
    	    return view('admin.workHome.view',compact('totalResult'));
    	}
    	
    }


    public function createBanner(Request $request)
    {

    	
    	    $file = $request->file('howit_images');
    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/howitworks';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;


    	        $array_data_upload = [
    	        	'heading_title'=>$request->input('heading_title'),
    	        	'descriptions'=>$request->input('descriptions'),
    	        	'year_count'=>$request->input('year_count'),
    	        	'year_text'=>$request->input('year_text'),
    	        	'contact_no'=>$request->input('contact_no'),
    	        	'contact_text'=>$request->input('contact_text'),
    	        	'howit_images'=> $myActualPath
    	        ];

    	        $insertResult = HowItWorkModel::create($array_data_upload);

    	        $totalResult = HowItWorkModel::get();
    	        return view('admin.workHome.view',compact('totalResult'));
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.workHome.add');
    	    }
    	
    }
}
