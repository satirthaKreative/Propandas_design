@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">My Jobs</h3>
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
               <h6>Recent Jobs</h6>
               <div class="src-filter ">
                        <form action="" id="client_myjob_full_search_form">
                           <div class="row">
                              <div class="col-md-4 plr-5">
                                 <div class="form-group">
                                    <label for="">Filter Jobs</label>
                                    <select name="type" id="type" class="form-control client_myjob_category" aria-hidden="true" onchange="category_ajax_myJob()">
                                       <option selected="selected" value="">Select Job Type</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 plr-5">
                                <div class="form-group">
                                  <label for="">Search Jobs</label>
                                  <input type="text" name="" id="search_jobs" class="form-control client_mysearch_jobs" onkeyup="client_myjob_input_search()" placeholder="Search for jobs by title...">
                                 </div>
                              </div>
                              

                               <div class="col-md-4 plr-5">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="button" name=""  value="Search" class="flt-search" onclick="search_client_myjobs()">
                                 </div>
                              </div>
                           </div>
                           
                        </form>
                     </div>

                     <div class="dshbrd-inner">
                        <ul class="filter-result client-job-all-details-class"> 
                           <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading your job details</h5></li>
                        </ul>
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
   $(function(){
      my_full_job_views();
      job_categories();
   })

   function my_full_job_views()
   {
      $.ajax({
         url: '/my-job-full-view',
         type: 'GET',
         dataType: 'json',
         success: function(res){
            $(".client-job-all-details-class").html(res)
         }, error: function(res){

         }
      })
   }

   function job_categories()
   {
      $.ajax({
         url: '/client_myjob_category_ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            $(".client_myjob_category").html(event);
         }, error: function(event){

         }
      })
   }


   function category_ajax_myJob()
   {
      var data = $(".client_myjob_category").val();
      if(data == ''){
         var data_val = '';
      }else{
         var data_val = data;
      }
      $.ajax({
         url: '/my_job_full_view_ajax',
         type: 'GET',
         data: {data: data_val},
         dataType: 'json',
         success: function(event){
            $(".client-job-all-details-class").html(event)
         }, error: function(event){

         }
      })
   }


   function client_myjob_input_search()
   {
      var data = $('#search_jobs').val();

      if(data == ''){
         var data_val = '';
      }else{
         var data_val = data;
      }
      $.ajax({
         url: '/client_myjob_input_search_ajax',
         type: 'GET',
         data: {data: data_val},
         dataType: 'json',
         success: function(event){
            $(".client-job-all-details-class").html(event)
         }, error: function(event){

         }
      })
   }

   function search_client_myjobs()
   {
      var cate = $(".client_myjob_category").val();
      var search_jobs = $('#search_jobs').val();

      if(cate == ''){
         $(".client_myjob_category").css({"border":"1px solid red", "box-shadow":"0px 0px 3px 0px red"});
      }else if(search_jobs == '' && cate != ''){
            $(".client_myjob_category").css({"border":"1px solid #cecece", "box-shadow":"0px 0px 0px 0px"});
            $("#search_jobs").css({"border":"1px solid red", "box-shadow":"0px 0px 3px 0px red"});
      }else if(search_jobs != '' && cate != ''){
            $("#search_jobs").css({"border":"1px solid #cecece", "box-shadow":"0px 0px 0px 0px"});
            $(".client_myjob_category").css({"border":"1px solid #cecece", "box-shadow":"0px 0px 0px 0px"});

            $.ajax({
               url: '/client_myjob_full_form_search_ajax',
               type: 'GET',
               data: {cate: cate, search_jobs: search_jobs},
               dataType: 'json',
               success: function(event){
                  $(".client-job-all-details-class").html(event)
               }, error: function(event){

               }
            })
      }
   }
</script>
@endsection