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
                           <tbody id="client-invoice-front-page-show-paid-part">
                              <tr><td colspan='8' class='text-info text-center'><i class='fa fa-spinner'></i> Loading invoices</td></tr>
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
                           <tbody id="client-invoice-front-page-show-unpaid-part">
                              <tr><td colspan='8' class='text-info text-center'><i class='fa fa-spinner'></i> Loading invoices</td></tr>
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
               <ul class="ps-relative" id="invoice-review-modal">
                  <div class="data-loding">
                  	<i class="fa fa-spinner"></i> Loading Data's
                  </div>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('pagewishjs')
<script type="text/javascript">
	$(function(){
		onload_client_invoice();
	})
	function onload_client_invoice()
	{
		$.ajax({
			url: "/client-invoice-page-onload",
			type: "GET",
			dataType: "JSON",
			success:  function(event){
				console.log(event);
				if(event.main_msg == "success")
				{
					if(event.paid_type != "")
					{
						$("#client-invoice-front-page-show-paid-part").html(event.paid_type);
					}
					else
					{
						$("#client-invoice-front-page-show-paid-part").html("<tr><td colspan='8' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
					}

					if(event.unpaid_type != "")
					{
						$("#client-invoice-front-page-show-unpaid-part").html(event.unpaid_type);
					}
					else
					{
						$("#client-invoice-front-page-show-unpaid-part").html("<tr><td colspan='8' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
					}
					
				}
				else if(event.main_msg == "error")
				{
					$("#client-invoice-front-page-show-paid-part").html("<tr><td colspan='8' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
					$("#client-invoice-front-page-show-unpaid-part").html("<tr><td colspan='8' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
				}
				
			}, error: function(event){

			}
		})
	}


	// client invoice page preview modal

	function invoice_preview_Section_function(invoice_tbl_id, invoice_id, project_id, project_name, client_id, lawyer_id, status_date, pay_amount, paid_status)
	{
		// modal places values
		$.ajax({
			url: '/invoice-preview-section-from-client-end',
			type: 'GET',
			data: {lawyer_id: lawyer_id, invoice_tbl_id: invoice_tbl_id},
			dataType: 'JSON',
			success:  function(event){
				$("#invoice-review-modal").html('<li><span class="table-name">Invoice Number</span><span class="table_info project">'+invoice_id+'</span></li><li><span class="table-name">Date</span><span class="table_info">'+event.status_date+'</span></li><li><span class="table-name">Attorney Name</span><span class="table_info">'+event.status_user_name+'</span></li><li><span class="table-name">Status</span><span class="table_info">'+paid_status+'</span></li><li><span class="table-name">Amount</span><span class="table_info"> $'+pay_amount+'</span></li><span class="block-width"><a href="javascript:void(0)" class="cnt-btn text-center">Download</a></span>');
			}, error:  function(event){

			}
		})
		


		// modal show part 

		$("#View_invoice").modal('show');
	}
</script>
@endsection