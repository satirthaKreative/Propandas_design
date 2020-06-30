<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


class ProgressBarController extends Controller
{
    //
    public function index()
    {
    	$countQuery = DB::table('academic_models')->where('user_id', Auth::user()->id)->count();
    	if($countQuery > 0)
    	{
    		$mQuery = DB::table('academic_models')->where('user_id', Auth::user()->id)->get();
    		foreach($mQuery as $m1){
    			  
    			$i = 0;
    			if($m1->heading != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->academic_details != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->association_certification != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->address_proof != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->identity_proof != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->law_school_attendance != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->other_services != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->hourly_rate != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->work_like != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->law_country != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->languages != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->bank_fname != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->bank_lname != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->bank_bic != '')
    			{
    				$i = $i+1;		
    			}
    			if($m1->bank_iban != '')
    			{
    				$i = $i+1;		
    			}

    			if($i < 6)
    			{
    				$data = "70%";
    			}
    			else if($i > 5 && $i < 11)
    			{
    				$data = "80%";
    			}
    			else if($i > 10 && $i < 15)
    			{
    				$data = "90%";
    			}
    			else
    			{
    				$data = "100%";
    			}
    		}
    	}
    	else
    	{
    		$data = "60%";
    	}

    	echo  json_encode($data);
    }


    // lawyer review
    public function lawyer_review()
    {
        return view('frontend.front-pages.client.lawyer-review');
    }

    // lawyer review ajax
    public function lawyer_review_ajax()
    {
        $uid = $_GET['page_extend'];

        $userQuery = User::where('id',$uid)->get();
        foreach($userQuery as $u1)
        {
            $user_name = $u1->name.' '.$u1->lname;
            $user_city = $u1->city;
            $user_country = $u1->country;

            $get_country = DB::table('country_list')->where('id',$user_country)->get();
            foreach($get_country as $gc)
            {
                $country_name = $gc->nicename;
            }

            $data['full_name'] = $user_name;
            $data['user_address'] = $user_city.', '.$country_name;
        }

        $count_review_query = DB::table('clienttolawyerreview_tbls')->where('review_id',$uid)->count();
        if($count_review_query > 0)
        {
          $my_review_query = DB::table('clienttolawyerreview_tbls')->where('review_id',$uid)->get();

          $main_review = 0;

          foreach($my_review_query as $m1)
          {
            $review1 = $m1->review_service_count;
            $review2 = $m1->review_value_count;
            $review3 = $m1->review_time_count;

            $main_review1 = (($review3+$review2+$review1)/3)+$main_review;
            $main_review = (int)$main_review1;
          }

          $count_review = (int)($main_review/$count_review_query);

          $star_view = '';
          for($r = 1; $r < 6; $r++)
          {
            if($r < ($count_review+1)){
              $star_view .= '<span><i class="fa fa-star" aria-hidden="true"></i></span>';
            }else{
              $star_view .= '<span><i class="fa fa-star-o" aria-hidden="true"></i></span>';
            }
          }
          $star_view .= '<label class="rv-number"><a href="#reviews-id"><i class="fa fa-plus-circle" aria-hidden="true"></i>'.$count_review_query.' Reviews</a></label>';


          $my_review_query01 = DB::table('clienttolawyerreview_tbls')->where('review_id',$uid)->get();
          $html = '';
          foreach($my_review_query01 as $m01){
            $userQ = User::where('id',$m01->reviewer_id)->get();
            foreach($userQ as $u1)
            {
                $main_name = $u1->name.' '.$u1->name;
            }

            $review1 = $m01->review_service_count;
            $review2 = $m01->review_value_count;
            $review3 = $m01->review_time_count;

            $main_review01 = (int)(($review3+$review2+$review1)/3);

            $star_view1 = '';
            for($r = 1; $r < 6; $r++)
            {
              if($r < ($main_review01+1)){
                $star_view1 .= '<i class="fa fa-star" aria-hidden="true"></i>';
              }else{
                $star_view1 .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
              }
            }

            $html .= '<div class="single-review">
                                <div class="media">
                                <img class="md-img" src="https://image.freepik.com/free-photo/smiling-mature-lawyer-working-courtroom_23-2147898545.jpg" alt="image">
                                <div class="media-body">
                                  <div class="top-rtg-line">
                                    <div class="rtng">
                                       '.$star_view1.'
                                    </div>
                                    <div class="user-date">
                                      <span class="user-co">'.$main_name.'</span>
                                      <span class="date-co">'.date('F d, y',strtotime($m01->updated_at)).'</span>
                                    </div>
                                  </div>
                                  <h4>'.$m01->review_title.'</h4>
                                  <p>'.$m01->review_details.'</p>
                                </div>
                              </div>
                      </div>';
          }

          $data['main_review'] = $html;
        }
        else
        {
          $star_view = '';
          for($r = 1; $r < 6; $r++)
          {
            
              $star_view .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
          }
        }

        $data['star_view'] = $star_view;
        echo json_encode($data);
    }
    
}
