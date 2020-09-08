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
use App\AdminLegalinfoModel;
use App\Models\chat_before_accept\ChatAndAcceptModel;
use PDF;

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



    // client viewer

    // invoice viewer

    public function client_invoice_index()
    {
    	return view('frontend.front-pages.front-invoice.client-invoice');
    }

    // by invoice viewer


    // client invoice page onload show

    public function client_invoice_page_onload()
    {
    	$countQuery = InvoiceModel::where(['client_id' => Auth::user()->id])->count();
    	$html['paid_type'] = "";
    	$html['unpaid_type'] = "";
    	$html['no_data'] = "";
    	$html['main_msg'] = "";
    	if($countQuery > 0)
    	{
    		$getQuery = InvoiceModel::where(['client_id' => Auth::user()->id, 'pay_check' => 'yes'])->get();
    		$i = 1;
    		foreach($getQuery as $gQuery)
    		{
    			// client fetch name
    			$getUserQuery = User::where(['id' => $gQuery->lawyer_id])->get();
    			foreach($getUserQuery as $guQuery)
    			{
    				$user_full_name = $guQuery->name.' '.$guQuery->lname;
    			} 

    			$status_date = date('M d,Y', strtotime($gQuery->updated_at));

    			$html['paid_type'] .= '<tr>
    						<td>'.$i.'</td>
                            <td>'.$gQuery->invoice_id.'</td>
                            <td>'.$gQuery->project_name.'</td>
                            <td>'.date('M d,y',strtotime($gQuery->sent_date)).'</td>
                            <td><span class="job-status paid">Paid</span></td>
                            <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                            <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                            <td> <a href="javascript:void(0)"  class="dlt-icn" onclick=invoice_preview_Section_function('.$gQuery->id.',"'.$gQuery->invoice_id.'",'.$gQuery->project_id.',"'.$gQuery->project_name.'",'.$gQuery->client_id.','.$gQuery->lawyer_id.',"'.$status_date.'",'.$gQuery->pay_amount.',"Paid")><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                        </tr>';

                $i++;
    		}

    		$getQuery2 = InvoiceModel::where(['client_id' => Auth::user()->id, 'pay_check' => 'no'])->get();
    		$j = 1;
    		foreach($getQuery2 as $gQuery2)
    		{
    			// client fetch name
    			$getUserQuery = User::where(['id' => $gQuery2->lawyer_id])->get();
    			foreach($getUserQuery as $guQuery)
    			{
    				$user_full_name = $guQuery->name.' '.$guQuery->lname;
    			} 

    			$status_date = date('M d,Y', strtotime($gQuery2->updated_at));

    			$html['unpaid_type'] .= '<tr>
    						<td>'.$j.'</td>
    			            <td>'.$gQuery2->invoice_id.'</td>
    			            <td>'.$gQuery2->project_name.'</td>
                            <td>'.date('M d,Y',strtotime($gQuery2->sent_date)).'</td>
                            <td><span class="job-status unpaid">UnPaid</span></td>
                            <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                            <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                            <td> <a href="javascript:void(0)"  class="dlt-icn" onclick=invoice_preview_Section_function('.$gQuery2->id.',"'.$gQuery2->invoice_id.'",'.$gQuery2->project_id.',"'.$gQuery2->project_name.'",'.$gQuery2->client_id.','.$gQuery2->lawyer_id.',"'.strtotime($status_date).'",'.$gQuery2->pay_amount.',"UnPaid")><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                        </tr>';
                $j++;
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



    // client type invoice modal full preview modal show

    public function client_type_invoice_modal_show()
    {
    	// empty panel 
    	$html['status_user_name'] = "";
    	$html['status_date'] = "";

    	// invoice table full view
    	$invoiceQuery = InvoiceModel::where(['id' => $_GET['invoice_tbl_id']])->get();

    	foreach($invoiceQuery as $invQ)
    	{
    		$main_status_date = $invQ->due_date;
    		

    		// current date strtotime
    		$current_time = strtotime(date('Y-m-d'));

    		$main_time = strtotime($main_status_date);

    		// checking if current_date not greater than main_date

    		if($current_time < $main_time)
    		{
    			$html['status_date'] = date('M d,y',strtotime($invQ->sent_date));
    		}
    		else
    		{
    			$html['status_date'] = date('M d,y',strtotime($main_status_date));
    		}
    	}

    	// getting user details
    	$userQuery = User::where(['id' => $_GET['lawyer_id']])->get();
    	foreach($userQuery as $u1)
    	{
    		$main_user_name = $u1->name.' '.$u1->lname;
    		$html['status_user_name'] = $main_user_name;
    	}

    	echo json_encode($html);
    } 


    // function lawyer invoice controller footer

    public function all_page_email_and_address_function()
    {
    	$cQuery = AdminLegalinfoModel::where(['id' => 1])->get();

    	foreach($cQuery as $cq1)
    	{
    		$mainAddress = $cq1->address_one;
    		$mainEmailAddress = $cq1->email_address;
    	}

    	$html['main_Address'] = $mainAddress;
    	$html['main_email'] = $mainEmailAddress;

    	echo json_encode($html);
    }



    //  client :  Raise an invoice

    public function raise_an_invoice_by_client()
    {
        // variables
        $client_id = $_GET['client_id'];
        $project_id = $_GET['project_id'];
        $project_name = $_GET['project_name'];
        $jobBeforeId = $_GET['jobBeforeId'];
        $lawyer_id = $_GET['lawyer_id'];

        // first checking exist or not 
        $cQuery = InvoiceModel::where(['project_id' => $project_id, 'project_name' => $project_name, 'client_id' => $client_id, 'lawyer_id' => $lawyer_id ])->count();
        if($cQuery > 0)
        {
            // checking already paid or not
            $checkingPaidOrNot = InvoiceModel::where(['project_id' => $project_id, 'project_name' => $project_name, 'client_id' => $client_id, 'lawyer_id' => $lawyer_id, 'pay_check' => 'no' ])->count();
            if($checkingPaidOrNot > 0)
            {
                $msg = "success";
            }
            else
            {
                $msg = "already_pay";
            }
        }
        else
        {
            $msg = "error";
        }

        echo json_encode($msg);
    }
}
