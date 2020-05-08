@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>How it Works</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>How it Works</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="theme-inner">
   <div class="container">
      <div class="works-box">
         <h4>How propandas work easily</h4>
         <div class="video-frame">
            <span class="text-info"><i class="fa fa-spinner"></i> Loading video .....</span>
            <!-- <iframe  src="https://www.youtube.com/embed/g-DAaCtRMPQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
         </div>
      </div>
      <div class="works-box">
         <h4>3 easy steps to hire a lawyer</h4>
         <div class="step-content">
            <nav>
               <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#post-job" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 1</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/bag.png') }}" alt="">
                        </div>
                        <h5>POST YOUR JOB</h5>
                     </div>
                  </a>
                  <a class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#get-proposal" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 2</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/proposal-icon.png') }}" alt="">
                        </div>
                        <h5>GET PROPOSALS</h5>
                     </div>
                  </a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#hire-lawyer" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 3</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/hand-icon.png') }}" alt="">
                        </div>
                        <h5>HIRE YOUR LAWYER</h5>
                     </div>
                  </a>
               </div>
            </nav>
            <div class="tab-content">
               <div class="tab-pane fade show active" id="post-job">
                  <div class="tab-cnt" id="post_your_job_detail1">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
                  <div class="tab-featured" id="post_your_job_detail2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
               <div class="tab-pane fade" id="get-proposal">
                  <div class="tab-cnt" id="get_proposal1">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
                  <div class="tab-featured" id="get_proposal2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
               <div class="tab-pane fade" id="hire-lawyer" >
                  <div class="tab-cnt" id="hire_lawyer1">
                    <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
                  <div class="tab-featured" id="hire_lawyer2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="works-box">
         <h4>3 easy steps to get a client</h4>
         <div class="step-content">
            <nav>
               <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#register-job" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 1</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/regiester-icon.png') }}" alt="">
                        </div>
                        <h5>Register yourself</h5>
                     </div>
                  </a>
                  <a class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#search-job" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 2</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/search.png') }}" alt="">
                        </div>
                        <h5>search a job</h5>
                     </div>
                  </a>
                  <a class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#get-client" href="javascript:void(0)" >
                     <div class="tab-top">
                        <h6>Step 3</h6>
                        <div class="stp-icon">
                           <img src="{{ asset('frontAssets/images/hand-icon.png') }}" alt="">
                        </div>
                        <h5>Get a client</h5>
                     </div>
                  </a>
               </div>
            </nav>
            <div class="tab-content">
               <div class="tab-pane fade show active" id="register-job">
                  <div class="tab-cnt" id="register_yourself1">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
                  <div class="tab-featured" id="register_yourself2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
               <div class="tab-pane fade" id="search-job">
                  <div class="tab-cnt" id="search_job1">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                     
                  </div>
                  <div class="tab-featured" id="search_job2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
               <div class="tab-pane fade" id="get-client" >
                  <div class="tab-cnt" id="get_a_client1">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
                  <div class="tab-featured" id="get_a_client2">
                     <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('pagewishjs')
<script>
  $(function(){
    $.ajax({
      url: "/frontHowItWorksPage",
      type: "GET",
      dataType: "json",
      success: function(event){
        $(".video-frame").html(event[0].video_iframe_links);

        $("#post_your_job_detail1").html(event[0].post_your_job_detail1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#post_your_job_detail2").html(event[0].post_your_job_detail2);
        $("#get_proposal1").html(event[0].get_proposal1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#get_proposal2").html(event[0].get_proposal2);

        $("#hire_lawyer1").html(event[0].hire_lawyer1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#hire_lawyer2").html(event[0].hire_lawyer2);
        $("#register_yourself1").html(event[0].register_yourself1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#register_yourself2").html(event[0].register_yourself2);

        $("#search_job1").html(event[0].search_job1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#search_job2").html(event[0].search_job2);
        $("#get_a_client1").html(event[0].get_a_client1+'<p><a href="javascript:void(0)" class="start-btn">Get  Started<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>');
        $("#get_a_client2").html(event[0].get_a_client2);


      }, error: function(event){

      }
    })
  })
</script>
@endsection