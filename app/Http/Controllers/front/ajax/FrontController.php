<?php

namespace App\Http\Controllers\front\ajax;

use App\frontAjaxModel;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('admincategories')->get();
        echo json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function show(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function edit(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontAjaxModel $frontAjaxModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\frontAjaxModel  $frontAjaxModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontAjaxModel $frontAjaxModel)
    {
        //
    }

    // main job category select from home
    public function categoryFuncSelect()
    {
        $data = $_GET['data'];
        $category_count = DB::table('admincateques')
                        ->join('admincategories','admincategories.id','admincateques.category_id')
                        ->join('adminquestions','adminquestions.id','admincateques.question_id')
                        ->where('admincateques.category_id',$data)
                        ->get();
        echo json_encode($category_count);
    }

    public function mycountstate()
    {
        $data = $_GET['data'];
        $category_count1 = DB::table('admincateques')
                        ->where('admincateques.category_id',$data)
                        ->count();
        echo json_encode($category_count1);
    }

    public function jobQuesOptSelect()
    {
        $data = $_GET['q_id'];
        $get_data = DB::table('adminquestions')->join('adminoptions','adminquestions.id','adminoptions.ques_id')->where('ques_id',$data)->get();
        echo json_encode($get_data);
    }

    public function myCategoryQ()
    {
        $data = $_GET['cate_id'];
        $get_category = DB::table('admincategories')->where('id',$data)->get();
        echo  json_encode($get_category);
    }

    public function nextQuestionRound()
    {

         $category_count = array();   
            
                if(!session('myClientCate'))
                {
                    Session::put('myClientCate', $_GET['c_id']);
                }
        
         
        if(isset($_GET['nxt_id']))
        {
           $nxt_id = $_GET['nxt_id']; 
        }
        if(isset($_GET['c_id']))
        {
           $c_id = $_GET['c_id'];
        }
        if(isset($_GET['opt_val']))
        {
           $opt_val = $_GET['opt_val'];
        }
        if($nxt_id != 0 )
        {
            $qti = DB::table('adminquestions')->where('id',$nxt_id)->first();
            $fetch_quli = $qti->question_type;
        }
        else
        {
            $fetch_quli = 0;
        }
        
        
        
        $checking_ques = DB::table('admincateques')->where(['category_id'=>$c_id, 'question_id'=>$nxt_id])->count();
        if($checking_ques > 0)
        {
            $category_count['my_status'] = 5;
            if($fetch_quli == 1 || $fetch_quli == 3){
               $category_count['without_opt'] = DB::table('admincateques')
                               ->join('admincategories','admincategories.id','admincateques.category_id')
                               ->join('adminquestions','adminquestions.id','admincateques.question_id')
                               // ->join('adminoptions','adminquestions.id','adminoptions.ques_id')
                               ->where('admincateques.question_id',$nxt_id)
                               ->where('admincateques.category_id',$c_id)
                               // ->where('admincateques.option_id',$data)
                               ->get(); 
            }else{
                $category_count['without_opt'] = DB::table('admincateques')
                                ->join('admincategories','admincategories.id','admincateques.category_id')
                                ->join('adminquestions','adminquestions.id','admincateques.question_id')
                                ->where('admincateques.question_id',$nxt_id)
                                ->where('admincateques.category_id',$c_id)
                                ->get(); 
                $category_count['with_opt'] = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();               
            }
        }else{
            $category_count['my_status'] = 10;
            if (Auth::user())
            {
                $category_count['user_jio'] = 'success';
            }
            else
            {
                $category_count['user_jio'] = 'error';
            }

            // check
            if($nxt_id != 0)
            {
                $category_count['my_log'] = 10;
                if($fetch_quli == 1 || $fetch_quli == 3){
                   $category_count['without_opt'] = DB::table('adminquestions')
                                    ->where('adminquestions.id',$nxt_id)
                                    ->get(); 
                }else{
                    $category_count['without_opt'] =DB::table('adminquestions')
                                    ->where('adminquestions.id',$nxt_id)
                                    ->get(); 
                    $category_count['with_opt'] = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();               
                }
            }else{
                $category_count['my_log'] = 5;
            }
        } 
        
        echo json_encode($category_count);
    }

    public function multiOptionN()
    {
        $nxt_id = $_GET['nxt_id']; 
        $quesOpt = DB::table('adminoptions')->where('ques_id',$nxt_id)->get();
        echo json_encode($quesOpt);
    }

    public function nextQuesInitId()
    {
        
        $quesAnsSessionClient = [
            'question_name' => $_GET['q_id'],
            'Answer' => $_GET['opt_id'],
        ];   

        Session::push('cart', $quesAnsSessionClient);   
        $c_id = $_GET['c_id'];
        $q_id = $_GET['q_id'];
        $query_ques_type = DB::table('adminquestions')->where('id',$q_id)->first();
        $data_Query1 = $query_ques_type->question_type; 
        
        if($data_Query1 == 1 || $data_Query1 == 3)
        {
            $q_select = DB::table('admincateques')
                        ->where('admincateques.question_id',$q_id)
                        ->where('admincateques.category_id',$c_id)
                        ->get();
            $q_select['next_del_next_id'] = 1;
        }else{
            $opt_id = $_GET['opt_id'];

            $q_count_select = DB::table('admincateques')
                        ->where('admincateques.question_id',$q_id)
                        ->where('admincateques.category_id',$c_id)
                        ->where('admincateques.option_id',$opt_id)
                        ->count();
            if($q_count_select>0){
                $q_select = DB::table('admincateques')
                        ->where('admincateques.question_id',$q_id)
                        ->where('admincateques.category_id',$c_id)
                        ->where('admincateques.option_id',$opt_id)
                        ->get();
                $q_select['next_del_next_id'] = 1;
            } else {
                $q_select['next_del_next_id'] = 0;
            }
        }
        echo  json_encode($q_select);
    }

    public function submitClientJobData()
    {
        $redire['redirectTo_page1'] = Session::get('myClientCate');
        $redire['son_id_json1'] = Session::get('cart');
        $phn_no = 91;
        if($_GET['phn_no'] !=''){
            $phn_no = $_GET['phn_no'];
        }
        
        Session::put('myClientPhoneCall', $phn_no);
        $redire['clientPhone'] = Session::get('myClientPhoneCall');

       if (Auth::user())
        {
            $redire['redirectTo_page'] = 1;
        }
        else
        {
            $redire['redirectTo_page'] = 0;
        }
        echo  json_encode($redire);
    }

    public function checking_email_registration()
    {
        $mail_check = $_GET['mail_check'];
        $lawyer_value = $_GET['lawyer_value'];

        $count_exist = DB::table('users')->where(['is_lawyer' => $lawyer_value, 'email' => $mail_check])->count();
        if($count_exist > 0)
        {
            $data = 0;
        }
        else
        {
            $data = 1;
        }

        echo json_encode($data);
    }
    
    // client or lawyer dashboard country show
    public function country_change_dashboard()
    {
        $country_data = $_GET['country_val'];
        $query = DB::table('country_list')
                        ->where('country_list.id',$country_data)
                        ->first();
        echo json_encode($query);
    }

    // update profile edit page
    public function updateProfilePage()
    {
        $user_id = $_GET['profileId'];
        $name = $_GET['name'];
        $lname = $_GET['lname'];
        $contact_no = $_GET['contact_no'];
        $address1 = $_GET['address1'];
        $address2 = $_GET['address2'];
        $city = $_GET['city'];
        $zipcode = $_GET['zipcode'];

        $where_array = [
            'name' => $name,
            'lname' => $lname,
            'phn_num' => $contact_no,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'zipcode' => $zipcode,
        ];

        $dbQuery = DB::table('users')->where('id',$user_id)->update($where_array);
        if($dbQuery)
        {
            $dataQ = 1;
        }else{
            $dataQ = 2;
        }
        echo json_encode($dataQ);
    }

    // update profile password page
    public function updateProfilePassPage()
    {
        $user_id = $_GET['profileId'];
        $pass = $_GET['pass'];
        $cpass = $_GET['cpass'];


        if($pass == $cpass){
            $where_array = [
                'password' => Hash::make($pass),
            ];

            $dbQuery = DB::table('users')->where('id',$user_id)->update($where_array);
            if($dbQuery)
            {
                $dataQ = 1;
            }else{
                $dataQ = 2;
            }
        }else{
            $dataQ = 3;
        }
        
        echo json_encode($dataQ);
    }

    // update lawyer profile page
    public function updateLawyerProfilePage()
    {
        $user_id = $_GET['profileId'];
        $name = $_GET['name'];
        $lname = $_GET['lname'];
        $phn_no = $_GET['phn_no'];
        $law_firm = $_GET['law_firm'];
        $law_firm_address = $_GET['law_firm_address'];
        $city = $_GET['city'];
        $zipcode = $_GET['zipcode'];

        $where_array = [
            'name' => $name,
            'lname' => $lname,
            'phn_num' => $phn_no,
            'law_firm' => $law_firm,
            'law_firm_address' => $law_firm_address,
            'city' => $city,
            'zipcode' => $zipcode,
        ];

        $dbQuery = DB::table('users')->where('id',$user_id)->update($where_array);
        if($dbQuery)
        {
            $dataQ = 1;
        }else{
            $dataQ = 2;
        }
        echo json_encode($dataQ);
    }
    // image upload profile
    public function myImgFileUploadProfile(Request $request){

            $auth_profile_id = 0;
            if(isset(Auth::user()->id)){
                $auth_profile_id = Auth::user()->id;
            }


            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $myNew_file = rand(0,999999).$file_name;
            $file_type = $file->getClientOriginalExtension();
            $enc_type = $file->getClientOriginalExtension();
            $data_checking = 0;
            if($enc_type == 'jpeg' || $enc_type == 'jpg' || $enc_type == 'webp' || $enc_type == 'png' || $enc_type == 'gif')
            {
                $real_path = $file->getRealPath();
                $file_size = $file->getSize();
                $meme_type = $file->getMimeType();
                $destinationPath = 'uploads/dashboard';
                $file->move($destinationPath,$myNew_file);

                $myActualPath = $destinationPath.'/'.$myNew_file;


                User::where('id', $auth_profile_id)
                       ->update([
                           'profileImg' => $myActualPath
                        ]);
                $data_checking = 1;
                
            }
            else
            {
                $myActualPath = "";
                $is_uploaded = '0';
                $file_type = "";
                $data_checking = 0;
            }

            
        echo json_encode($data_checking);
        
    }

    public function ajaxPhoneVerifySendData(){
        $phn_num = $_POST['phn_num_send'];
        $my_rand = rand(100000,999999);
        Session::put('phn_num_rand', $my_rand);
        $data_session = Session::get('phn_num_rand');

        if($data_session != ""){
            // Authorisation details.
            $username = "schwarzldaniel@hotmail.com";
            $hash = "3aedb0226bf6a62a3063b82254271567a9ff3dc38ca9ea608adb6e16cf2d452f";

            // Config variables. Consult http://api.textlocal.in/docs for more info.
            $test = "0";

            // Data for text message. This is the text message data.
            $sender = "Propan"; // This is who the message appears to be from.
            $numbers = "$phn_num"; // A single number or a comma-seperated list of numbers
            $message = "Your Propandas One time Password is ".$my_rand;
            // 612 chars or less
            // A single number or a comma-seperated list of numbers
            $message = urlencode($message);
            $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
            $ch = curl_init('http://api.textlocal.in/send/?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch); // This is the result from the API
            curl_close($ch);
            if($result != ""){
                $data_s = $data_session;
            }else{
                $data_ = 0;
            }
            
        }else{
            $data_s = 0;
        }
        echo json_encode($data_s);
    }

    public function ajaxPhoneVerifyData(){
        $valid_code = $_POST['valid_code'];
        $data_session = Session::get('phn_num_rand');

        $auth_profile_id = 0;
        if(isset(Auth::user()->id)){
            $auth_profile_id = Auth::user()->id;
        }

        if($data_session == $valid_code){
            
            User::where('id', $auth_profile_id)
                   ->update([
                       'verify_phn' => 1
                    ]);
            $data_s = 1;
        }else{
            $data_s = 0;
        }
        echo json_encode($data_s);
    }


    public function ajaxHomeBanner()
    {
        $selectWhere = DB::table('banner_table')->get();
        echo json_encode($selectWhere);
    }

    public function ajaxHomeWork()
    {
        $selectWhere = DB::table('howitwork_tbl')->get();
        echo json_encode($selectWhere);
    }

    public function ajaxHomeTestimonials()
    {
        $selectWhere = DB::table('testimonials_tbl')->get();
        echo json_encode($selectWhere);
    }

    public function ajaxHomeBehindPropandas()
    {
        $selectWhere['behindPropans'] = DB::table('behind_propandas_tbl')->get();
        $selectWhere['behindPropansHeading'] = DB::table('home_probehind_heading_tbl')->get();
        echo json_encode($selectWhere);
    }

   
}
