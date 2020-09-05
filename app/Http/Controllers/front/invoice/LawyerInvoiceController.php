<?php

namespace App\Http\Controllers\front\invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ProposalSendModel;
use App\User;
use App\Country_model;
use App\LawyerCountryModel;
use App\LawyerCitiesModel;
use App\Models\ChatModel;
use App\Models\ChatProjectModel;
use App\Models\ChatJobQAModel;
use App\Models\FileSizeModel;
use App\Models\FileWithPriceModel;
use App\Models\invoice\InvoiceModel;
use App\Models\chat_before_accept\ChatAndAcceptModel;

class LawyerInvoiceController extends Controller
{
	// page show of lawyer invoice page
	public function lawyer_index()
	{
		return view('frontend.front-pages.front-invoice.lawyer-invoice');
	}
    // Raise invoice by lawyer
    public function index()
    {
    	$date = date('Y-m-d H:i:s');
    	$date = strtotime("+7 day", strtotime($date));
    	$after_date = date('Y-m-d H:i:s', $date);

    	// variable GET type

    	$projectID = $_GET['raise_project_id'];
    	$projectName = $_GET['raise_project_name'];
    	$jobBeforeID = $_GET['raise_project_job_before_id'];
    	$lawyerID = $_GET['raise_lawyer_id'];
    	$clientID = $_GET['raise_client_id'];
    	$raiseAmount = $_GET['raise_amount'];
    	$raiseDescription = $_GET['raise_description'];

    	$random_invoice_id = "#".rand('000001','999999');

    	// main query to insert invoice lawyer

    	// invoice array
    	$invoiceArr = [
    		'invoice_id' => $random_invoice_id,
    		'project_id' => $projectID,
    		'project_name' => $projectName, 
    		'client_id' => $clientID, 
    		'lawyer_id' => $lawyerID, 
    		'sent_date' => date('Y-m-d H:i:s'), 
    		'due_date' => $after_date, 
    		'pay_amount' => $raiseAmount,
    		'raise_description' => $raiseDescription, 
    		'created_at' => date('Y-m-d H:i:s'), 
    		'updated_at' => date('Y-m-d H:i:s')
    	];

    	// insert Query in invoice 

    	$invoiceQuery = InvoiceModel::insert($invoiceArr);

    	if($invoiceQuery)
    	{
    		$msg = "success";
    	}
    	else
    	{	
    		$msg = "error";
    	}


    	echo json_encode($msg);

    }


    // lawyer invoice onload function

    public function lawyer_index_page_onload()
    {
    	$countQuery = InvoiceModel::where(['lawyer_id' => Auth::user()->id])->count();
    	$html['paid_type'] = "";
    	$html['unpaid_type'] = "";
    	$html['no_data'] = "";
    	$html['main_msg'] = "";
    	if($countQuery > 0)
    	{
    		$getQuery = InvoiceModel::where(['lawyer_id' => Auth::user()->id, 'pay_check' => 'no'])->get();
    		foreach($getQuery as $gQuery)
    		{
    			// client fetch name
    			$getUserQuery = User::where(['id' => $gQuery->client_id])->get();
    			foreach($getUserQuery as $guQuery)
    			{
    				$user_full_name = $guQuery->name.' '.$guQuery->lname;
    			} 

    			$html['unpaid_type'] .= '<tr>
                            <td>'.$gQuery->invoice_id.'</td>
                            <td>'.date('M d,y',strtotime($gQuery->sent_date)).'</td>
                            <td>'.$user_full_name.'</td>
                            <td><span class="job-status paid">Created</span></td>
                            <td>$'.$gQuery->pay_amount.'</td>
                            <td>
                               <a href="javascript:void(0)" class="shrt-btn short-link-btn ">Download</a>
                            </td>
                        </tr>';
    		}

    		$getQuery2 = InvoiceModel::where(['lawyer_id' => Auth::user()->id, 'pay_check' => 'yes'])->get();
    		foreach($getQuery2 as $gQuery2)
    		{
    			// client fetch name
    			$getUserQuery = User::where(['id' => $gQuery2->client_id])->get();
    			foreach($getUserQuery as $guQuery)
    			{
    				$user_full_name = $guQuery->name.' '.$guQuery->lname;
    			} 

    			$html['paid_type'] .= '<tr>
                            <td>'.$gQuery2->invoice_id.'</td>
                            <td>'.date('M d,y',strtotime($gQuery2->sent_date)).'</td>
                            <td>'.$user_full_name.'</td>
                            <td><span class="job-status paid">Paid</span></td>
                            <td>$'.$gQuery2->pay_amount.'</td>
                            <td>
                               <a href="javascript:void(0)" class="shrt-btn short-link-btn ">Download</a>
                            </td>
                        </tr>';
    		}

    		$html['main_msg'] = "success";
    		 
    	}
    	else
    	{
    		$html['no_data'] .= '';
    		$html['main_msg'] = "error";
    	}
    	echo json_encode($html);
    } 
}
