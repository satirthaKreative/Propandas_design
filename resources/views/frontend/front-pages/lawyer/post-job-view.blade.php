@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Posted Jobs</h3>
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
               <h6>Post Jobs</h6>
               <div class="src-filter ">
                  <form action="">
                     <div class="row">
                        <div class="col-md-12 alert-msg  job-alert-msg" style="display: none;">
                           
                        </div>
                        <div class="col-md-4 plr-5">
                           <div class="form-group">
                              <label for="">Type of job</label>
                              <select name="type" id="type"  class="form-control  job-type-class" aria-hidden="true" onchange="change_job_type()">
                                 <option selected="selected" value="">Select Job Type</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4 plr-5">
                          <div class="form-group">
                              <label for="">Sort by date</label>
                              <select name="type" id="type"  class="form-control sort-type-class" aria-hidden="true" onchange="change_sort_by_date()">
                                 <option selected="selected" value="">Select Sort By</option>
                                 <option value="1">Newest</option>
                                 <option value="2">Oldest</option>                                      
                              </select>
                           </div>
                        </div>

                         <div class="col-md-4 plr-5">
                          <div class="form-group">
                              <label for="">&nbsp;</label>
                              <input type="button" name="" value="Search" class="flt-search" onclick="search_job_btn()">
                           </div>
                        </div>
                     </div>
                     
                  </form>
               </div>
               <ul class="filter-result all-job-show-share post-full-job-class">
                  <p class="pre-loading text-info text-center"><i class="fa fa-spinner"></i> Loading Posted Jobs ... </p>
                  <!-- <li>
                  	<div class="left-step">
                  		<div class="media">
                  			 <img class="md-img" src="{{ asset('frontAssets/images/no-img.jpg') }}" alt="image">
                  			  <div class="media-body">
                  			  	 <h5>Employment Job</h5>
                  			  	 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  			  </div>
                  		</div>
                  	</div>

                  	<div class="right-step">
                  		<br>
                           <a href="job-detail.php" class="shrt-btn vw-btn">View Job</a>
                        </div>  
                    
                  </li> -->

               
                  
               </ul>
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
      $(function(){
         checking_days_left();
         $.ajax({
            // headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: '/all_posted_job_show',
            type: 'GET',
            dataType: 'json',
            success: function(event_response){
               $(".all-job-show-share").html(event_response);
            }, error: function(event_response){

            }
         })


         $.ajax({
            url: '/jcategory_ajax',
            type: 'GET',
            dataType: 'json',
            success: function(event_response){
               $(".job-type-class").html(event_response);
            }, error: function(event_response){

            }
         })
      })

      // checking time limit
      function checking_days_left()
      {
         $.ajax({
            url: '/checking-days-left',
            type: 'GET',
            dataType: 'json',
            success: function(event){
               console.log(event);
            }, error: function(event){

            }
         })
      }
      // end checking time limit

      function search_job_btn()
      {
         var job_type = $(".job-type-class").val();
         var date_type = $(".sort-type-class").val();

         if(job_type == ''){
            $(".alert-msg").html("<p class='text-danger text-center'><span class=''><i  class='fa fa-times'></i> Please select job types.</span></p>").fadeIn().delay(3000).fadeOut('slow');
         }else if(date_type == ''){ 
            $(".alert-msg").html("<p class='text-danger text-center'><span class=''><i  class='fa fa-times'></i> Please select date types.</span></p>").fadeIn().delay(3000).fadeOut('slow');
         }else{
            $.ajax({
               url: '/search_job_ajax',
               type: 'GET',
               data: {job_type: job_type, date_type: date_type},
               dataType: 'json',
               success: function(event_response){
                  $(".all-job-show-share").html(event_response);
               }, error: function(event_response){

               }
            })
         }
         
      }

      function change_job_type()
      {
         var job_type = $(".job-type-class").val();

         if(job_type == ''){
            $(".alert-msg").html("<p class='text-danger text-center'><span class=''><i  class='fa fa-times'></i> Please select job types.</span></p>").fadeIn().delay(3000).fadeOut('slow');
         }else{
            $.ajax({
               url: '/search_job_ajax',
               type: 'GET',
               data: {job_type: job_type},
               dataType: 'json',
               success: function(event_response){
                  $(".all-job-show-share").html(event_response);
               }, error: function(event_response){

               }
            })
         }
      }

      function change_sort_by_date()
      {
         var date_type = $(".sort-type-class").val();

         if(date_type == ''){ 
            $(".alert-msg").html("<p class='text-danger text-center'><span class=''><i  class='fa fa-times'></i> Please select date types.</span></p>").fadeIn().delay(3000).fadeOut('slow');
         }else{
            $.ajax({
               url: '/search_job_ajax',
               type: 'GET',
               data: {date_type: date_type},
               dataType: 'json',
               success: function(event_response){
                  $(".all-job-show-share").html(event_response);
               }, error: function(event_response){

               }
            })
         }
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
   </script>
@endsection