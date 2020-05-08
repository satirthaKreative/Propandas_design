<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminLegalinfoModel;

class LegalInfoController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.legal-info');
    }

    public function showInfo($id)
    {
    	$totalResult = AdminLegalinfoModel::where('id', $id)->get();
    	return view('admin.legal-info.edit',compact('totalResult'));
    }

    public function updateLegalInfo(Request $request, AdminLegalinfoModel $legalinfo)
    {
    	$array_data_upload = [
    		'address_one'=>$request->input('address_one'),
    		'address_two'=>$request->input('address_two'),
    		'email_address'=>$request->input('email_address'),
    		'phone_number'=>$request->input('phone_number'),
    		'legal_heading'=>$request->input('legal_heading'),
    		'heading_details'=>$request->input('heading_details'),
    		'copyright'=>$request->input('copyright'),
    		'external_links'=>$request->input('external_links')
    	];

    	$legalinfo->update($array_data_upload);

    	$totalResult = AdminLegalinfoModel::where('id', 1)->get();
    	return view('admin.legal-info.edit',compact('totalResult'));
    }

    public function showLegalFrontInfo()
    {
    	$totalResult = AdminLegalinfoModel::where('id', 1)->get();
    	echo json_encode($totalResult);
    }
}
