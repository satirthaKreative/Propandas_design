<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBannerModel;

class HomeBannerController extends Controller
{
    //
    Public function index()
    {
    	$totalResult = HomeBannerModel::get();
    	return view('admin.bannerHome.view',compact('totalResult'));
    }

    public function showAddForm()
    {
    	return view('admin.bannerHome.add');
    }

    public function deleteBanner(Request $request,HomeBannerModel $banner)
    {
    	$banner->delete();
    	$totalResult = HomeBannerModel::get();
    	return view('admin.bannerHome.view',compact('totalResult'));

    }

    public function showBanner($id)
    {
    	$totalResult = HomeBannerModel::where('id', $id)->get();
    	return view('admin.bannerHome.edit',compact('totalResult'));
    }


    public function updateBanner(Request $request, HomeBannerModel $banner)
    {

    	
    	$file = $request->file('banner_images');
    	if($file != null){


    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/banner';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'top_banner_title'=>$request->input('top_banner_title'),
    	        	'main_banner_title'=>$request->input('main_banner_title'),
    	        	'title_description'=>$request->input('title_description'),
    	        	'banner_images'=> $myActualPath
    	        ];
    	        $banner->update($array_data_upload);

    	        $totalResult = HomeBannerModel::get();
    	        return view('admin.bannerHome.view',compact('totalResult'))->with('success','Successfully Added Banner');
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.bannerHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    	        	'top_banner_title'=>$request->input('top_banner_title'),
    	        	'main_banner_title'=>$request->input('main_banner_title'),
    	        	'title_description'=>$request->input('title_description')
    	        ];
    	    $banner->update($array_data_upload);

    	    $totalResult = HomeBannerModel::get();
    	    return view('admin.bannerHome.view',compact('totalResult'))->with('success','Successfully Added Banner');
    	}
    	
    }


    public function createBanner(Request $request)
    {

    	
    	    $file = $request->file('banner_images');
    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/banner';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'top_banner_title'=>$request->input('top_banner_title'),
    	        	'main_banner_title'=>$request->input('main_banner_title'),
    	        	'title_description'=>$request->input('title_description'),
    	        	'banner_images'=> $myActualPath
    	        ];

    	        $insertResult = HomeBannerModel::create($array_data_upload);

    	        $totalResult = HomeBannerModel::get();
    	        return view('admin.bannerHome.view',compact('totalResult'))->with('success','Successfully Added Banner');
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.bannerHome.add');
    	    }
    	
    }
}
