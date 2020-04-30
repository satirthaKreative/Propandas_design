<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeTestimonialsModel;

class HomeTestimonialsController extends Controller
{
    //
    Public function index()
    {
    	$totalResult = HomeTestimonialsModel::get();
    	return view('admin.testimonialsHome.view',compact('totalResult'));
    }

    public function showAddForm()
    {
    	return view('admin.testimonialsHome.add');
    }

    public function deleteBanner(Request $request,HomeTestimonialsModel $testimonials)
    {
    	$testimonials->delete();
    	$totalResult = HomeTestimonialsModel::get();
    	return view('admin.testimonialsHome.view',compact('totalResult'));

    }

    public function showBanner($id)
    {
    	$totalResult = HomeTestimonialsModel::where('id', $id)->get();
    	return view('admin.testimonialsHome.edit',compact('totalResult'));
    }


    public function updateBanner(Request $request, HomeTestimonialsModel $testimonials)
    {

    	
    	$file = $request->file('client_img');
    	if($file != null){


    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/testimonials';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'client_name'=>$request->input('client_name'),
    	        	'client_designation'=>$request->input('client_designation'),
    	        	'client_comment'=>$request->input('client_comment'),
    	        	'client_img'=> $myActualPath
    	        ];
    	        $testimonials->update($array_data_upload);

    	        $totalResult = HomeTestimonialsModel::get();
    	        return view('admin.testimonialsHome.view',compact('totalResult'))->with('success','Successfully Added Banner');
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.testimonialsHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    	        	'client_name'=>$request->input('client_name'),
    	        	'client_designation'=>$request->input('client_designation'),
    	        	'client_comment'=>$request->input('client_comment'),
    	        ];
    	    $testimonials->update($array_data_upload);

    	    $totalResult = HomeTestimonialsModel::get();
    	    return view('admin.testimonialsHome.view',compact('totalResult'));
    	}
    	
    }


    public function createBanner(Request $request)
    {

    	
    	$file = $request->file('client_img');
    	if($file != null){
    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/testimonials';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'client_name'=>$request->input('client_name'),
    	        	'client_designation'=>$request->input('client_designation'),
    	        	'client_comment'=>$request->input('client_comment'),
    	        	'client_img'=> $myActualPath
    	        ];

    	        $insertResult = HomeTestimonialsModel::create($array_data_upload);

    	        $totalResult = HomeTestimonialsModel::get();
    	        return view('admin.testimonialsHome.view',compact('totalResult'));
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.testimonialsHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    			'client_name'=>$request->input('client_name'),
    			'client_designation'=>$request->input('client_designation'),
    			'client_comment'=>$request->input('client_comment'),
    			'client_img'=> 'frontAssets/images/no-img.jpg'
    		];

    		$insertResult = HomeTestimonialsModel::create($array_data_upload);

    		$totalResult = HomeTestimonialsModel::get();
    		return view('admin.testimonialsHome.view',compact('totalResult'));
    	}
    	
    }
}
