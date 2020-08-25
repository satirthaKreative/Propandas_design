<?php

namespace App\Http\Controllers\Icons;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\admincategory;
use App\Models\Icons\CategoryIconModel;

class CategoryIconsController extends Controller
{
    // checking icons exist availibility
    public function icon_field_manipulate()
    {
    	$countAvaliable = CategoryIconModel::where('category_id',$_GET['cId'])->count();

    	if($countAvaliable > 0)
    	{
    		$html = "yes";
    	}
    	else
    	{
    		$html = "no";
    	}
    	echo json_encode($html);
    }

}