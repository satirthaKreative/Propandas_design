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
   </script>
@endsection