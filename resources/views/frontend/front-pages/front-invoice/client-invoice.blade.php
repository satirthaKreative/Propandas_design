@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Invoices</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <div class="row">
                  <div class="col-md-4">
                     <div class="nav nav-tabs table-tab "  role="tablist">
                        <button class="tablinks  active" data-toggle="tab" href="#paid-tab" role="tab">Paid</button>
                        <button class="tablinks" data-toggle="tab" href="#unoaid-tab" role="tab">UnPaid </button>                       
                     </div>
                  </div>
               </div>
               <div class="tab-content  table-tab-content" >
                  <div class="tab-pane fade show active" id="paid-tab" role="tabpanel">
                     <!-- <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div> -->
                     <!-- <div class="no-data-found"> No data found regarding current search </div> -->
                     <div class="table-responsive theme-table prj-list-table">
                        <table class="table table-striped ">
                           <thead>
                              <tr>
                                 <th>Sr No</th>
                                 <th>Invoice Number</th>
                                 <th>Project Name</th>
                                 <th>Date</th>
                                 <th>Status</th>
                                 <th>Action</th>
                                 <th>&nbsp;</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>01</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 30,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>02</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 24,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>03</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>may 30,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>04</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>may 20,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="unoaid-tab" role="tabpanel">
                     <div class="table-responsive theme-table prj-list-table">
                        <table class="table table-striped ">
                           <thead>
                              <tr>
                                 <th>Sr No</th>
                                 <th>Invoice Number</th>
                                 <th>Project Name</th>
                                 <th>Date</th>
                                 <th>Status</th>
                                 <th>Action</th>
                                 <th>&nbsp;</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>01</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 21,2020</td>
                                 <td><span class="job-status unpaid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>02</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 15,2020</td>
                                 <td><span class="job-status unpaid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>03</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 05,2020</td>
                                 <td><span class="job-status unpaid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#View_invoice"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
<!-- view_modal Modal -->
<div class="modal fade theme-modal green-mdl-text" id="View_invoice">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body ">
            <h3 class="text-left"><span><img src="<?= url('/frontAssets/images/logo.png') ?>" alt="logo" class="modal-logo"></span></h3>
            <div class="table-view invoice-view text-center">
               <ul>
                  <li><span class="table-name">Invoice Number</span><span class="table_info">PROPAN441013</span></li>
                  <li><span class="table-name">Date</span><span class="table_info"> June 30,2020</span></li>
                  <li><span class="table-name">Attorney Name</span><span class="table_info">James Roger</span></li>
                  <li><span class="table-name">Status</span><span class="table_info">Paid</span></li>
                  <li><span class="table-name">Amount</span><span class="table_info"> $200.00</span></li>
                  <span class="block-width"><a href="javascript:void(0)" class="cnt-btn text-center">Download</a></span>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('pagewishjs')
<script type="text/javascript">
	
</script>
@endsection