<?php

namespace App\Http\Controllers\front\lawyerDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\admincategory;
use App\Country_model;
use App\JobAnswerClinetDescModel;
use App\LawyerNotificationModel;
use App\lawyerCategoryModel;
use App\User;
use App\Models\AcademicModel;
use App\Models\languageModel;
use App\Models\LawSchoolsAttendedModel;

class AcademicProfileController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.lawyer.academic-profile');
    }

    public function language()
    {
    	$languageQuery = languageModel::all();
    	$html = '';
    	foreach($languageQuery as $lang)
    	{
    		$html .= '<option value="'.$lang->name.'">'.$lang->name.'</option>';
    	}
    	echo  json_encode($html);
    }

    public function law_school()
    {
    	$languageQuery = LawSchoolsAttendedModel::all();
    	$html = '';
    	foreach($languageQuery as $lang)
    	{
    		$html .= '<option value="'.$lang->attendance_school_law.'">'.$lang->attendance_school_law.'</option>';
    	}
    	echo  json_encode($html);
    }

    public function store(Request $request)
    {
        $count_query_specification = lawyerCategoryModel::where(['user_id' => Auth::user()->id])->count();
    		// law school attendance select multiple
    		$elements = array();
    		foreach ($_POST['law_school_attendance'] as $key_value) {
    			$elements[] = $key_value; 
    		}
    		$array = implode(',',$elements);

    		// language select multiple
    		$elements1 = array();
    		foreach ($_POST['languages'] as $key_value1) {
    			$elements1[] = $key_value1; 
    		}
    		$array1 = implode(',',$elements1);
    		
    		// association certification file
            if($request->hasFile('association_certification')){
                        $file = $request->file('association_certification');
                        $file_name = $file->getClientOriginalName();
                        $file_type = $file->getClientOriginalExtension();
                        $enc_type = $file->getClientOriginalExtension();
                        if($enc_type == 'docx' || $enc_type == 'doc' || $enc_type == 'pdf' || $enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
                        {
                            $real_path = $file->getRealPath();
                            $file_size = $file->getSize();
                            $meme_type = $file->getMimeType();
                            $destinationPath = 'uploads/profile-doc';
                            $file->move($destinationPath,$file->getClientOriginalName());

                            $myActualPath = $destinationPath.'/'.$file_name;
                        }
            }else{
                if($count_query_specification > 0){
                    $get_query_path = AcademicModel::where(['user_id' => Auth::user()->id])->get();
                    foreach($get_query_path as $get_jeta){
                        $myActualPath = $get_jeta->association_certification;
                    }
                    
                }else{
                    $myActualPath = '';
                }
            }
    		
            // address_proof file
            if($request->hasFile('address_proof')){
            $file1 = $request->file('address_proof');
            $file_name1 = $file1->getClientOriginalName();
            $file_type1 = $file1->getClientOriginalExtension();
            $enc_type1 = $file1->getClientOriginalExtension();
            if($enc_type1 == 'docx' || $enc_type1 == 'doc' || $enc_type1 == 'pdf' || $enc_type1 == 'jpeg' || $enc_type1 == 'jpg' || $enc_type1 == 'webp' || $enc_type1 == 'png' || $enc_type1 == 'gif')
            {
                $real_path1 = $file1->getRealPath();
                $file_size1 = $file1->getSize();
                $meme_type1 = $file1->getMimeType();
                $destinationPath1 = 'uploads/profile-doc';
                $file1->move($destinationPath1,$file1->getClientOriginalName());

                $myActualPath1 = $destinationPath1.'/'.$file_name1;
               
            }
            }else{
                if($count_query_specification > 0){
                    $get_query_path1 = AcademicModel::where(['user_id' => Auth::user()->id])->get();
                    foreach($get_query_path1 as $get_jeta1){
                        $myActualPath1 = $get_jeta1->address_proof;
                    }
                    
                }else{
                    $myActualPath1 = '';
                }
            }
            // identity_proof file
            if($request->hasFile('identity_proof')){

            $file2 = $request->file('identity_proof');
            $file_name2 = $file2->getClientOriginalName();
            $file_type2 = $file2->getClientOriginalExtension();
            $enc_type2 = $file2->getClientOriginalExtension();
            if($enc_type2 == 'docx' || $enc_type2 == 'doc' || $enc_type2 == 'pdf' || $enc_type2 == 'jpeg' || $enc_type2 == 'jpg' || $enc_type2 == 'webp' || $enc_type2 == 'png' || $enc_type2 == 'gif')
            {
                $real_path2 = $file2->getRealPath();
                $file_size2 = $file2->getSize();
                $meme_type2 = $file2->getMimeType();
                $destinationPath2 = 'uploads/profile-doc';
                $file2->move($destinationPath2,$file2->getClientOriginalName());

                $myActualPath2 = $destinationPath2.'/'.$file_name2;
            }
            }else{
                if($count_query_specification > 0){
                    $get_query_path2 = AcademicModel::where(['user_id' => Auth::user()->id])->get();
                    foreach($get_query_path2 as $get_jeta2){
                        $myActualPath2 = $get_jeta2->identity_proof;
                    }
                    
                }else{
                    $myActualPath2 = '';
                }
            }

            // others 
            $heading_data = $_POST['heading'];
            $academic_details = $_POST['academic_details'];
            $other_services = $_POST['other_services'];
            $hourly_rate = $_POST['hourly_rate'];
            $work_like = $_POST['work_like'];
            $law_country = $_POST['law_country'];
            $bank_fname = $_POST['bank_fname'];
            $bank_lname = $_POST['bank_lname'];
            $bank_bic = $_POST['bank_bic'];
            $bank_iban = $_POST['bank_iban'];
            // end others

	    	$request_array_insert = [
	    		'heading' => $heading_data,
	    		'academic_details' => $academic_details,
	    		'association_certification' => $myActualPath,
	    		'address_proof' => $myActualPath1,
	    		'identity_proof' => $myActualPath2,
	    		'law_school_attendance' => $array,
	    		'other_services' => $other_services,
	    		'hourly_rate' => $hourly_rate,
	    		'work_like' => $work_like,
	    		'law_country' => $law_country,
	    		'languages' => $array1,
	    		'bank_fname' => $bank_fname,
	    		'bank_lname' => $bank_lname,
	    		'bank_bic' => $bank_bic,
	    		'bank_iban' => $bank_iban,
	    		'user_id' => Auth::user()->id
	    	];

    	// 	provider specification
	    
	    if($count_query_specification > 0)
	    {
	    	$deleteQueryTo = lawyerCategoryModel::where(['user_id' => Auth::user()->id])->delete();
	    	foreach ($_POST['category_id'] as $key_value2) {
	    		DB::table('lawyer_category_models')->insert(
	    			['user_id' => Auth::user()->id, 'category_id' =>  $key_value2 ]
	    		);
    		}
	    }else{
	    	foreach ($_POST['category_id'] as $key_value2) {
    			$insertQueryTo = lawyerCategoryModel::insert(['category_id' => $key_value2, 'user_id' => Auth::user()->id ]);
    		}
	    }
    	

    	// Academic query 

	    $query_count_academic = AcademicModel::where(['user_id' => Auth::user()->id])->count();

	    if($query_count_academic > 0)
	    {
	    	$insertQueryAcademicProfileQuery = AcademicModel::where(['user_id' => Auth::user()->id])->update($request_array_insert);
	    }
	    else
	    {
	    	$insertQueryAcademicProfileQuery = AcademicModel::insert($request_array_insert);
	    }

    	//end query academic
    	echo "success";
    }
    public function category_lawyer_speacialization_ajax()
    {
        $all_cateQuery = admincategory::all();
        $count_user_speacialization = lawyerCategoryModel::where(['user_id' => Auth::user()->id])->count();
        $html = '';
        // $html .= '<option value="">Specialization</option>';
        if($count_user_speacialization > 0){
            
            foreach ($all_cateQuery as $key_value1) {
                $get_user_speacialization_count = lawyerCategoryModel::where(['user_id' => Auth::user()->id, 'category_id' => $key_value1->id])->count();
                if($get_user_speacialization_count > 0){
                    $html .= '<option value="'.$key_value1->id.'" selected="selected">'.$key_value1->category_name.'</option>';
                }else{
                    $html .= '<option value="'.$key_value1->id.'">'.$key_value1->category_name.'</option>';
                }
            }
        }else{
            foreach ($all_cateQuery as $key_value) {
                $html .= '<option value="'.$key_value->id.'">'.$key_value->category_name.'</option>';
            }
        }

        echo json_encode($html);
    }

    // academic profile checking ajax
    public function academic_profile_checking_data_ajax()
    {
        $countQuery = AcademicModel::where('user_id',Auth::user()->id)->count();
        if($countQuery > 0){
            $data['count_res'] = 1;
            $getQuery = AcademicModel::where('user_id',Auth::user()->id)->get();
            foreach($getQuery as $get_query_select)
            {

                $data['heading'] = $get_query_select->heading;
                $data['academic_details'] = $get_query_select->academic_details;
                    $data['association_certification'] = $get_query_select->association_certification;
            
                    $data['identity_proof'] = $get_query_select->identity_proof;
                
                $data['bank_fname'] = $get_query_select->bank_fname;
                
                    $data['address_proof'] = $get_query_select->address_proof;
               
                 $data['law_school_attendance'] = $get_query_select->law_school_attendance;
                $data['other_services'] = $get_query_select->other_services;
                $data['hourly_rate'] = $get_query_select->hourly_rate;
                $data['work_like'] = $get_query_select->work_like;
                $data['law_country'] = $get_query_select->law_country;
                $data['languages'] = $get_query_select->languages;
                $data['bank_lname'] = $get_query_select->bank_lname;
                $data['bank_bic'] = $get_query_select->bank_bic;
                $data['bank_iban'] = $get_query_select->bank_iban;

                // explode 1,2
                $my_explode_data = explode(',',$get_query_select->law_school_attendance);
                $stack = array();
                foreach($my_explode_data as $data_new1)
                {
                    array_push($stack, $data_new1);
                }
                $data['stack'] = $stack;
                // explode lang
                $my_explode_data1 = explode(',',$get_query_select->languages);
                $lang = array();
                foreach($my_explode_data1 as $lang_new1)
                {
                    array_push($lang, $lang_new1);
                }
                $data['lang'] = $lang;
            }
        }else{
            $data['count_res'] = 0;
        }
        echo json_encode($data);
    }
}