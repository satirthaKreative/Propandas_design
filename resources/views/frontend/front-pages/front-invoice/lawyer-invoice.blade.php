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
               @include('frontend.front-pages.lawyer.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <div class="src-filter top-filter ">
                  <div class="row">
                     <div class="col-md-4 plr-5">
                        <div class="nav nav-tabs table-tab " role="tablist">
                           <button class="tablinks  active" data-toggle="tab" href="#tab-first" role="tab">Billed by Me</button>
                           <button class="tablinks" data-toggle="tab" href="#tab-second" role="tab">Billed to Me </button>                       
                        </div>
                     </div>
                     <div class="col-md-4 plr-5">
                        <div class="form-group">
                           <select name="type" id="type" class="form-control" aria-hidden="true">
                              <option selected="selected" value="mine">Showing List</option>
                              <option value="">List 5</option>
                              <option value="">List 10</option>
                              <option value="">List 15 </option>
                              <option value="">List 20</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4 plr-5">
                        <a href="#" class="flt-search creat-btn"  data-toggle="modal" data-target="#View_invoice" >Creat Invoice</a>
                     </div>
                  </div>
               </div>
               <div class="tab-content  table-tab-content" >
                  <div class="tab-pane fade show active" id="tab-first" role="tabpanel">
                     <!-- <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div> -->
                     <!-- <div class="no-data-found"> No data found regarding current search </div> -->
                     <div class="table-responsive theme-table prj-list-table">
                        <table class="table table-striped ">
                           <thead>
                              <tr>
                                 <th>Invoice Number</th>
                                 <th>Date</th>
                                 <th>Client</th>
                                 <th>Status</th>
                                 <th>Amount</th>
                                 <th>Download</th>
                              </tr>
                           </thead>
                           <tbody id="main-lawyer-invoice-shown-unpaid-part">
                              <tr>
                             	<td colspan='6' class='text-info text-center'><i class='fa fa-spinner'></i> loading data's</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane fade " id="tab-second" role="tabpanel">
                     <!-- <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div> -->
                     <!-- <div class="no-data-found"> No data found regarding current search </div> -->
                     <div class="table-responsive theme-table prj-list-table">
                        <table class="table table-striped ">
                           <thead>
                              <tr>
                                 <th>Invoice Number</th>
                                 <th>Date</th>
                                 <th>Attorney</th>
                                 <th>Status</th>
                                 <th>Amount</th>
                                 <th>Download</th>
                              </tr>
                           </thead>
                           <tbody id="main-lawyer-invoice-show-paid-part">
                             <tr>
                             	<td colspan='6' class='text-info text-center'><i class='fa fa-spinner'></i> loading data's</td>
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
<!-- invoice Modal -->
<div class="modal fade theme-modal show" id="raise-invoice" >
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->
         <div class="modal-body ">
            <div class="center-part">
               <h3>Modify an Invoice</h3>
               <form>
                  <div class="form-group">
                     <label>Amount</label> 
                     <input type="text" name="" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Description</label> 
                     <textarea class="form-control"></textarea>                        
                  </div>
                  <input type="submit" name="" value="Modify Invoices " class="cnt-btn">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- accept-soon Modal -->
<div class="modal fade theme-modal green-mdl-text" id="accept_modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body text-center">
            <div class="center-part">
               <h3><span><img src="images/logo.png" alt="logo" class="modal-logo"></span>Are you sure</h3>
               <h6>To Want Cancel This Action?</h6>
               <p>
                  <span><a href="#" class="short-anchr">Yes</a></span>
                  <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal">No</a></span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- delete confirm Modal -->
<div class="modal fade theme-modal green-mdl-text" id="delete-confirm">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body text-center">
            <div class="center-part">
               <h3><span><img src="images/logo.png" alt="logo" class="modal-logo"></span>Are you sure</h3>
               <h6>To delete this invoice?</h6>
               <p>
                  <span><a href="#" class="short-anchr">Yes</a></span>
                  <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal">No</a></span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
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
<!-- view_modal Modal -->
<div class="modal fade theme-modal green-mdl-text" id="View_invoice">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body ">
            <h3 class="text-left"><span><img src="images/logo.png" alt="logo" class="modal-logo"></span></h3>
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
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script type="text/javascript">
	$(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
      onload_lawyer_page();     
    });


	// page loading time lawyer onloading event

    function onload_lawyer_page()
    {
    	$.ajax({
    		url: "/lawyer-invoice-page-onload",
    		type: "GET",
    		dataType: "JSON",
    		success:  function(event){
    			if(event.main_msg == "success")
    			{
    				if(event.unpaid_type != "")
    				{
    					$("#main-lawyer-invoice-shown-unpaid-part").html(event.unpaid_type);
    				}
    				else
    				{
    					$("#main-lawyer-invoice-show-unpaid-part").html("<tr><td colspan='6' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
    				}

    				if(event.paid_type != "")
    				{
    					$("#main-lawyer-invoice-shown-paid-part").html(event.paid_type);
    				}
    				else
    				{
    					$("#main-lawyer-invoice-show-paid-part").html("<tr><td colspan='6' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
    				}
    				
    			}
    			else if(event.main_msg == "error")
    			{
    				$("#main-lawyer-invoice-show-paid-part").html("<tr><td colspan='6' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
    				$("#main-lawyer-invoice-show-unpaid-part").html("<tr><td colspan='6' class='text-danger text-center'><i class='fa fa-times'></i> No data</td></tr>");
    			}
    			
    		}, error: function(event){

    		}
    	})
    }
</script>
@endsection