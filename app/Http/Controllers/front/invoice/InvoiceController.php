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
use App\models\ChatModel;
use App\models\ChatProjectModel;
use App\models\ChatJobQAModel;
use App\models\FileSizeModel;
use App\models\FileWithPriceModel;
use App\models\reviews\CtoLmodel;
use App\models\reviews\LtoCmodel;
use PDF;

class InvoiceController extends Controller
{
    //
    public function index()
    {
    	return view('frontend.front-pages.invoice.client-invoice');
    }

    public function lawyer_index()
    {
    	return view('frontend.front-pages.invoice.lawyer-invoice');
    }

    public function client_page_invoice_load()
    {
    	$countableData = ChatProjectModel::where('client_id',Auth::user()->id)->where('work_status','completed')->count();

    	if($countableData > 0)
    	{
    		$data['msg'] = "data";
    		$queryData = ChatProjectModel::where('client_id',Auth::user()->id)->where('work_status','completed')->get();
    		$html = '';
    		$k = 1;
    		foreach($queryData as $q1)
    		{
    			$html .= '<tr>
                           <td>'.$k.'</td>
                           <td>'.$q1->project_name.'</td>
                           <td>'.date('F d,Y',strtotime($q1->project_close_date)).'</td>
                           <td><a  href="/invoice-print-pdf?pname='.$q1->project_name.'&pid='.$q1->project_id.'&cid='.$q1->client_id.'&lid='.$q1->lawyer_id.'"  class="shrt-btn vw-btn short-font"><i class="fa fa-download"></i> Download</a></td>
                        </tr>';
                $k++;
    		}

    		$data['main_html'] =  $html;
    	}
    	else
    	{
    		$data['msg'] = "no_data";
    		$data['main_html'] = '<tr>
                           <td colspan="4"> <center><i class="fa fa-times"></i> No Projects in queue</center></td>
                        </tr>';
    	}

    	echo json_encode($data);
    }

    public function lawyer_page_invoice_load()
    {
    	$countableData = ChatProjectModel::where('lawyer_id',Auth::user()->id)->where('work_status','completed')->count();

    	if($countableData > 0)
    	{
    		$data['msg'] = "data";
    		$queryData = ChatProjectModel::where('lawyer_id',Auth::user()->id)->where('work_status','completed')->get();
    		$html = '';
    		$k = 1;
    		foreach($queryData as $q1)
    		{
    			$html .= '<tr>
                           <td>'.$k.'</td>
                           <td>'.$q1->project_name.'</td>
                           <td>'.date('F d,Y',strtotime($q1->project_close_date)).'</td>
                           <td><a  href="/invoice-print-pdf?pname='.$q1->project_name.'&pid='.$q1->project_id.'&cid='.$q1->client_id.'&lid='.$q1->lawyer_id.'" class="shrt-btn vw-btn short-font"><i class="fa fa-download"></i> Download</a></td>
                        </tr>';
                $k++;
    		}

    		$data['main_html'] =  $html;
    	}
    	else
    	{
    		$data['msg'] = "no_data";
    		$data['main_html'] = '<tr>
                           <td colspan="4"> <center><i class="fa fa-times"></i> No Projects in queue</center></td>
                        </tr>';
    	}

    	echo json_encode($data);
    }

