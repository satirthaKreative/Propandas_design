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
                        <div class="col-md-3 plr-5">
                           <div class="form-group">
                              <label for="">Type of job</label>
                              <select name="type" id="type"  class="form-control" aria-hidden="true">
                                 <option selected="selected" value="mine">Select Job Type</option>
                                 <option value="">Business</option>
                                 <option value="">Intellectual Property</option>
                                 <option value="">Employment </option>
                                 <option value="">Contracts & Agreements</option>
                                 <option value="">Immigration </option>
                                 <option value="">Real Estate </option>
                                 <option value="">Tax </option>
                                 <option value="">Lawsuits & Disputes</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 plr-5">
                          <div class="form-group">
                              <label for="">Countries</label>
                              <select name="type" id="type"  class="form-control" aria-hidden="true">
                                 <option selected="selected" value="mine">Select Country</option>
                                 <option value="">Germany</option>
                                 <option value="">Austria</option>                                      
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 plr-5">
                          <div class="form-group">
                              <label for="">Popular Cities</label>
                              <select name="type" id="type"  class="form-control" aria-hidden="true">
                                 <option selected="selected" value="mine">Select Cities</option>
                                 <option value="">Berlin</option>
                                 <option value="">Munich</option> 
                                 <option value="">Duesseldorf</option>
                                 <option value="">Koeln</option>   
                                 <option value="">Hamburg</option>
                                 <option value="">Hannover</option>
                                 <option value="">Stuttgart</option>
                                 <option value="">Frankfurt</option>                                          
                              </select>
                           </div>
                        </div>

                         <div class="col-md-3 plr-5">
                          <div class="form-group">
                              <label for="">&nbsp;</label>
                              <input type="submit" name="" value="Search" class="flt-search">
                           </div>
                        </div>
                     </div>
                     
                  </form>
               </div>
               <ul class="filter-result all-job-show-share">
                  <li>
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
                    
                  </li>

                  <li>
                  	<div class="left-step">
                  		<div class="media">
                  			 <img class="md-img" src="{{ asset('frontAssets/images/no-img.jpg') }}" alt="image">
                  			  <div class="media-body">
                  			  	 <h5>Contracts & Agreements</h5>
                  			  	 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  			  </div>
                  		</div>
                  	</div>

                  	<div class="right-step">
                  		<br>
                           <a href="job-detail.php" class="shrt-btn vw-btn">View Job</a>
                        </div>  
                    
                  </li>

                  <li>
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
                           <a href="job-detail.php" class="shrt-btn vw-btn">View Job</a>
                           <a href="job-detail.php" class="shrt-btn vw-btn">View Job</a>
                        </div>  
                    
                  </li>

                  <li>
                  	<div class="left-step">
                  		<div class="media">
                  			 <img class="md-img" src="{{ asset('frontAssets/images/no-img.jpg') }}" alt="image">
                  			  <div class="media-body">
                  			  	 <h5>Immigration</h5>
                  			  	 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  			  </div>
                  		</div>
                  	</div>

                  	<div class="right-step">
                  		<br>
                           <a href="javascript:void(0)" class="shrt-btn vw-btn">View Job</a>
                        </div>  
                    
                  </li>
                  
               </ul>
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
         $.ajax({
            // headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            url: '/all_posted_job_show',
            type: 'GET',
            dataType: 'json',
            success: function(event_response){
               console.log(event_response);
            }, error: function(event_response){

            }
         })
      })
   </script>
@endsection