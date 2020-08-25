<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\admincategory;
use App\Models\Icons\CategoryIconModel;
use App\Models\legalDocx\LegalDocumentModel;

class RentalAgreementController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.rental-agreement');
    }

    // show sidebar category

    public function legal_docx_sidebar_category_load()
    {

    	if(session('legal_cate_session'))
    	{
    		session()->forget('legal_cate_session');
    	}


    	$countQuery = admincategory::count();
    	$html = "";

    	if($countQuery > 0)
    	{
    		$mainQuery = admincategory::get();
    		foreach($mainQuery as $cq)
    		{
    			$cLegalQuery = CategoryIconModel::where(['category_id' => $cq->id])->count();

    			if($cLegalQuery > 0)
    			{
    				$storeLegalQuery = CategoryIconModel::where(['category_id' => $cq->id])->get();
    				foreach($storeLegalQuery as $slQuery)
    				{
    					$main_icon = "fa ".$slQuery->category_icons;
    				}
    			}
    			else
    			{
    				$main_icon = "fa fa-question";
    			}
    		$html .= '<li onclick="legal_category('.$cq->id.')" ><div class="legal-box" id="legal-category-id'.$cq->id.'"><i class="'.$main_icon.'" aria-hidden="true"></i><p>'.$cq->category_name.'</p></div></li>';

    		}
    	}
    	else
    	{
    		$html .= '<div class="no-category-found">No-category-found</div>';
    	}

    	echo json_encode($html);
    }

    // all documents

    public function all_legal_documents()
    {
    	$countAllDocQuery = LegalDocumentModel::orderBy('id','DESC')->count();
    	
    	$html = '';

    	if($countAllDocQuery > 0)
    	{
    			$allDocQuery = LegalDocumentModel::orderBy('id','DESC')->get();
    			foreach($allDocQuery as $adquery)
    			{

    				if($adquery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$adquery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($adquery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$adquery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$adquery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    			}
    	}
    	else 
    	{
    		$html .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}
    	

    	echo json_encode($html);
    }

    // all docx type

    public function all_legal_document_type()
    {
    	$countAllDocQuery = LegalDocumentModel::where(['legal_cate_type' => 'Documents' ])->orderBy('id','DESC')->count();
    	
    	$html = '';

    	if($countAllDocQuery > 0)
    	{
    			$allDocQuery = LegalDocumentModel::where(['legal_cate_type' => 'Documents' ])->orderBy('id','DESC')->get();
    			foreach($allDocQuery as $adquery)
    			{

    				if($adquery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$adquery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($adquery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$adquery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$adquery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    			}
    	}
    	else 
    	{
    		$html .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}
    	

    	echo json_encode($html);
    }

    // all article type

    public function all_legal_article_type()
    {
    	$countAllDocQuery = LegalDocumentModel::where(['legal_cate_type' => 'Article' ])->orderBy('id','DESC')->count();
    	
    	$html = '';

    	if($countAllDocQuery > 0)
    	{
    			$allDocQuery = LegalDocumentModel::where(['legal_cate_type' => 'Article' ])->orderBy('id','DESC')->get();
    			foreach($allDocQuery as $adquery)
    			{

    				if($adquery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$adquery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($adquery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$adquery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$adquery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    			}
    	}
    	else 
    	{
    		$html .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}
    	

    	echo json_encode($html);
    }


    // legal category show
    public function legal_category_active_show()
    {
    	$lElement = $_GET['lElement'];
    	$eStatus = $_GET['eStatus'];
    	

    	if($eStatus == "Push")
    	{
    		if(session('legal_cate_session'))
    		{
    			Session::push('legal_cate_session',$lElement);
    		}
    		else
    		{
    			Session::put('legal_cate_session',array());
    			Session::push('legal_cate_session',$lElement);
    		}

    		$ff = Session::get('legal_cate_session');
    	}

    	if($eStatus == "Pop")
    	{
    		if(in_array($lElement, Session::get('legal_cate_session'))){
    			
    			$storeArr = Session::get('legal_cate_session');

    			$key = array_search($lElement, $storeArr);
    			$ff1 = $storeArr[$key];
    			unset($storeArr[$key]);
    			Session::put('legal_cate_session',$storeArr);
    			
    			$ff = Session::get('legal_cate_session');
    		}
    	}
    	
    	// all document category id wish

    	$allLegalQuery = LegalDocumentModel::whereIn('category_id',$ff)->orderBy('id','DESC')->get();
    	$html['all_document'] = "";
    	if(count($allLegalQuery) > 0)
    	{
    		foreach($allLegalQuery as $allQuery)
    		{

    				if($allQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$allQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($allQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['all_document'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$allQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$allQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['all_document'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}


    	// only docx type show

    	$allOnlyDocxQuery = LegalDocumentModel::whereIn('category_id',$ff)->where(['legal_cate_type' => 'Documents' ])->orderBy('id','DESC')->get();
    	$html['only_docx'] = "";
    	if(count($allOnlyDocxQuery) > 0)
    	{
    		foreach($allOnlyDocxQuery as $docxQuery)
    		{

    				if($docxQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$docxQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($docxQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['only_docx'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$docxQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$docxQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['only_docx'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}

    	// only docx type show

    	$allOnlyarticleQuery = LegalDocumentModel::whereIn('category_id',$ff)->where(['legal_cate_type' => 'Article' ])->orderBy('id','DESC')->get();
    	$html['only_article'] = "";
    	if(count($allOnlyarticleQuery) > 0)
    	{
    		foreach($allOnlyarticleQuery as $articleQuery)
    		{

    				if($articleQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$articleQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($articleQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['only_article'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$articleQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$articleQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['only_article'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}

    	// check for all type 

    	if((count($allOnlyarticleQuery) == 0) && (count($allOnlyDocxQuery) == 0) && (count($allLegalQuery) == 0) )
    	{
    		// all document category id wish

    		$allLegalQuery = LegalDocumentModel::orderBy('id','DESC')->get();
    		$html['all_document'] = '';
    			foreach($allLegalQuery as $allQuery)
    			{
    				
    					if($allQuery->legal_cate_type == "Documents"){
    						$data_html = '<span class="right-step">
    			               <a href="'.$allQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    			            </span>';
    			            $type_of_doc = "Free Legal Documents";
    					}else if($allQuery->legal_cate_type == "Article"){
    						$type_of_doc = "Free Legal Article";
    						$data_html = '<span class="right-step">
    			               <a href="#" class="cta-link">Read more</a>
    			            </span>';
    					}


    					$html['all_document'] .= '<li>               
    			            <span class="left-step">
    			               <h5>
    			                <a href="#">'.$allQuery->agreement_title.' </a>
    			              </h5>
    			               <p><em>'.$type_of_doc.' </em></p>
    			            </span>
    			            '.$data_html.'
    			            <div class="more-info">
    			               <p>'.$allQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    			            </div>
    			          </li>';
    			
    			 
    		}


    		// only docx type show

    		$allOnlyDocxQuery = LegalDocumentModel::where(['legal_cate_type' => 'Documents' ])->orderBy('id','DESC')->get();
    		$html['only_docx'] = '';
    			foreach($allOnlyDocxQuery as $docxQuery)
    			{

    					if($docxQuery->legal_cate_type == "Documents"){
    						$data_html = '<span class="right-step">
    			               <a href="'.$docxQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    			            </span>';
    			            $type_of_doc = "Free Legal Documents";
    					}else if($docxQuery->legal_cate_type == "Article"){
    						$type_of_doc = "Free Legal Article";
    						$data_html = '<span class="right-step">
    			               <a href="#" class="cta-link">Read more</a>
    			            </span>';
    					}


    					$html['only_docx'] .= '<li>               
    			            <span class="left-step">
    			               <h5>
    			                <a href="#">'.$docxQuery->agreement_title.' </a>
    			              </h5>
    			               <p><em>'.$type_of_doc.' </em></p>
    			            </span>
    			            '.$data_html.'
    			            <div class="more-info">
    			               <p>'.$docxQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    			            </div>
    			          </li>';
    			 
    		}

    		// only docx type show

    		$allOnlyarticleQuery = LegalDocumentModel::where(['legal_cate_type' => 'Article' ])->orderBy('id','DESC')->get();
    		$html['only_article'] = '';
       			foreach($allOnlyarticleQuery as $articleQuery)
    			{

    					if($articleQuery->legal_cate_type == "Documents"){
    						$data_html = '<span class="right-step">
    			               <a href="'.$articleQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    			            </span>';
    			            $type_of_doc = "Free Legal Documents";
    					}else if($articleQuery->legal_cate_type == "Article"){
    						$type_of_doc = "Free Legal Article";
    						$data_html = '<span class="right-step">
    			               <a href="#" class="cta-link">Read more</a>
    			            </span>';
    					}


    					$html['only_article'] .= '<li>               
    			            <span class="left-step">
    			               <h5>
    			                <a href="#">'.$articleQuery->agreement_title.' </a>
    			              </h5>
    			               <p><em>'.$type_of_doc.' </em></p>
    			            </span>
    			            '.$data_html.'
    			            <div class="more-info">
    			               <p>'.$articleQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    			            </div>
    			          </li>';
    		}
    	}


    	echo  json_encode($html);
    }


    // leagal document search

    public function all_legal_search()
    {
    	$get_val = $_GET['get_val'];
    	// all document category id wish

    	$allLegalQuery = LegalDocumentModel::where('agreement_title','like','%' . $get_val .'%')->orderBy('id','DESC')->get();
    	$html['all_document'] = "";
    	if(count($allLegalQuery) > 0)
    	{
    		foreach($allLegalQuery as $allQuery)
    		{

    				if($allQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$allQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($allQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['all_document'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$allQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$allQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['all_document'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}


    	// only docx type show

    	$allOnlyDocxQuery = LegalDocumentModel::where('agreement_title','like','%' . $get_val .'%')->where(['legal_cate_type' => 'Documents' ])->orderBy('id','DESC')->get();
    	$html['only_docx'] = "";
    	if(count($allOnlyDocxQuery) > 0)
    	{
    		foreach($allOnlyDocxQuery as $docxQuery)
    		{

    				if($docxQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$docxQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($docxQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['only_docx'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$docxQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$docxQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['only_docx'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}

    	// only docx type show

    	$allOnlyarticleQuery = LegalDocumentModel::where('agreement_title','like','%' . $get_val .'%')->where(['legal_cate_type' => 'Article' ])->orderBy('id','DESC')->get();
    	$html['only_article'] = "";
    	if(count($allOnlyarticleQuery) > 0)
    	{
    		foreach($allOnlyarticleQuery as $articleQuery)
    		{

    				if($articleQuery->legal_cate_type == "Documents"){
    					$data_html = '<span class="right-step">
    		               <a href="'.$articleQuery->agreement_file_upload.'" class="cta-link" download>Download</a>
    		            </span>';
    		            $type_of_doc = "Free Legal Documents";
    				}else if($articleQuery->legal_cate_type == "Article"){
    					$type_of_doc = "Free Legal Article";
    					$data_html = '<span class="right-step">
    		               <a href="#" class="cta-link">Read more</a>
    		            </span>';
    				}


    				$html['only_article'] .= '<li>               
    		            <span class="left-step">
    		               <h5>
    		                <a href="#">'.$articleQuery->agreement_title.' </a>
    		              </h5>
    		               <p><em>'.$type_of_doc.' </em></p>
    		            </span>
    		            '.$data_html.'
    		            <div class="more-info">
    		               <p>'.$articleQuery->agreement_short_desc.' <a href="#" class="rear-link">read more</a></p>
    		            </div>
    		          </li>';
    		}
    		 
    	}
    	else
    	{
    		$html['only_article'] .= '<div class="no-data-found"> No data found regarding current search </div>';
    	}
    	echo json_encode($html);
    }















    // --------------Agreement part start--------------

    public function show_agreement_page()
    {
    	return view('frontend.front-pages.show-actual-agreement');
    }

}