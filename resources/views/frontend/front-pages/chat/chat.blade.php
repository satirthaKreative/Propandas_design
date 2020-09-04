@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="chat-content">
      <div class="sd-icon">
         <div class="ic-menu">
            <div class="icn-lst">
               <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="dsh-menu">
               @include('frontend.front-pages.chat.include.chat-sideboard')
            </div>
         </div>
         <h3 class="fs-title">Messages</h3>
      </div>
      <div class="message-content">
         <div class="inbox_people">
          <input type="hidden" name="" id="for-chat-hidden-job-before-id" value="" />
          <input type="hidden" name="" id="for-chat-hidden-job-before-name" value="" />
          <input type="hidden" name="" id="for-chat-hidden-job-before-client-id" value="" />
          <input type="hidden" name="" id="for-chat-hidden-job-before-lawyer-id" value="" />
            @if(Auth::user()->is_lawyer == 1)
           <div class="all-prj-list">
            <div class="nav nav-tabs " id="nav-tab" role="tablist"> 
               <div class="pj-staus">                                  
                  <select name="" id="" class="form-control" aria-hidden="true">
                     <option selected="selected" value="">Projects Status</option>
                     <option value="">Initiated</option>
                     <option value="">Proposal</option>
                     <option value="">In Progress </option>
                     <option value="">Completed</option>
                     <option value="">Closed</option>      
                  </select>
                  
               </div>                  
            </div>
            <div class="tab-content">
               <div id="all-tab" class="tab-pane fade show active">
                  <div class="inbox_chat" id="active-input-projects">
                     <!-- <div class="chat_list ">
                        <a href="#">
                           <div class="chat_people">               
                         <div class="chat_ib">
                           <h5>Labore et dolore magna aliqua.labore et dolore magna aliqua. <span class="chat_date">Dec 25</span></h5>                  
                         </div>
                        </div>
                        </a>              
                        </div> -->
                     <!-- <div class="chat_list active_chat">
                        <a href="#">
                           <div class="chat_ib">
                              <h5> <i class="fa fa fa-lock" aria-hidden="true"></i>Labore et dolore magna aliqua</h5>
                           </div>
                        </a>
                     </div> -->
                     <div class="chat_list prject-line ">
                        <a href="#">
                           <div class="chat_ib">
                              <h5><i class="fa fa-spinner" aria-hidden="true"></i>Loading conversations</h5>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div id="active-tab" class="tab-pane fade">
                  <div class="inbox_chat" id="active-chatting-projects">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
               <div id="jobs-tab" class="tab-pane fade">
                  <div class="inbox_chat" id="cancel-chatting-projects">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
               <div id="unread-tab" class="tab-pane fade">
                  <div class="inbox_chat">
                     <div class="no-convertion">
                        <p>No conversation selected</p>
                     </div>
                  </div>
               </div>
            </div>
          </div>
          @else
          <div class="all-prj-list">
             
             <div class="nav nav-tabs " id="nav-tab" role="tablist"> 
                         <div class="pj-staus">                                  
                                           <select name="" id="" class="form-control" aria-hidden="true">
                                              <option selected="selected" value="">Projects Status</option>
                                              <option value="">Initiated</option>
                                              <option value="">Proposal</option>
                                              <option value="">In Progress </option>
                                              <option value="">Completed</option>
                                              <option value="">Closed</option>                                      
                                           </select>
                                        </div>
                                        
                   </div>

                   <div class="tab-content">
                      <div id="all-tab" class="tab-pane fade show active">
                         <div class="inbox_chat "  id="active-input-projects">
                         <div class="chat_list prject-line active_chat">
                               <a href="#">
                                  <div class="chat_ib">
                                     <h5><i class="fa fa-spinner" aria-hidden="true"></i>Loading conversations</h5>
                                  </div>
                               </a>
                            </div>
                         </div>
                      </div>
                   </div>

          </div> 


          <div class="single-project">
             <div class="nav nav-tabs " id="nav-tab" role="tablist"> 
                         <div class="pj-staus">                                  
                                          <p id="project-new-class-name">Project Name</p>
                                        </div>
                                        
                   </div>

                   <div class="tab-content">
                      <div id="all-tab" class="tab-pane fade show active">
                         <div class="inbox_chat " id="new-project-view-with-lawyer-id">
                           <div class="no-convertion"><p>No conversation started</p></div>
                            <!-- <div class="chat_list ">
                               <a href="#">
                                  <div class="chat_people">               
                                <div class="chat_ib">
                                  <h5>Labore et dolore magna aliqua.labore et dolore magna aliqua. <span class="chat_date">Dec 25</span></h5>                  
                                </div>
                               </div>
                               </a>              
                               </div> -->
                            
                         </div>
                      </div>
                      <div id="active-tab" class="tab-pane fade">
                         <div class="inbox_chat">
                            <div class="no-convertion">
                               <p>No conversation selected</p>
                            </div>
                         </div>
                      </div>
                      <div id="jobs-tab" class="tab-pane fade">
                         <div class="inbox_chat">
                            <div class="no-convertion">
                               <p>No conversation selected</p>
                            </div>
                         </div>
                      </div>
                      <div id="unread-tab" class="tab-pane fade">
                         <div class="inbox_chat">
                            <div class="no-convertion">
                               <p>No conversation selected</p>
                            </div>
                         </div>
                      </div>
                   </div>
          </div>
          @endif
         </div>
         <div class="mesgs chat-main-mesgs">
            <div class="mesg-top">
               <div class="msg-top-left accept-project">
                  <h6>Project Name <input type="hidden" class="project-name-hidden-class" name="project_name_hidden" value="" /></h6>

                  <input type="hidden" name="chat_fill_hide_id" id="chat-main-hidden-p-id" />
                  <input type="hidden" name="chat_fill_hide_name" id="chat-main-hidden-p-name" />
               </div>
               <div class="user-dtls">
                  <ul id="msg-top-user-class" style="display: none">
                     <!-- <li>
                        <a data-toggle="tooltip" data-placement="top" title="No Member" href="#" >
                        <i class="fa fa-user-o" aria-hidden="true"></i><label>5</label>                      
                        </a>                        
                     </li>
                     <li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li> -->
                  </ul>
               </div>
            </div>
            <div class="msg_history">
               <div class="no-convertion"><p><i class="fa fa-spinner"></i> Loading chat panel</p></div>
            </div>
            <div class="type_msg">
              <div class="not-type-msg" style="display: none;"><label>You Are Not able to chat</label></div>

               <div class="input_msg_write">
                  <form id="main-chat-file-id" enctype="multipart/form-data" method="POST" action="{{ url('/main-chat-file-insert-ajax') }}">
                     <textarea name="write_msg_text" id="write-msg-text-id" class="form-control write_msg" placeholder="Type your message..."></textarea>
                     <input type="hidden" name="project_name_hide" id="project-name-hide-id">
                     <input type="hidden" name="project_id_hide" id="project-hide-id">
                     <div class="setd-tag">
                        
                        <div class="attach-icn" data-toggle="tooltip" data-placement="top" title="Attach file">
                           
                             
                              <input type="file" name="attach_file_main_chat" id="attach-file-main-chat-id">
                              
                           
                           <span class="file-span"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        </div>
                        <button class="msg_send_btn" type="button" onclick="send_msg_to_project()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <!-- reply message -->
         <div class="mesgs reply-box">                     
            <div class="mesg-top">
               <div class="msg-top-left">
                  <h6>Project Name</h6>
               </div>
               <div class="user-dtls">
                 <div class="close-box">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
            </div>
            <div class="msg_history rply-content">
              <div class="no-convertion"><p>No conversation selected</p></div>
            </div>
                     
          </div>
          <!-- end of reply-box -->
      </div>
   </div>
   <!-- add Modal -->
   <div class="modal fade theme-modal" id="add-people">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body ">
               <div class="center-part">
                  <h3>Add People</h3>
                  <p>Please Select User Type</p>
                  <form id="chat-invitation-form">
                     <div class="form-group">
                        <label>Select User</label> 
                        <select name="" class="form-control" id="choose-invite-user-type-id">
                           <option value="">Choose User Type</option>
                           <option value="0">Client</option>
                           <option value="1">Lawyer</option>                        
                        </select>
                     </div>
                     <div class="form-group">
                        <label>User Email </label> 
                        <input type="email" name="" id="user-invite-email-id" class="form-control">
                        <input type="hidden" name="" value="" id="add-people-hidden-project-id" />
                        <input type="hidden" name="" value="" id="add-people-hidden-project-name" />
                     </div>
                     <input type="button" name="" onclick="send_chat_invite_btn()" value="Send Invite" class="cnt-btn">
                  </form>
                  <p class="text-center chat-invite-msg"></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- filesize success Modal -->
   <div class="modal fade theme-modal" id="success-filesize-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>01 GB fully filled up. You need to buy more time.</span> </h3>
                  <div id="paypal-button-container"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade theme-modal" id="success-file-pay-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Thank You </h3>
                  <h6>For buy more space, start your chat now</h6>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end of model -->
   <!-- submit-proposal Modal -->
   <div class="modal fade theme-modal show" id="submit-chat-proposal-modal" >
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal body -->
               <div class="modal-body ">
                  <div class="center-part">
                     <h3>Submit Proposal</h3>                
                     <form id="submit-chat-proposal-from">
                      
                      <input type="hidden" name="proposal_project_id" id="proposal-project-id" value="" />
                      <input type="hidden" name="proposal_project_name" id="proposal-project-name" value="" />
                      <input type="hidden" name="proposal_project_client_id" id="proposal-project-client-id" value="" />
                      <input type="hidden" name="proposal_project_lawyer_id" id="proposal-project-lawyer-id" value="" />

                        <div class="proposal-form">
                           <div class="form-group">
                           <label>Lawyer Description</label> 
                            <input type="text" name="proposal_project_lawyer_description" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Lawyer Comments</label> 
                          <textarea class="form-control" name="proposal_project_lawyer_comments"></textarea>          
                        </div>

                        <div class="form-group">
                          <label class="title-lable">Billing Option</label>          <label><input type="radio" name="proposal_project_billing_type" value="0" checked="" />Fixed Rate</label> 
                          <label><input type="radio" value="1" name="proposal_project_billing_type" />Hourly Rate</label>  
                        </div>

                        <div class="form-group">                                    
                          <label class="title-lable">Billing Rate</label>  
                          <input type="number" name="proposal_project_billing_rate" value="" />   
                        </div>

                        <input type="button" name="" value="Submit Proposal " onclick="proposal_project_submit_proposal()" class="cnt-btn" />
                        </div>
                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- chatting unaccepting -->
      <div class="modal fade theme-modal  show" id="unaccept_modal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal body -->          
               <div class="modal-body text-center">
                  <div class="center-part wide-space">
                     <span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>
                     <p>This perticuler lawyer did not sent any proposal for this job. <br>
                      So you are un able to accept that proposal.</p>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- chatting unaccepting -->
      <div class="modal fade theme-modal  show" id="job-fade-modal-accepting">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal body -->          
               <div class="modal-body text-center">
                  <div class="center-part ">
                     <span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>
                     <p>Please try again later to accepting this job !</p>               
                  </div>
               </div>
            </div>
         </div>
      </div>

  <!-- job proposal accepting panel confirmation -->
  <div class="modal fade theme-modal green-mdl-text show" id="accept-chat-proposal" >
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->  
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span></h3>   
                   <h6>Are you sure To accept this proposal for this job?</h6>
                   <p>
                    <span><a href="javascript: ;" id="accept-proposal-yes-job-id" class="short-anchr">Yes</a></span>
                    <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal" data-dismiss="modal">No</a></span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- error-on-accepting-modal -->
   <div class="modal fade theme-modal  show" id="error-on-accepting-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->          
            <div class="modal-body text-center">
               <div class="center-part ">
                  <span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>
                  <p>Please try again later to accepting this job !</p>               
               </div>
            </div>
         </div>
      </div>
   </div>


   <!-- add raise invoice Modal -->
   <div class="modal fade theme-modal" id="raise-invoice-modal-id">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body ">
               <div class="center-part">
                  <h3>Raise an Invoice</h3>                
                  <form id="raise-an-invoice-form-id">
                    <!-- input hidden field -->
                    <input type="hidden" name="raise_invoice_on_project_id" id="raise-invoice-on-project-id" />
                    <input type="hidden" name="raise_invoice_on_project_name" id="raise-invoice-on-project-name" />
                    <input type="hidden" name="raise_invoice_on_project_jobBefore_id" id="raise-invoice-on-project-jobBefore-id" />
                    <input type="hidden" name="raise_invoice_on_project_client_id" id="raise-invoice-on-project-client-id" />
                    <input type="hidden" name="raise_invoice_on_project_lawyer_id" id="raise-invoice-on-project-lawyer-id" />
                    <!-- end of input hidden field -->
                     <div class="form-group">
                        <label>Amount</label> 
                        <input type="text" name="raise_amount" id="raise-amount" class="form-control">
                     </div>
                     <div class="form-group">
                        <label>Description</label> 
                        <textarea class="form-control" name="raise_description" id="raise-description"></textarea>                        
                     </div>
                     <input type="button" onclick="final_create_invoice_by_lawyer()" name="raise_chat_invoice_by_lawyer_end" value="Create Invoices " class="cnt-btn" />
                     
                  </form>
               </div>
               <!-- alert type -->
                <div class="alert-sign">
                  <!-- success type  -->
                  <div class="alert-box success-alert raise-success" style="display: none;">
                      <p>Invoice successfully created ! please check invoice section on your dashboard panel</p>
                  </div>

                  <!-- Error type -->
                  <div class="alert-box error-alert raise-danger" style="display: none;">
                      <p>Some thing went wrong on server ! Try again later.</p>
                  </div>
                </div>
               <!-- /alert type -->
            </div>
         </div>
      </div>
   </div>
   <!-- /add raise invoice modal -->