    public function printPDF()
    {
    	$pname = $_GET['pname'];
    	$pid = $_GET['pid'];
    	$cid = $_GET['cid'];
    	$lid = $_GET['lid'];


    	$mainQ = ChatProjectModel::where(['project_name' => $pname, 'project_id' => $pid, 'client_id' => $cid, 'lawyer_id' => $lid])->get();
    	$output = '';
    	foreach($mainQ as $main_query)
    	{
    		$user_query = User::where('id',$cid)->get();
    		foreach($user_query as $clientQuery)
    		{
    			$client_name = $clientQuery->name." ".$clientQuery->lname;
    		} 

    		$lawyer_query = User::where('id',$lid)->get();
    		foreach($lawyer_query as $lawyerQuery)
    		{
    			$lawyer_name = $lawyerQuery->name." ".$lawyerQuery->lname;
    		}

    		$start_date = strtotime($main_query->project_start_date); // or your date as well
    		$end_date = strtotime($main_query->project_close_date);
    		$datediff = $end_date - $start_date;

    		$new_date_conf = round($datediff / (60 * 60 * 24));


    		// 

    		$gQuery = DB::table('proposal_tbl')->where(['client_id' => $cid, 'lawyer_id' => $lid, 'project_id' => $pid])->get();
    		foreach($gQuery as $g1){
    			$bill_rate = $g1->billing_rate;
    		}
    	}

    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML('<html><body>
    			<center><img src="http://propandas.com/frontAssets/images/logo.png" alt="#" style="max-width: 80px;"></center>
    			<center><h2>INVOICE</h2></center>
				<table >
					<tr>	
						<th >Project Id</th>
						<th >Project Days</th>
						<th >Project Budget</th>
						<th >Client Name</th>
						<th >Lawyer Name</th>
					</tr>
					<tr>	
						<td>#'.$pname.'</td>
						<td>'.$new_date_conf.' Days</td>
						<td>'.$bill_rate.' USD</td>
						<td>'.$client_name.'</td>
						<td>'.$lawyer_name.'</td>
					</tr>
				</table>
    		</body></html>');
    	return $pdf->stream();
    }

//     public function convert_html_pdf($pname, $pid, $cid, $lid)
//     {
//     	$pdf = \App::make('dompdf.wrapper');
//     	$pdf->loadHTML($this->convert_html_pdf($pname, $pid, $cid, $lid));
//     	$pdf->stream();
//     	$mainQ = ChatProjectModel::where(['project_name' => $pname, 'project_id' => $pid, 'client_id' => $cid, 'lawyer_id' => $lid])->get();
//     	$output = '';
//     	foreach($mainQ as $main_query)
//     	{
//     		$user_query = User::where('id',$cid)->get();
//     		foreach($user_query as $clientQuery)
//     		{
//     			$client_name = $clientQuery->name." ".$clientQuery->lname;
//     		} 

//     		$lawyer_query = User::where('id',$lid)->get();
//     		foreach($lawyer_query as $lawyerQuery)
//     		{
//     			$lawyer_name = $lawyerQuery->name." ".$lawyerQuery->lname;
//     		} 

//     		$output .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
// <html>
//    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
//    <head>
//       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
//       <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
//       <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
//       <title>Propandas</title>
//       <style type="text/css">
//          * {
//          box-sizing: border-box;
//          -webkit-box-sizing: border-box;
//          }
//          body {
//          margin: 0 auto;
//          padding: 0;
//          font-family: "Poppins";
//          }
//          body,
//          table,
//          td,
//          p,
//          a,
//          li,
//          blockquote {
//          -webkit-text-size-adjust: 100%;
//          -ms-text-size-adjust: 100%;
//          }
//          table,
//          td {
//          border-collapse: collapse;
//          mso-table-lspace: 0pt;
//          mso-table-rspace: 0pt;
//          }
//          img {
//          -ms-interpolation-mode: bicubic;
//          }
//          @media screen and (max-width: 650px) {
//          table {
//          width: 100% !important;
//          }
//          }
//          @media screen and (max-width: 380px) {
//          #address-1 p;#address-2 p  {
//          font-size: 10px !important;
//          }
//          #address-1 p span {
//          display: inline-block;
//          width: 100% !important;
//          }
//          table#prjct-id tr th {
//          white-space: normal !important;
//          font-size: 11px;
//          padding: 10px 8px !important;
//          }
//          table#prjct-id tbody{
//          font-size: 11px !important;
//          text-align: center;
//          line-height: 16px !important;
//          }
//          table#prjct-id tbody tr td{
//          padding: 8px;
//          }
//          #ft-email{
//          margin-top: 10px !important;
//          }
//          }
//       </style>
//    </head>
//    <body >
//       <table style="width:600px;background-color: #f7f6f6;margin: 0 auto;border: solid 1px #f3f3f3;"  >
//          <tr style=" padding: 15px;  display: inline-block; width: 100%;">
//             <td style="width:100%; float:left;">
//                <div style="width: 50%; display: inline-block; float:left;">
//                   <p style="text-align: left;">
//                      <a href="#"><img src="http://propandas.com/frontAssets/images/logo.png" alt="#" style="max-width: 80px;"></a> 
//                   </p>
//                </div>
//                <div style="width: 50%;  float:left;">
//                   <p style="text-align: right; text-transform: uppercase; font-size: 30px; color: #022058; font-weight:600;line-height: 27px;letter-spacing: 0;">Invoice</p>
//                </div>
//             </td>
//             <td style="width:100%;display: inline-block;margin-top: 20px;">
//                <div style="width: 50%; float:left; padding-right: 25px;" id="address-1">
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Client</span>
//                      <span style="width: calc(100% - 75px); float: left;">John Doe</span>
//                   </p>
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Address</span>
//                      <span style="width: calc(100% - 75px); float: left;">745 Silver Harbour, TX 777738, US</span>
//                   </p>
//                   <p style="font-size: 11px;display: inline-block; width: 100%; line-height: normal;margin: 1px 0px;">
//                      <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Email</span>
//                      <span style="width: calc(100% - 75px); float: left;">john@example.com</span>
//                   </p>
//                   <p style="font-size: 11px;display: inline-block; width: 100%; line-height: normal;margin: 1px 0px;">
//                      <span style="margin-right: 10px; width: 65px;display: inline-block;float: left;">Phone</span>
//                      <span style="width: calc(100% - 75px); float: left;">7894561234</span>
//                   </p>
//                </div>
//                <div style="width: 50%;  float:right; padding-left: 25px; text-align: right;" id="address-2">
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      Stephen C
//                   </p>
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      455 dreezy Heights,<br>  TX 777738, US
//                   </p>
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      stephen@example.com
//                   </p>
//                   <p style="font-size: 11px;display: inline-block;width: 100%;line-height: normal;margin: 1px 0px;">
//                      1234567894
//                   </p>
//                </div>
//             </td>
//          </tr>
//          <tr>
//             <td>
//                <table style="width: 100%" id="prjct-id">
//                   <thead style="border-bottom: 1px solid #C1CED9;font-size: 13px;text-transform: uppercase;background: #022058; text-align: left;">
//                      <tr>
//                         <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Project Id</th>
//                         <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Project Name</th>
//                         <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap;">Timing </th>
//                         <th style="padding: 15px 8px;color: #fdfdfd;font-weight: normal;white-space: nowrap; text-align: center;">Budget</th>
//                      </tr>
//                   </thead>
//                   <tbody style="font-size: 12px;">
//                      <tr style="background-color: #f5f5f5;" >
//                         <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;" >#345</td>
//                         <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">Nemo Enim Ipsam Voluptatem</td>
//                         <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">02/02/2020 - 24/03/2020</td>
//                         <td style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">$1,040.00</td>
//                      </tr>
//                      <tr style="background-color: #f3f3f3;">
//                         <td colspan="3" style="padding: 15px 8px; color: #022058;  font-weight: 600; text-align: right;">SUBTOTAL</td>
//                         <td class="total" style="padding: 15px 8px; color: #5D6975;  font-weight: normal;">$1,040.00</td>
//                      </tr>
//                   </tbody>
//                </table>
//             </td>
//          </tr>
//          <tr>
//             <td style="width: 100%; display: inline-block; padding: 15px 10px; ">
//                <p style="text-transform: uppercase; font-size: 20px; color: #022058; font-weight: 600;  line-height: 27px; letter-spacing: 0;">Thank you!</p>
//                <p style="text-align: left;border-left: solid 5px #022058;padding-left: 8px;font-size: 12px;line-height: 19px;color: #000000;font-weight: 100;letter-spacing: 0;">
//                   Notice: <br>
//                   <span>Invoice was created on a computer and is valid without the signature and seal.</span>
//                </p>
//             </td>
//             <td  style="width: 100%; display: inline-block; padding: 15px 10px; margin-top: 100px; " id="ft-email">
//                <p style=" margin: 7px 0px; text-align: center; color: #13264e; display: block;  width: 100%;font-size: 12px;  ">© 2020 <a href="#" style="text-decoration: none;">propandas.com</a>  |  All Rights Reserved. </p>
//             </td>
//          </tr>
//          </tr>
//       </table>
//    </body>
// </html>';
//     	}
//     return $output;
    	
//     }
}
