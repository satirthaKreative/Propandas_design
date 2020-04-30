<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomeBehindPropandasModel;
use App\HomeHeadingPropandasBehind;

class HomeBehindPropandasController extends Controller
{
    //
    Public function index()
    {
    	$totalResult = HomeBehindPropandasModel::get();
    	$totalResultHeading = HomeHeadingPropandasBehind::get();
    	return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    }

    public function showAddForm()
    {
    	return view('admin.behindPropandasHome.add');
    }

    public function showBeahindHeadingAdd()
    {
    	return view('admin.behindPropandasHome.addHeading');
    }

    public function deleteBanner(Request $request,HomeBehindPropandasModel $behindpropandas)
    {
    	$behindpropandas->delete();
    	$totalResult = HomeBehindPropandasModel::get();
        $totalResultHeading = HomeHeadingPropandasBehind::get();
        return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    }

    public function showBanner($id)
    {
    	$totalResult = HomeBehindPropandasModel::where('id', $id)->get();
    	return view('admin.behindPropandasHome.edit',compact(['totalResult']));
    }

    public function showBeahindHeading($id)
    {
        $totalResult = HomeHeadingPropandasBehind::where('id', $id)->get();
        return view('admin.behindPropandasHome.edit-heading',compact(['totalResult']));
    }


    public function updateBanner(Request $request, HomeBehindPropandasModel $behindpropandas)
    {

    	
    	$file = $request->file('behind_propandas_images');
    	if($file != null){


    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/owner-img';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'owner_name'=>$request->input('owner_name'),
    	        	'designation'=>$request->input('designation'),
    	        	'behind_propandas_pdetails'=>$request->input('behind_propandas_pdetails'),
    	        	'behind_propandas_images'=> $myActualPath
    	        ];
    	        $behindpropandas->update($array_data_upload);

    	        $totalResult = HomeBehindPropandasModel::get();
                $totalResultHeading = HomeHeadingPropandasBehind::get();
                return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.behindPropandasHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    	        	'owner_name'=>$request->input('owner_name'),
    	        	'designation'=>$request->input('designation'),
    	        	'behind_propandas_pdetails'=>$request->input('behind_propandas_pdetails')
    	        ];
    	    $behindpropandas->update($array_data_upload);

    	    $totalResult = HomeBehindPropandasModel::get();
            $totalResultHeading = HomeHeadingPropandasBehind::get();
            return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    	}
    	
    }

    public function updateBannerHeading(Request $request, HomeHeadingPropandasBehind $behindpropandasheading)
    {
            $array_data_upload = [
                    'heading_name'=>$request->input('heading_name')
                ];
            $behindpropandasheading->update($array_data_upload);

            $totalResult = HomeBehindPropandasModel::get();
            $totalResultHeading = HomeHeadingPropandasBehind::get();
            return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    }


    public function createBanner(Request $request)
    {

    	
    	$file = $request->file('behind_propandas_images');
    	if($file != null){
    	    $file_name = rand(10000,99999).$file->getClientOriginalName();
    	    $file_type = $file->getClientOriginalExtension();
    	    $enc_type = $file->getClientOriginalExtension();
    	    if ($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
    	    {
    	        $real_path = $file->getRealPath();
    	        $file_size = $file->getSize();
    	        $meme_type = $file->getMimeType();
    	        $destinationPath = 'uploads/owner-img';
    	        $file->move($destinationPath,$file_name);

    	        $myActualPath = $destinationPath.'/'.$file_name;

    	        $array_data_upload = [
    	        	'owner_name'=>$request->input('owner_name'),
    	        	'designation'=>$request->input('designation'),
    	        	'behind_propandas_pdetails'=>$request->input('behind_propandas_pdetails'),
    	        	'behind_propandas_images'=> $myActualPath
    	        ];

    	        $insertResult = HomeBehindPropandasModel::create($array_data_upload);

    	        $totalResult = HomeBehindPropandasModel::get();
                $totalResultHeading = HomeHeadingPropandasBehind::get();
                return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    	        
    	    }
    	    else
    	    {
    	        $myActualPath = "";
    	        $is_uploaded = '0';
    	        $file_type = "";
    	        return view('admin.behindPropandasHome.add');
    	    }
    	}else{
    		$array_data_upload = [
    			'owner_name'=>$request->input('owner_name'),
    	        'designation'=>$request->input('designation'),
    	        'behind_propandas_pdetails'=>$request->input('behind_propandas_pdetails'),
    			'behind_propandas_images'=> 'frontAssets/images/no-img.jpg'
    		];

    		$insertResult = HomeBehindPropandasModel::create($array_data_upload);

    		$totalResult = HomeBehindPropandasModel::get();
            $totalResultHeading = HomeHeadingPropandasBehind::get();
            return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    	}
    	
    }

    public function createBanneromeHeading(Request $request)
    {

    		$array_data_upload = [
    			'heading_name'=>$request->input('heading_name')
    		];

    		$insertResult = HomeHeadingPropandasBehind::create($array_data_upload);

    		$totalResult = HomeBehindPropandasModel::get();
    		$totalResultHeading = HomeHeadingPropandasBehind::get();
    		return view('admin.behindPropandasHome.view',compact(['totalResult','totalResultHeading']));
    }
}
