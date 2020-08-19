@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Posted Job</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.lawyer.include.sidebar')
               <?php

                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = base64_decode(end($link_array));

                
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">              
               <div class="detail-content">
                   <div class="media ">
                    <div class="media-body">
                      <p class="pre-loading text-info text-center"><i class="fa fa-spinner"></i> Loading Current Posted Job Details ... </p>
                    </div>
                            <!-- <img class="md-img" src="{{ asset('frontAssets/images/no-img.jpg') }}" alt="image">
                             <div class="media-body">
                               <h5>Employment Job</h5>
                               <h6>Laboris nisi ut aliquip ex ea. </h6>
                               <p>Ut enim ad minim veniam,
                               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                               <p>Excepteur sint occaecat cupidatat non  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Excepteur sint occaecat cupidatat non.</p>
                               <p><strong>Anim id est laborum</strong></p>
                               <p>Excepteur sint occaecat cupidatat non
                               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                               <p>Excepteur sint occaecat cupidatat non  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Excepteur sint occaecat cupidatat non.</p>
                               <ul>
                                 <li>Sunt in culpa qui officia deserunt mollit anim</li>
                                 <li>Sunt in culpa qui officia deserunt mollit anim</li>
                                 <li>Sunt in culpa qui officia deserunt mollit anim</li>
                              </ul>

                              <p>
                                 <span><a href="javascript:void(0)" class="dt-btn">Apply Job</a></span>
                                 <span><a href="/posted-jobs" class="dt-btn">Back</a></span>
                                 </p>
                               
                             </div> -->
                        </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
   <!-- The proposal Modal -->
   <div class="modal" id="proposal-particular-modal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Proposal View</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body proposal-show-class">
           
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

       </div>
     </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
   <script>
      show_current_job_view(<?= $get_arg_id ?>);
      function show_current_job_view(data){
        $.ajax({
           // headers: {
           //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           // },
           url: '/current_selected_posted_job_show',
           type: 'GET',
           data: {data:  data},
           dataType: 'json',
           success: function(event_response){
              $(".media").html(event_response);
           }, error: function(event_response){

           }
        })
      }

      function decline_status_check()
      {
        var get_arg01 = "<?= $get_arg_id; ?>";
        $.ajax({
          url: '/decline_project_by_particular_client',
          type: 'GET',
          data: {get_arg01: get_arg01},
          dataType: 'json',
          success: function(event_res){
            $(".dt-btn").css({'pointer-events': 'none','cursor':'not-allowed'});
          }, error: function(event_res){
            
          }
        })
      }

      function lawyer_checked_proposal_modal(jio_id)
      {
         $.ajax({
          url: '/lawyer-checked-proposal-modal',
          type: 'GET',
          data: {jio_id: jio_id},
          dataType: 'json',
          success:  function(event){
            $(".proposal-show-class").html(event);
            $("#proposal-particular-modal").modal('show');
          }, error:  function(event){

          }
         })
      }

      function chat_insert_id_function()
      {
        var main_job_posted_id = "<?= $get_arg_id; ?>";
        $.ajax({
          url: '/chat-insert-id-function',
          type: 'GET',
          data: {main_id: main_job_posted_id },
          dataType: 'json',
          success: function(event)
          {
            console.log(event); 
          },
          error:  function(event)
          {

          }
        })
      }
   </script>
@endsection