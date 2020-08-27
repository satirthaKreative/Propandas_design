@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Invoice</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <!-- <div class="col-md-9">
            <div class="dsbrd-content">
               <div class="table-responsive theme-table prj-list-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Project List</th>
                           <th>Project Name</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="client-invoice-id">
                        <tr>
                           <td colspan="4"> <center><i class="fa fa-spinner"></i> Loading Data's</center></td>
                        </tr>
                     </tbody>
                  </table>
               </div>

            </div>
         </div> -->
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
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>02</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 24,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>03</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>may 30,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>04</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>may 20,2020</td>
                                 <td><span class="job-status paid">Paid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
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
                                 <td><span class="job-status paid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>02</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 15,2020</td>
                                 <td><span class="job-status paid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
                              </tr>
                              <tr>
                                 <td>03</td>
                                 <td>PROP-101</td>
                                 <td>PROPANNEW</td>
                                 <td>June 05,2020</td>
                                 <td><span class="job-status paid">UnPaid</span></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Download</a></td>
                                 <td><a href="javascript:void(0)" class="shrt-btn short-link-btn  ">Pay</a></td>
                                 <td> <a href="javascript:void(0)"  class="dlt-icn" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></a></td>
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

<!-- view_modal Modal -->
<div class="modal fade theme-modal green-mdl-text" id="view_modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body ">
            <h3 class="text-left"><span><img src="images/logo.png" alt="logo" class="modal-logo"></span></h3>
            <div class="table-view text-left">
               <p><span class="table-name">Project Name</span><span class="table_info">PROPANNEW</span></p>
               <p><span class="table-name">Invoice Number</span><span class="table_info">PROPAN441013</span></p>
               <p><span class="table-name">Date</span><span class="table_info"> June 30,2020</span></p>
               <p><span class="table-name">Status</span><span class="table_info">Paid</span></p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
  <script>
    $(function(){
      page_load_client_invoice();
      $('[data-toggle="tooltip"]').tooltip(); 
    });
      

    function page_load_client_invoice(){
        $.ajax({
          url: "/client_page_invoice_load",
          type: "GET",
          dataType: "json",
          success: function(event)
          {
              if(event.msg == "data")
              {
                $("#client-invoice-id").html(event.main_html);         
              }
              else if(event.msg == "no_data")
              {
                $("#client-invoice-id").html(event.main_html); 
              }
          },
          error: function(event)
          {

          }
        })
    }

    function download_invoice(pname, pid, cid, lid)
    {
        $.ajax({
          url: "/invoice-print-pdf",
          type: "GET",
          data:{ pname:pname, pid:pid, cid:cid, lid:lid },
          dataType: "json",
          success: function(event)
          {
              window.location.href="/invoice-print-pdf";
          },
          error: function(event)
          {

          }
        })
    }
  </script>
@endsection