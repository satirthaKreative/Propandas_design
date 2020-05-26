<?php

namespace App\Http\Controllers\front\clientDashboard\ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\admincategory;
use App\admincateques;
use App\adminquestion;
use App\adminoption;

class ClientAjaxController extends Controller
{
    //

    public function index()
    {
    	
    	if(session('totalQuesAnsSession')){
    		session()->forget('totalQuesAnsSession');  
    	}

    	$total_div_count = $_GET['total_div_count'];
    	$categoryWishQuestion = admincateques::where('category_id',$_GET['choose_category'])->first();
    	$first_ques_cate = $categoryWishQuestion->question_id;

    	$choose_whole_quse_data = adminquestion::where('id',$first_ques_cate)->first();

    	$question_types = $choose_whole_quse_data->question_type;

    	if($question_types != 1 || $question_types != 3)
    	{
    		$option_found_type = adminoption::where('ques_id',$first_ques_cate)->get();
    	}


    	$structure_html = '';
    	$structure_html .= '<div class="step-box" id="step-box-id-category">';

    	if($question_types == 1){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    		$structure_html .= '<input type="text" name="input_area[]" onfocusout="goToNextOne(1,'.$total_div_count.','.$first_ques_cate.',0,'.$_GET['choose_category'].')" id="input_Text'.$total_div_count.'"><small class="text-danger job-text-next">*Please select outside the box after enter your answer</small>';
    	}else if($question_types == 3){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    		$structure_html .= '<textarea name="input_area[]" onfocusout="goToNextOne(3,'.$total_div_count.','.$first_ques_cate.',0,'.$_GET['choose_category'].')" id="input_Textarea'.$total_div_count.'"></textarea><small class="text-danger job-text-next">*Please select outside the box after enter your answer</small>';
    	}else if($question_types == 2){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    		$structure_html .= '<ul class="stp-list">';
    		foreach($option_found_type as $options){
    			$structure_html .= '<li><label><input type="radio" onclick="goToNextOne(2,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$_GET['choose_category'].')" name="input_area[]" value="'.$options->id.'">'.$options->option_label.'</label></li>';
    		}
    		$structure_html .= '</ul>';
    	}else if($question_types == 4){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    		$structure_html .= '<ul class="stp-list">';
    		foreach($option_found_type as $options){
    			$structure_html .= '<li><label><input type="checkbox" onclick="goToNextOne(4,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$_GET['choose_category'].')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    		}
    		$structure_html .= '</ul>';
    	}else if($question_types == 5){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    		$structure_html .= '<select name="input_area[]" onchange="goToNextOne(5,'.$total_div_count.','.$first_ques_cate.',0,'.$_GET['choose_category'].')" id="input_Selectbox'.$total_div_count.'">';
    		$structure_html .= '<option value="">Select</option>';
    		foreach($option_found_type as $options){
    			$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    		}
    		$structure_html .= '</select>';
    	}else if($structure_html == 6){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    		$structure_html .= '<select name="input_area[]" onchange="goToNextOne(6,'.$total_div_count.','.$first_ques_cate.',0,'.$_GET['choose_category'].')" id="input_Selectbox_multi'.$total_div_count.'" multiple>';
    		$structure_html .= '<option value="">Select</option>';
    		foreach($option_found_type as $options){
    			$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    		}
    		$structure_html .= '</select>';
    	}else if($question_types == 7){
    		$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    		$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    		$structure_html .= '<ul class="stp-list">';
    		foreach($option_found_type as $options){
    			$structure_html .= '<li><label><input type="checkbox" onclick="goToNextOne(7,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$_GET['choose_category'].')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    		}
    		$structure_html .= '</ul>';
    	}
    	// $structure_html .= '<input type="button" name="" value="Next" onclick="goToNextQues('.$first_ques_cate.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    	$structure_html .= '</div>';

    	echo  json_encode($structure_html);
    }


    public function searchNextQuestion()
    {
    	$total_div_count = $_GET['total_div_count'];
    	$previous_ques_id = $_GET['ques_id'];
    	$option_val = $_GET['option_val'];
    	$cate_id = $_GET['cate_id'];

    	$quesAnsSessionClient = [
    	    'question_name' => $previous_ques_id,
    	    'Answer' => $option_val,
    	];   

    	Session::push('totalQuesAnsSession', $quesAnsSessionClient); 

    	$structure_html = '';

    	if(is_numeric($option_val)){
    		$opt_id = $option_val;
    	}else{
    		$opt_id = 0;
    	}

    	$categoryWishNextQuestion = admincateques::where(['category_id'=>$cate_id, 'question_id'=>$previous_ques_id, 'option_id'=>$opt_id])->get();
    	if(count($categoryWishNextQuestion)){
    		foreach ($categoryWishNextQuestion as $value) {
    			$next_ques_id = $value->next_ques_id;
    		}
    	}else{
    		$next_ques_id = 0;
    	}

    	if($next_ques_id != 0){
    		$next_ques_full_data_count = admincateques::where(['category_id'=>$cate_id, 'question_id'=>$next_ques_id])->count();

    		if($next_ques_full_data_count != 0){
    			$next_ques_full_data_count = admincateques::where(['category_id'=>$cate_id, 'question_id'=>$next_ques_id])->first();

    			$first_ques_cate = $next_ques_full_data_count->question_id;

    			$choose_whole_quse_data = adminquestion::where('id',$first_ques_cate)->first();

    			$question_types = $choose_whole_quse_data->question_type;

    			if($question_types != 1 || $question_types != 3)
    			{
    				$option_found_type = adminoption::where('ques_id',$first_ques_cate)->get();
    			}


    			$structure_html .= '<div class="step-box" id="step-box'.$previous_ques_id.'">';

    			if($question_types == 1){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<input type="text" name="input_area[]" onfocusout="goToNextOne(1,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Text'.$total_div_count.'"><small class="text-danger job-text-next">*Please select outside the box after enter your answer</small>';
    			}else if($question_types == 3){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<textarea name="input_area[]" onfocusout="goToNextOne(3,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Textarea'.$total_div_count.'"></textarea><small class="text-danger job-text-next">*Please select outside the box after enter your answer</small>';
    			}else if($question_types == 2){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="radio" onclick="goToNextOne(2,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]" value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';
    			}else if($question_types == 4){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="checkbox" onclick="goToNextOne(4,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';
    			}else if($question_types == 5){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    				$structure_html .= '<select name="input_area[]" onchange="goToNextOne(5,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Selectbox'.$total_div_count.'">';
    				$structure_html .= '<option value="">Select</option>';
    				foreach($option_found_type as $options){
    					$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    				}
    				$structure_html .= '</select>';
    			}else if($structure_html == 6){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    				$structure_html .= '<select name="input_area[]" onchange="goToNextOne(6,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Selectbox_multi'.$total_div_count.'" multiple>';
    				$structure_html .= '<option value="">Select</option>';
    				foreach($option_found_type as $options){
    					$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    				}
    				$structure_html .= '</select>';
    			}else if($question_types == 7){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="checkbox" onclick="goToNextOne(7,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';
    			}
    			// $structure_html .= '<input type="button" name="" value="Next" onclick="goToNextQues('.$first_ques_cate.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			$structure_html .= '</div>';

    		}else{
    			// $next_ques_full_data_count = admincateques::where(['category_id'=>$cate_id, 'question_id'=>$next_ques_id])->first();

    			// $first_ques_cate = $next_ques_full_data_count->question_id;
    			$first_ques_cate = $next_ques_id;
    			$choose_whole_quse_data = adminquestion::where('id',$first_ques_cate)->first();

    			$question_types = $choose_whole_quse_data->question_type;

    			if($question_types != 1 || $question_types != 3)
    			{
    				$option_found_type = adminoption::where('ques_id',$first_ques_cate)->get();
    			}


    			$structure_html .= '<div class="step-box" id="step-box'.$previous_ques_id.'">';

    			if($question_types == 1){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<input type="text" name="input_area[]" onfocusout="goToNextLast(1,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Text'.$total_div_count.'"><small class="text-danger">*Please select outside the box after enter your answer</small>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($question_types == 3){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<textarea name="input_area[]" onfocusout="goToNextLast(3,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Textarea'.$total_div_count.'"></textarea><small class="text-danger">*Please select outside the box after enter your answer</small>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($question_types == 2){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="radio" onclick="goToNextLast(2,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]" value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($question_types == 4){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="checkbox" onclick="goToNextLast(4,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($question_types == 5){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    				$structure_html .= '<select name="input_area[]" onchange="goToNextLast(5,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Selectbox'.$total_div_count.'">';
    				$structure_html .= '<option value="">Select</option>';
    				foreach($option_found_type as $options){
    					$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    				}
    				$structure_html .= '</select>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($structure_html == 6){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]"  value="'.$first_ques_cate.'">';
    				$structure_html .= '<select name="input_area[]" onchange="goToNextLast(6,'.$total_div_count.','.$first_ques_cate.',0,'.$cate_id.')" id="input_Selectbox_multi'.$total_div_count.'" multiple>';
    				$structure_html .= '<option value="">Select</option>';
    				foreach($option_found_type as $options){
    					$structure_html .= '<option value="'.$options->id.'">'.$options->option_label.'</option>';
    				}
    				$structure_html .= '</select>';
    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}else if($question_types == 7){
    				$structure_html .= '<h5 class="qst">'.$choose_whole_quse_data->question_name.'</h5>';
    				$structure_html .= '<input type="hidden" name="input_area[]" value="'.$first_ques_cate.'">';
    				$structure_html .= '<ul class="stp-list">';
    				foreach($option_found_type as $options){
    					$structure_html .= '<li><label><input type="checkbox" onclick="goToNextLast(7,'.$total_div_count.','.$first_ques_cate.','.$options->id.','.$cate_id.')" name="input_area[]"  value="'.$options->id.'">'.$options->option_label.'</label></li>';
    				}
    				$structure_html .= '</ul>';

    			$structure_html .= '<input type="text" id="contact_id" class="contact-class-number" placeholder="Enter Your Contact Number" name="contact_num" />';
    			$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')" disabled class="flt-search" id="next-btn'.$total_div_count.'"> ';
    			}
    			
    			$structure_html .= '</div>';
    		}

    	}else{
    		$structure_html .= '<input type="text" class="contact-class-number" placeholder="Enter Your Contact Number" id="step-box'.$previous_ques_id.'" name="contact_num" />';
    		$structure_html .= '<input type="button" name="" value="Submit" onclick="goToNextQues('.$cate_id.')"  class="flt-search" id="next-btn'.$total_div_count.'" > ';
    	}
    	
    	echo  json_encode($structure_html);
    }


    public function searchNextLast()
    {
    	$total_div_count = $_GET['total_div_count'];
    	$previous_ques_id = $_GET['ques_id'];
    	$option_val = $_GET['option_val'];
    	$cate_id = $_GET['cate_id'];


    	$quesAnsSessionClient = [
    	    'question_name' => $previous_ques_id,
    	    'Answer' => $option_val,
    	];   

    	Session::push('totalQuesAnsSession', $quesAnsSessionClient); 
    	echo  json_encode("Success");
    }

    public function submitQuesAnsData()
    {
    	$cate_id = $_GET['cate_id'];
    	$con_id = $_GET['con_id'];

    	if(session('totalQuesAnsSession'))
    	{
    	    $category_name = $cate_id;
    	    $redire= Session::get('totalQuesAnsSession');
    	    $phone_number = $con_id; 


    	    $elements = array();
    	    foreach( $redire as $key=>$data)
    	    {
    	       $elements[] = $data['question_name']."=>".$data['Answer'];

    	    }
    	    $dzz = implode(',', $elements);

    	    $array_data = [
    	        'client_id'=>Auth::user()->id,
    	        'category_id'=>$category_name,
    	        'quesAnsDescrip'=>$dzz,
    	        'phone_number'=>$phone_number,
                'projectId'=>"PROPAN".rand(10000,999999)
    	    ];
    	    DB::table('jobanswerclinetdesc')->insert($array_data);
    	    $dzz = "";
    	    session()->forget('totalQuesAnsSession');  

    	}
    	echo json_encode("Success");
    }
}