</section>

<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<!-- Paypal start -->
<script src="https://www.paypal.com/sdk/js?client-id=Ac4D5vnEM8k_yYAfrS4tz2lb42lCbTYwQKK5sag1Vrs8JLfKU3rBZh8y2a2g0lYHbsZgSc50dt1aOY9g"></script>
<script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '100'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            $("#success-filesize-modal").modal("hide");
            paypal_add_file_size();
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
   </script>
<!-- /Paypal End -->
<script>
  // chat invite 
  function send_chat_invite_btn()
  {
    
    var invite_user_type = $("#choose-invite-user-type-id").val();
    var invite_user_email = $("#user-invite-email-id").val();
    var member_proj_id = $("#add-people-hidden-project-id").val();
    var member_proj_name = $("#add-people-hidden-project-name").val();

    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if(invite_user_type == "" || invite_user_type == null)
    {
      $(".chat-invite-msg").html("<strong class='text-danger'><i class='fa fa-times'></i> Choose atleast one type</strong>").fadeIn().delay(3000).fadeOut('slow');
    }
    else if(invite_user_email == "" || invite_user_email == null)
    {
      $(".chat-invite-msg").html("<strong class='text-danger'><i class='fa fa-times'></i> Enter atleast a user email address</strong>").fadeIn().delay(3000).fadeOut('slow');
    }
    else if(!emailReg.test(invite_user_email))
    {
      $(".chat-invite-msg").html("<strong class='text-danger'><i class='fa fa-times'></i> Enter atleast a valid email address</strong>").fadeIn().delay(3000).fadeOut('slow');
    }
    else
    {
      $.ajax({
        url: '/chat-invite-send',
        type: 'GET',
        data: {invite_user_type: invite_user_type, invite_user_email: invite_user_email, member_proj_id: member_proj_id, member_proj_name: member_proj_name},
        dataType: 'json',
        success: function(event_res)
        {
          $(".chat-invite-msg").html(event_res).fadeIn().delay(3000).fadeOut('slow');
          setTimeout(function(){ $("#add-people").modal('hide'); }, 3000);
        },
        error: function(event_res)
        {

        }
      })
    }
  }
  // end of chat invite
   function paypal_add_file_size()
   {
      var proj_name = $("#project-name-hide-id").val();
      var proj_id = $("#project-hide-id").val();
      $.ajax({
         url: "/paypal-add-file-size",
         type: "GET",
         data: {proj_name: proj_name, proj_id: proj_id},
         dataType: "json",
         success:  function(event_pay){
            if(event_pay == "success"){
               $("#success-file-pay-modal").modal("show");
               setTimeout(function(){ $("#success-file-pay-modal").modal("hide"); }, 3000);
            }
         }, error: function(event_pay){

         }
      })
   }
