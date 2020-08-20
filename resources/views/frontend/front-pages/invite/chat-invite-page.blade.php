@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Notification</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
               <?php
                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = end($link_array);

                $decode_arg_id = base64_decode($get_arg_id);
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <h6>Invitation</h6>
               <div class="dshbrd-inner">
                  <ul class="filter-result notification-list chat-invite" id="chat-invite-js-id">
                     <div class="loding-spinn"><i class="fa fa-spinner"></i> Loading Data's</div>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- welcome Modal -->
<div class="modal fade theme-modal green-modal-text" id="chat-invite-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->
         <div class="modal-body text-center">
            <div class="center-part">
               <h3><span><img src="frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>Thanks for Accpet</h3>
               <h6>You are succesfully added to that project for chat  </h6>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- accept_modal -->
<div class="modal fade theme-modal green-mdl-text show" id="accept_modal" >
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->          
         <div class="modal-body text-center">
            <div class="center-part">
               <h3><span><img src="frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>Are you sure</h3>
               <h6>To Want Reject This Action?</h6>
               <p>
               	  <input type="hidden" value="" id="decline-proj-id" />
               	  <input type="hidden" value="" id="decline-proj-name" />

                  <span><a href="#" class="short-anchr"  aria-label="Close" onclick="confirm_decline()">Yes</a></span>
                  <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal" data-dismiss="modal" aria-label="Close">No</a></span>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade theme-modal show" id="success-modal" >
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal body -->
         <div class="modal-body contact-modal-design text-center">
            <div class="center-part">
               <h3><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> successfully Rejected</h3>
               <p>You are successfully reject the information</p>
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
		// load page view first
		page_invites_show();
		setTimeout(function(){ unread_triggered_on_load(); }, 3000);
	});

	function page_invites_show()
	{
		$.ajax({
			url: '/list-content-load',
			type: 'GET',
			dataType: 'json',
			success: function(event)
			{
				$("#chat-invite-js-id").html(event);
			},
			error: function(event)
			{

			}
		})
	}

	function unread_triggered_on_load()
	{
		$.ajax({
			url: '/chat-invite-unread-on-load',
			type: 'GET',
			dataType: 'json',
			success: function(event)
			{
				setTimeout(function(){ page_invites_show(); }, 3000);
			},
			error: function(event)
			{

			}
		})
	}

	function chat_invite_accept(p_id, p_name)
	{
		$.ajax({
			url: '/chat-invite-accept',
			type: 'GET',
			data: {p_id: p_id, p_name: p_name},
			dataType: 'json',
			success:  function(event)
			{
				if(event == 'success')
				{
					$("#chat-invite-modal").modal("show");
					setTimeout(function(){ $("#chat-invite-modal").modal("hide"); page_invites_show(); }, 3000);
				}
				else if(event == 'error')
				{

				}
				
			}, 
			error:  function(event)
			{

			}
		})
		
	}

	function chat_invite_decline(project_id, project_name)
	{
		$("#decline-proj-id").val(project_id);
		$("#decline-proj-name").val(project_name);
		$("#accept_modal").modal('show');
	}

	function confirm_decline()
	{
		var proj_id = $("#decline-proj-id").val();
		var proj_name = $("#decline-proj-name").val();

		$.ajax({
			url: "/chat-invite-decline",
			type: 'GET',
			data: {p_id: proj_id, p_name: proj_name},
			dataType: 'json',
			success:  function(response){
				$("#success-modal").modal('show');
				setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
			}, error:  function(response){

			}
		})
	}
</script>
@endsection