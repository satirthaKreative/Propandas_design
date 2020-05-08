<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TermsModel;

class TermsController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.terms');
    }

    public function showInfo($id)
    {
    	$totalResult = TermsModel::where('id', $id)->get();
    	return view('admin.terms.edit',compact('totalResult'));
    }

    public function updateLegalInfo(Request $request, TermsModel $terms_condition)
    {
    	$array_data_upload = [
    		'terms'=>$request->input('terms')
    	];

    	$terms_condition->update($array_data_upload);

    	$totalResult = TermsModel::where('id', 1)->get();
    	return view('admin.terms.edit',compact('totalResult'));
    }

    public function showLegalFrontInfo()
    {
    	$totalResult = TermsModel::where('id', 1)->get();
    	echo json_encode($totalResult);
    }
}