</script>
<script>
   // Attached file
   $("input[name = 'attach_file_main_chat']").change(function(){
      var totalformData = new FormData($("#main-chat-file-id")[0]);
      // end of main file submit part
      $.ajax({
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
         url: "/main-chat-file-insert-ajax",
         type: "POST",
         data: totalformData,
         dataType: 'json',
         contentType: false,
         cache: false,
         processData:false,
         success: function(data_file){
            console.log(data_file);
            if(data_file == 'success'){
               $("#write-msg-text-id").val("");
               every_second_chat_loading();
            }else if(data_file == 'new_payment'){
               $("#success-filesize-modal").modal("show");
            }
         }, error: function(data_file){

         }
      })
   })

   function attached_file_reply_change()
   {
      var totalformData = new FormData($("#reply-chat-file-id")[0]);
      // end of main file submit part
      $.ajax({
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
         url: "/reply-chat-file-insert-ajax",
         type: "POST",
         data: totalformData,
         dataType: 'json',
         contentType: false,
         cache: false,
         processData:false,
         success: function(data_file){
            every_sec_ajax_reply();
         }, error: function(data_file){

         }
      })
      // Attached file reply chat
   }
   
   // end of attached file
   function reply_thread_function(chat_tbl_id, project_id, project_name)
   {
      $(".message-content").addClass("side-reply");
      $.ajax({
         url: "/chat-reply-thread-ajax",
         type: "GET",
         data: {chat_tbl_id: chat_tbl_id, project_id: project_id, project_name: project_name},
         dataType: "json",
         success: function(event)
         {
            $(".reply-box .rply-content").html(event);
            $("#reply-hide-proj-id").val(project_id);
            $("#reply-hide-proj-name").val(project_name);
            $("#reply-hide-chat-id").val(chat_tbl_id);



            $("#msg-reply-text-btn").attr('onclick','rly_chat_proj('+chat_tbl_id+', '+project_id+', "'+project_name+'")');
         },
         error: function(event)
         {

         }
      })
   }
   $(document).ready(function(){
      $(".close-box").click(function(){
         $(".message-content").removeClass("side-reply");
      });
     $('[data-toggle="tooltip"]').tooltip();
     $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
     $('.theme-select').multiselect({
          
     });

     // $(".dots-drop").click(function(){
     //   $("#has-menu").toggleClass("show-dropdown");
     // });  

     chat_chat_sideboard_check();
     chat_active_proj_sideboard_ajax();
     chat_completed_proj_sideboard_ajax();
     chat_send_blocking();


     first_chat_popup_without_project_select(); 
 

     // every chat loading section
      setInterval(function(){ 
         every_second_chat_loading(); 
         every_second_ajax_check_reply_class();
         chat_send_blocking();
      }, 30000);
     // end of loading seconds       
      
     // side_reply_chat();
   });

   // side reply chat
   // function side_reply_chat()
   // {
      
   // }

   // checking repling 
   function every_second_ajax_check_reply_class()
   {
      if($(".message-content").hasClass("side-reply") == true)
      {
         every_sec_ajax_reply();
      }
      else
      {
         console.log("no log event calls");
      }
   } 

   // loading replied
   function every_sec_ajax_reply()
   {
      $.ajax({
         url: "/every-sec-ajax-reply",
         type: "GET",
         dataType: "json",
         success: function(event){
            console.log(event);
            if(event.main_msg == "no_response")
            {

            }
            else if(event.main_msg == "response")
            {
               $(".reply-main-chat-center").append(event.my_content);
               $("#msg-reply-text-btn").val('');
               $(".reply-count").val('<p>'+event.main_count_part+' replies</p>');
            }
         },error: function(event){

         }
      })
   }

   // end of side reply chat
   function rly_chat_proj(chat_tbl_id, proj_id, proj_name)
   {
      var main_text = $("#reply-chat-main-text").val();
      $.ajax({
         url: "/insert-rly-chat-ajax",
         type: "GET",
         data: {chat_tbl_id: chat_tbl_id, proj_id: proj_id, proj_name: proj_name, main_text: main_text},
         dataType: "json",
         success: function(response){
            every_sec_ajax_reply();
         }, error: function(response){

         }
      })
   }

   function chat_chat_sideboard_check()
   {
      $.ajax({
         url: '/chat-sideboard-ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            $("#active-input-projects").html(event);
         }, error: function(event){

         }
      })
   }

   function chat_active_proj_sideboard_ajax()
   {
      $.ajax({
         url: '/chat_active_proj_sideboard_ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            if(event.length > 0){
               var html = '';
               for(var i = 0; i < event.length; i++){
                  html += '<div class="chat_list"><a href="javascript:;" onclick=project_chat_click('+event[i].id+',"'+event[i].project_name+'")><div class="chat_ib"><h5><i class="fa fa fa-lock" aria-hidden="true"></i>'+event[i].project_name+'</h5></div></a></div>';
               }
               $("#active-chatting-projects").html(html);
            }else{
               $("#active-chatting-projects").html('<div class="no-convertion"><p>No conversation selected</p></div>');

            }
            
         }, error: function(event){

         }
      })
   }

   function chat_completed_proj_sideboard_ajax()
   {
      $.ajax({
         url: '/chat_completed_proj_sideboard_ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            if(event.length > 0){
               var html = '';
               for(var i = 0; i < event.length; i++){
                  html += '<div class="chat_list"><a href="javascript:;" onclick=project_chat_click('+event[i].id+',"'+event[i].project_name+'")><div class="chat_ib"><h5><i class="fa fa fa-lock" aria-hidden="true"></i>'+event[i].project_name+'</h5></div></a></div>';
               }
               $("#cancel-chatting-projects").html(html);
            }else{
               $("#cancel-chatting-projects").html('<div class="no-convertion"><p>No conversation selected</p></div>');

            }
            
         }, error: function(event){

         }
      })
   }


   function project_chat_click(project_id, project_name)
   {
    var user_main_type = '<?php echo Auth::user()->is_lawyer; ?>';
    var main_user_id = '<?php echo Auth::user()->id; ?>';
    // alert("<?= Auth::user()->is_lawyer ?>");
      $(".message-content").removeClass("side-reply");
      $("#add-people-hidden-project-id").val(project_id);
      $("#add-people-hidden-project-name").val(project_name);
      $(".accept-project").html('<h6>'+project_name+' <input type="hidden" class="project-name-hidden-class" name="project_name_hidden" value="" /></h6><input type="hidden" name="chat_fill_hide_id" id="chat-main-hidden-p-id" /><input type="hidden" name="chat_fill_hide_name" id="chat-main-hidden-p-name" />');

      $("#chat-main-hidden-p-id").val(project_id);
      $("#chat-main-hidden-p-name").val(project_name);
      $.ajax({
         url: "/project-chat-ajax",
         type: 'GET',
         data: {project_id: project_id, project_name: project_name},
         dataType: 'json',
         success: function(event){
            add_more_members_in_chat();
               if(event == "no_data")
               {
                  $(".chat-main-mesgs .msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No conversation yet</p></div></div>');
                  $("#project-name-hide-id").val(project_name);
                  $("#project-hide-id").val(project_id);

                  $("#chat-main-hidden-p-id").val(project_id);
                  $("#chat-main-hidden-p-name").val(project_name);
               }
               else
               {
                  $(".chat-main-mesgs .msg_history").html(event);
                  $("#project-name-hide-id").val(project_name);
                  $("#project-hide-id").val(project_id);

                  $("#chat-main-hidden-p-id").val(project_id);
                  $("#chat-main-hidden-p-name").val(project_name);
               }
               // main member top details
               $.ajax({
                  url: '/count-chat-member-ajax',
                  type: 'GET',
                  data: {project_id: project_id, project_name: project_name},
                  dataType: 'json',
                  success: function(response){
                    
                    // hidden field fill up

                    $("#for-chat-hidden-job-before-id").val(response.all_users_details[0].project_id);
                    $("#for-chat-hidden-job-before-name").val(response.all_users_details[0].project_name);
                    $("#for-chat-hidden-job-before-client-id").val(response.all_users_details[0].client_id);
                    $("#for-chat-hidden-job-before-lawyer-id").val(response.all_users_details[0].lawyer_id);

                    // end of the hidden section

                    $("#msg-top-user-class").show();
                     // $("#msg-top-user-class").html('<li><a data-toggle="tooltip" data-placement="top" title="'+response.count_total+' Member" href="#" ><i class="fa fa-user-o" aria-hidden="true"></i><label>'+response.count_total+'</label></a></li><li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li>');
                     if(user_main_type == 0)
                     {
                      $("#msg-top-user-class").html('<li><a  href="#" data-toggle="modal" data-target="#member-modal"><i class="fa fa-user-o" aria-hidden="true"></i><label>'+response.count_total+'</label></a></li><li><div class="dots-drop" onclick="my_toggle_chat_control()"><span></span><span></span><span></span><div class="drop-menu" id="has-menu" ><ul><li><a href=javascript: ;"  onclick=proposal_send_checking('+response.all_users_details[0].client_id+','+response.all_users_details[0].project_id+',"'+response.all_users_details[0].project_name+'",'+response.all_users_details[0].id+','+response.all_users_details[0].lawyer_id+')><i class="fa fa-paper-plane" aria-hidden="true"></i>Accept a Proposal</a></li><li><a href="#" data-toggle="modal" data-target="#add-people" ><i class="fa fa-user" aria-hidden="true"></i>Add a Member</a></li><li><a href="javascript: ;" ><i class="fa fa-file-text" aria-hidden="true"></i>Settle an Invoice</a></li><li><a href="#"><i class="fa fa-stop-circle" aria-hidden="true"></i>End the Chat</a></li></ul></div></li>');
                     }
                     else if(user_main_type == 1)
                     {
                      $("#msg-top-user-class").html('<li><a  href="#" data-toggle="modal" data-target="#member-modal"><i class="fa fa-user-o" aria-hidden="true"></i><label>'+response.count_total+'</label></a></li><li><div class="dots-drop" onclick="my_toggle_chat_control()"><span></span><span></span><span></span><div class="drop-menu" id="has-menu" ><ul><li><a href="javascript: ;" onclick=submit_a_proposal('+response.all_users_details[0].client_id+','+response.all_users_details[0].project_id+',"'+response.all_users_details[0].project_name+'",'+response.all_users_details[0].id+','+response.all_users_details[0].lawyer_id+')><i class="fa fa-paper-plane" aria-hidden="true"></i>Submit a Proposal</a></li><li><a href="#" data-toggle="modal" data-target="#add-people" ><i class="fa fa-user" aria-hidden="true"></i>Add a Member</a></li><li><a href="javascript: ;" onclick=chatRaiseInvoice('+response.all_users_details[0].client_id+','+response.all_users_details[0].project_id+',"'+response.all_users_details[0].project_name+'",'+response.all_users_details[0].id+','+response.all_users_details[0].lawyer_id+')><i class="fa fa-file-text" aria-hidden="true"></i>Raise an Invoice</a></li><li><a href="#"><i class="fa fa-stop-circle" aria-hidden="true"></i>End the Project</a></li></ul></div></li>');
                     }
                     
                     $('[data-toggle="tooltip"]').tooltip();
                     $('.chat-main-mesgs .msg_history').scrollTop($('.chat-main-mesgs .msg_history')[0].scrollHeight);
                     chat_send_blocking();
                  }, error: function(response){

                  }
               })
               // end main top details
         }, error: function(event){

         }
      })
   }

   

   // every second chat loading section
   function every_second_chat_loading()
   {
      $.ajax({
         url: "/every-second-chat-loading",
         type: 'GET',
         dataType: 'json',
         success: function(event){
               if(event == "no_data")
               {
                  
               }
               else
               {
                  $(".chat-main-mesgs .msg_history").append(event);
                  $('.chat-main-mesgs .msg_history').scrollTop($('.chat-main-mesgs .msg_history')[0].scrollHeight);
               }
         }, error: function(event){

         }
      })
   }
   // end of every second chat loading section

   function first_chat_popup_without_project_select()
   {
      var main_data = $(".project-name-hidden-class").val();

      if(main_data == ""){
         $(".chat-main-mesgs .msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No conversation yet</p></div></div>');
      }else{
         $.ajax({
            url: "/first-chat-popup",
            type: "GET",
            dataType: "json",
            success: function(event){

            }, error: function(event){

            }
         })
      }
   }

   function send_msg_to_project()
   {
      var proj_name = $("#project-name-hide-id").val();
      var proj_id = $("#project-hide-id").val();
      var main_text = $("#write-msg-text-id").val();
      
      if(proj_name == ""){
         $(".chat-main-mesgs .msg_history").html('<div class="inbox_chat"><div class="no-convertion"><p>No Project Selected</p></div></div>');
      }else if(main_text == ""){
         $("#write-msg-text-id").attr("title","No message in your box");
      }else{
         $("#write-msg-text-id").removeAttr("title");
         $.ajax({
            url: "/insert-chat-text-add-ajax",
            type: "GET",
            data: {proj_name: proj_name, proj_id: proj_id, main_text: main_text},
            dataType: "json",
            success: function(event){
               $("#write-msg-text-id").val("");
               every_second_chat_loading();
            }, error: function(event){

            }
         });
      }
   }

   // add more members to chat channel

   function add_more_members_in_chat()
   {
      var p_id = $("#chat-main-hidden-p-id").val();
      var p_name = $("#chat-main-hidden-p-name").val();

      if(p_id != '' && p_name != '')
      {
         $.ajax({
            url: "/add-member-to-chat",
            type: "GET",
            data: {project_id: p_id, project_name: p_name},
            dataType:"json",
            success: function(event){
               $("#chat-rest-client-id").html(event.avail_client_arr);
               $("#chat-rest-lawyer-id").html(event.avail_lawyer_arr);
               $('#chat-rest-lawyer-id').multiselect({});
               $('#chat-rest-client-id').multiselect({});
            }, error:  function(event){

            }
         })
      }
   }

   // chatting add members
   function adding_members_form_chatting()
   {
      var client_members_ids = $("#chat-rest-client-id").val();
      var lawyer_members_ids = $("#chat-rest-lawyer-id").val();
      if(client_members_ids == "" && lawyer_members_ids == ""){
         $(".add-people-all-msg").html("<span class='text-danger'><i class='fa fa-times'></i> Choose atleast one lawyer/clients</span>").fadeIn().delay(3000).fadeOut('slow');
      }else{
         $.ajax({
            url: '/adding-members-form-chat-ajax',
            type: 'GET',
            data: $("#adding-members-form-chat").serialize(),
            dataType: 'json',
            success: function(event){
               $("#msg-top-user-class").show();
               $("#msg-top-user-class").html('<li><a data-toggle="tooltip" data-placement="top" title="'+event+' Member" href="#" ><i class="fa fa-user-o" aria-hidden="true"></i><label>'+event+'</label></a></li><li><a href="#" data-toggle="modal" data-target="#add-people" >Add Member</a></li>');
               $('[data-toggle="tooltip"]').tooltip();
               add_more_members_in_chat();
               setTimeout(function(){ $("#add-people").modal('hide'); }, 3000);

            }, error: function(event){

            }
         })
      } 
   }

   function project_click_for_client_to_lawyers_view(client_actual_id, project_actual_name)
   {
      $(".inbox_people").addClass("show-single-project");
      $("#project-new-class-name").html(project_actual_name);
      var var_head_html = '<div class="chat_list active_chat "><div class="chat_ib"><h5><span class="prv-arow"><a href="javascript: ;" onclick="back_to_main_client_project()"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></span><span class="pj-title"><a href="javascript: ;"  onclick="back_to_main_client_project()" id="new-project-name-class">Lawyers</a></span></h5></div></div>'; 
      $.ajax({
         url: '/chat-sideboard-client-new-ajax',
         type: 'GET',
         data: {client_actual_id: client_actual_id, project_actual_name: project_actual_name},
         dataType: 'json',
         success: function(event){
            $("#new-project-view-with-lawyer-id").html(var_head_html+event);
         }, error: function(event){

         }
      })
   }

   

   function back_to_main_client_project()
   {
      $(".inbox_people").removeClass("show-single-project");
   }

   function my_toggle_chat_control()
   {
      $(".drop-menu").toggleClass("show-dropdown");
   }



   // checking proposal 

   function proposal_send_checking(clientID, projectID, projectName, jobBeforeID, lawyerID)
   {
      $.ajax({
        url: '/accepting-proposal-checking',
        type: 'GET',
        data: {clientID: clientID, projectID: projectID, projectName: projectName, jobBeforeID: jobBeforeID, lawyerID: lawyerID},
        dataType: 'JSON',
        success:  function(event)
        {
          if(event == 'no_data')
          {
            $("#unaccept_modal").modal('show');
            setTimeout(function(){ $("#unaccept_modal").modal('hide'); }, 5000);
          }
          else if(event == 'yes_data')
          {
            $("#accept-proposal-yes-job-id").attr('onclick','myAcceptProposalCheck('+clientID+','+projectID+',"'+projectName+'",'+jobBeforeID+','+lawyerID+')');
            $("#accept-chat-proposal").modal('show');
          }
          else if(event == 'error')
          {
            console.log('try again later');
          }
          else
          {
            $("#Error-modal").modal('show');
            $("#Error-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Server down ! Try again sometime later</span> </h3>');
            setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
          }
        }, 
        error:  function(event)
        {

        }
      })
   }

   // submit a proposal 
   function submit_a_proposal(clientID, projectID, projectName, jobBeforeID, lawyerID)
   {
      $("#proposal-project-id").val(projectID);
      $("#proposal-project-name").val(projectName);
      $("#proposal-project-client-id").val(clientID);
      $("#proposal-project-lawyer-id").val(lawyerID);

      $("#submit-chat-proposal-modal").modal('show');
   }

   // submit form proposal
   function proposal_project_submit_proposal()
   {      
      var proposal_project_id = $("#proposal-project-id").val();
      var proposal_project_name = $("#proposal-project-name").val();
      var proposal_project_client_id = $("#proposal-project-client-id").val();
      var proposal_project_lawyer_id = $("#proposal-project-lawyer-id").val();

      var proposal_project_lawyer_description = $("input[name='proposal_project_lawyer_description']").val();
      var proposal_project_lawyer_comments = $("textarea[name='proposal_project_lawyer_comments']").val();
      var proposal_project_billing_type = $("input[name='proposal_project_billing_type']:checked").val();
      var proposal_project_billing_rate = $("input[name='proposal_project_billing_rate']").val();

      $.ajax({
        url : "/submit-chat-proposal-from-client",
        type: "GET",
        data: {
            proposal_project_id: proposal_project_id, 
            proposal_project_name: proposal_project_name, 
            proposal_project_client_id: proposal_project_client_id,
            proposal_project_lawyer_id: proposal_project_lawyer_id,
            proposal_project_lawyer_description: proposal_project_lawyer_description,
            proposal_project_lawyer_comments:  proposal_project_lawyer_comments,
            proposal_project_billing_type: proposal_project_billing_type,
            proposal_project_billing_rate: proposal_project_billing_rate  
          },
        dataType: "json",
        success: function(event){
          if(event == "success")
          {
            $("#submit-chat-proposal-modal").modal('hide');
            $("#success-modal").modal('show');
            $("#success-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Successfully sent the proposal</span> </h3>');
            setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
          }
          else if(event == "error")
          {
            $("#submit-chat-proposal-modal").modal('hide');
            $("#Error-modal").modal('show');
            $("#Error-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Proposal did not submitted</span> </h3>');
            setTimeout(function(){ $("#Error-modal").modal('hide'); $("#submit-chat-proposal-modal").modal('show'); }, 3000);
          }
          else if(event == "already_exist")
          {
            $("#submit-chat-proposal-modal").modal('hide');
            $("#Error-modal").modal('show');
            $("#Error-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>You Already Send A Proposal</span> </h3>');
            setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
          }
        }, error:  function(event){

        }
      })
   }

   // accept proposal check

  function myAcceptProposalCheck(clientID, projectID, projectName, jobBeforeID, lawyerID)
  {
    $.ajax({
      url: "/submit-acceptation-proposal",
      type: "GET",
      data: { clientID: clientID, projectID: projectID, projectName: projectName, jobBeforeID: jobBeforeID, lawyerID: lawyerID },
      dataType: "json",
      success:  function(event){
        if(event == "success")
        {
          $("#accept-chat-proposal").modal('hide');
          $("#success-modal").modal('show');
          $("#success-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Successfully Accepting The Proposal</span> </h3>');
          setTimeout(function(){ 
            $("#success-modal").modal('hide'); 
            chat_send_blocking(); 
          }, 3000);
        }
        else if(event == "error")
        { 
          $("#accept-chat-proposal").modal('hide');
          $("#error-on-accepting-modal").modal('show');
          setTimeout(function(){ $("#error-on-accepting-modal").modal('hide'); }, 3000);
        }
        else if(event == "already_exists")
        { 
          $("#accept-chat-proposal").modal('hide');
          $("#Error-modal").modal('show');
          $("#Error-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Already accepted this proposal</span> </h3>');
          setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
        }
        else
        {
          $("#accept-chat-proposal").modal('hide');
          $("#Error-modal").modal('show');
          $("#Error-modal").find('.modal-body .center-part').html('<h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Server down ! please try again later</span> </h3>');
          setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
        }
      }, error:  function(event){

      }
    })
  }

  function chat_send_blocking()
  {
    var hide_id = $("#for-chat-hidden-job-before-id").val();
    var hide_name = $("#for-chat-hidden-job-before-name").val();
    var hide_client_id = $("#for-chat-hidden-job-before-client-id").val();
    var hide_lawyer_id = $("#for-chat-hidden-job-before-lawyer-id").val();

    if(hide_id != '' && hide_name != '' && hide_client_id != '' && hide_lawyer_id != '')
    {
    $.ajax({
      url: "/chat-send-block-other",
      type: "GET",
      data: { hide_id: hide_id, hide_name: hide_name, hide_client_id: hide_client_id, hide_lawyer_id: hide_lawyer_id },
      dataType: "json",
      success: function(event)
      {
        if(event == "response_yes")
        {
          if($('.input_msg_write').css('display') == 'none')
          {
            $('.input_msg_write').css('display','block');
            if($('.not-type-msg').css('display') != 'none')
            {
              $('.not-type-msg').css('display','none');
            }
          }
        }
        else if(event == "response_no")
        {
          if($('.not-type-msg').css('display') == 'none')
          {
            $('.not-type-msg').css('display','block');
            if($('.input_msg_write').css('display') != 'none')
            {
              $('.input_msg_write').css('display','none');
            }
          }  
        }
        else
        {
          if($('.input_msg_write').css('display') == 'none')
          {
            $('.input_msg_write').css('display','block');
            if($('.not-type-msg').css('display') != 'none')
            {
              $('.not-type-msg').css('display','none');
            }
          }
        }
      }, error: function(event){

      }
    })
  }
  }

  // -------------------2020.09.04--------------------
  // raise invoice from chat panel 
    // start raise invoice 
    function chatRaiseInvoice(client_id, project_id, project_name, jobBeforeId, lawyer_id)
    {
      // variable define 
      var clientID = client_id;
      var lawyerID = lawyer_id;
      var projectID = project_id;
      var projectName = project_name;
      var jobBeforeId = jobBeforeId;

      // put value on those particular hidden ids for sending data to "raise an invoice"

     $("#raise-invoice-on-project-id").val(clientID);
     $("#raise-invoice-on-project-name").val(projectName);
     $("#raise-invoice-on-project-lawyer-id").val(lawyerID);
     $("#raise-invoice-on-project-client-id").val(clientID);
     $("raise-invoice-on-project-jobBefore-id").val(jobBeforeId);


      // modal shown after clicking 
      $("#raise-invoice-modal-id").modal('show');
      

    }
    // end of start raise invoice

    // final create invoice by lawyer

    function final_create_invoice_by_lawyer()
    {
      // hidden field's value taken
      var raise_project_id = $("#raise-invoice-on-project-id").val();
      var raise_project_name = $("#raise-invoice-on-project-name").val();
      var raise_project_job_before_id = $("#raise-invoice-on-project-jobBefore-id").val();
      var raise_client_id = $("#raise-invoice-on-project-client-id").val();
      var raise_lawyer_id = $("#raise-invoice-on-project-lawyer-id").val();

      // end of hidden field's value taken

      // visible field's values stored in variable
      var raise_amount = $("#raise-amount").val();
      var raise_description = $("#raise-description").val();

      // end of visible field's values stored in variable

      if(raise_amount == "")
      {
        $(".raise-error").html('<p>You must add a minimum amount </p>');
        $(".raise-error").css('display','block');
        setTimeout(function(){ $(".raise-error").css('display','none'); }, 3000);
      }
      else
      {
        $.ajax({
          url: "/final-invoice-lawyer-create",
          type: "GET",
          data: {raise_project_id: raise_project_id, raise_project_name: raise_project_name, raise_project_job_before_id: raise_project_job_before_id, raise_client_id: raise_client_id, raise_lawyer_id: raise_lawyer_id, raise_amount: raise_amount, raise_description: raise_description},
          dataType: 'json',
          success:  function(event){

          }, error:  function(event){

          }
        })
      }


    }

    // end of final create invoice lawyer 
</script>
@endsection