@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">CLIENT BUSINESS </h3>
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
         <div class="table-responsive theme-table prj-list-table">
         	<table class="table table-striped ">
         		<thead>
                       <tr>
                           <th>Sr No</th>
                           <th>Project Name</th>
                           <th>Lawyer Name</th>
                           <th>Start Date</th>
                           <th>Status</th>
                           <th>Action</th> 
                        </tr>
                </thead>
            <tbody class="client-project-all-status-shown-class"> 
            	<tr class="table-data-loding">
                	<td colspan="6">
                    	<i class="fa fa-spinner"></i> Loading Data's
                	</td>
            	</tr>
            </tbody>

         	</table>
         </div>        
               
            </div>
         </div>
      </div>
   </div>

<!-- accept-soon Modal -->
   <div class="modal fade theme-modal green-mdl-text" id="modal_id">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->          

            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="images/logo.png" alt="logo" class="modal-logo"></span>Are you sure</h3>   
                   <h6>To Confirm This Action?</h6>
                   <p>
                    <span><a href="#" class="short-anchr">Yes</a></span>
                    <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal">No</a></span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script type="text/javascript">
  $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();
     client_project_status_all_data();    
   });

  // full view project client status all view

  function client_project_status_all_data()
  {
  	$.ajax({
  		url: '/client-project-status-all-data',
  		type: 'GET',
  		dataType: 'json',
  		success: function(event){
  			$(".client-project-all-status-shown-class").html(event);
  		}, error:  function(event){

  		}
  	})
  }


  // click on lawyer_wish_project_status_change :::: lawyer wish project status change click

  function lawyer_wish_project_status_change(id_of_project_status, project_id, project_name, client_id)
  {
  	var lawyer_id = $("#lawyer-wish-project-status-change-id"+id_of_project_status).val();

  	// lawyer wish project status ajax

  	$.ajax({
  		url: "/client-page-lawyer-wish-project-status-change",
  		type: "GET",
  		data: { id_of_project_status: id_of_project_status, project_id: project_id, project_name: project_name, client_id: client_id, lawyer_id: lawyer_id },
  		dataType: "json",
  		success: function(event){
  			$("#actual-project-status-start-date-id"+id_of_project_status).html(event.actual_start_date);
  			$("#actual-project-status-change-id"+id_of_project_status).removeAttr('class');
  			$("#actual-project-status-change-id"+id_of_project_status).attr('class','job-status '+event.actual_work_status_class);
  			$("#actual-project-status-change-id"+id_of_project_status).html(event.working_status);
  		}, error: function(event){

  		}
  	})
  }


  // client project status change by client end

  function client_project_status_change_by_client_function(id_of_project_status, project_id, project_name, client_id)
  {
  	var lawyer_id = $("#lawyer-wish-project-status-change-id"+id_of_project_status).val();
  	$.ajax({
  		url: '/changing-client-project-status',
  		type: 'GET',
  		data: { id_of_project_status: id_of_project_status, project_id: project_id, project_name: project_name, client_id: client_id, lawyer_id: lawyer_id },
  		dataType: 'JSON',
  		success:  function(event){

  		}, error:  function(event){

  		}
  	})
  }
</script>
@endsection