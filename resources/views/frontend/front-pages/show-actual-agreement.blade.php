@extends('layouts.frontendLayouts.app')
@section('content')

	@php 
		$got_page_url = $_SERVER['REQUEST_URI'];
		$exploded_page_segment = explode("/",$got_page_url);
		$get_last_segment = end($exploded_page_segment);
		$decode_seg_id = base64_decode($get_last_segment);
	@endphp
<section class="dshbord-theme">
   <div class="container">
      <div class="documents-content">
         <div class="row">
            <div class="col-md-9">
              <div class="agreement-bg " id="first-part">
                <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
              </div>

              <div class="agreement-bg  short-info" id="second-part">
                <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
              </div>
                 <div class="agreement-bg  agreement-content agreement-content-third-part" >
                  <div id="third-part">
                    <div class="data-loding"><i class="fa fa-spinner"></i> Loading Data's</div>
                  </div>
                  <div class="sign-place-box">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="sign-place">
                                                <p><span class="sign-line"></span>Landlord</p>
                                              </div>
                                            </div>

                                            <div class="col-md-6">
                                              <div class="sign-place right-sign">
                                                <p><span class="sign-line"></span>Tenant</p>
                                              </div>
                                            </div>
                                            </div>
                    </div>
                 </div>

               
                                             

            </div>
            <!-- end of col-md-9 -->
            <div class="col-md-3">
               <div class="sd-nav">
                  <h6>The Best Lawyers For Less</h6>
                  <p>Hire the top business lawyers and save up to 60% on legal fees</p>
                  @guest
                  <p><a href="javascript:void(0)" data-toggle="modal" data-target="#Login-client" class="pst-link">Post a Job</a></p>
                  @else
                  	@if(Auth::user()->is_lawyer == 0)
                  		<p><a href="<?php echo url('/client-job-post'); ?>" class="pst-link">Post a Job</a></p>
                  	@else
                  		<p><a href="javascript:void(0)" data-toggle="modal" data-target="#Login-client2" class="pst-link">Post a Job</a></p>
                  	@endif
                  @endguest
               </div>
               
            </div>
            <!-- end of col-md-3 -->
         </div>
        
      </div>
   </div>

   <!-- Redirecting modal -->
   <!-- no one -->
   <div class="modal fade theme-modal  show" id="Login-client">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->          
            <div class="modal-body text-center">
               <div class="center-part">
                  <span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>
                  <h4>You should login first</h4>
                  <p>
                     <a href="<?php echo url('/login'); ?>" class="cnt-btn">Go to Login</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- lawyer -->
   <div class="modal fade theme-modal  show" id="Login-client2">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->          
            <div class="modal-body text-center">
               <div class="center-part">
                  <span><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo" class="modal-logo"></span>
                  <h4>You should login as a client</h4>
               </div>
            </div>
         </div>
      </div>
   </div>

   
   <!-- /Redirecting modal -->
</section>
<!-- end of dshbord-theme -->

@endsection
@section('pagewishjs')
<script>
	$(function(){
		loading_full_page_data();
	})

	function loading_full_page_data()
	{
		var legal_id = '<?php echo $decode_seg_id; ?>';
		$.ajax({
			url: "/loading-agreement-full-page-data",
			type: "GET",
			data: {legal_id: legal_id},
			dataType: 'json',
			success: function(event){
        console.log(event);
				$("#first-part").html(event.first_part);
				$("#second-part").html(event.second_part);
				if(event.third_part == "")
				{
          $(".agreement-content-third-part").css('display','none');
				}
				else
				{
					$("#third-part").html(event.third_part);
				}
			}, error:  function(event){

			}
		})
	}
</script>
@endsection