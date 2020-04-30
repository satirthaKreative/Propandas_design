@extends('layouts.frontendLayouts.app')
@section('content')
<section id="myCarousel" class="banner_part carousel slide carousel-fade" data-ride="carousel" data-interval="7000">
   <ol class="carousel-indicators" id="banner-carou-ids">
      <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner" role="listbox" id="banner-data-slow-id">
      <div class="carousel-item active">
         <img src="{{ asset('frontAssets/images/banner1.jpg') }}" alt="" class="img-fluid" />
         <div class="carousel-caption">
            <h1><span>Propandas the digital way to get</span>LEGAL WORK DONE</h1>
            <p>ProPandas is the digital way to get your legal work done. Hire a lawyer online.Because future requires technology.</p>
            <a href="#" class="cnt-btn">Get Free Proposals <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
         </div>
      </div>
      <div class="carousel-item">
         <img src="{{ asset('frontAssets/images/banner2.jpg') }}" alt="" class="img-fluid" />
         <div class="carousel-caption">
            
            <h1><span>Propandas the digital way to get</span>LEGAL WORK DONE</h1>
            <p>ProPandas is the digital way to get your legal work done. Hire a lawyer online.Because future requires technology.</p>
            <a href="#" class="cnt-btn">Get Free Proposals <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
         </div>
      </div>
      <div class="carousel-item">
         <img src="{{ asset('frontAssets/images/banner3.jpg') }}" alt="" class="img-fluid" />
         <div class="carousel-caption">
            
            <h1><span>Propandas the digital way to get</span>LEGAL WORK DONE</h1>
            <p>ProPandas is the digital way to get your legal work done. Hire a lawyer online.Because future requires technology.</p>
            <a href="#" class="cnt-btn">Get Free Proposals <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
         </div>
      </div>
   </div>
   <!-- Left and right controls -->
   <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
   <span class="carousel-control-prev-icon"></span>
   </a>
   <a class="carousel-control-next" href="#myCarousel" data-slide="next">
   <span class="carousel-control-next-icon"></span>
   </a>
</section>
<!-- end banner_part -->
<section class="lg-service">
   <div class="container">
      <div class="top-title">
         <h1><small>Popular</small>LEGAL SERVICES <span></span></h1>
         <p>ProPanda’s algorithm connects you with the right lawyer for your legal problem.</p>
      </div>
      <div class="service-list">
         <div class="row my-tt">
            <!-- <div class="col-sm-3 plr-5">
               <div class="cr-box">
                  <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-1.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Business</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                 <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-2.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Intellectual Property</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                 <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-3.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Employment</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                  <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-4.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Contracts & Agreements</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                 <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-5.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Immigration</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                  <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-6.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Real Estate</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                 <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-7.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Tax</p>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-sm-3 plr-5">
               <div class="cr-box">
                  <a href="{{ route('search.index') }}">
                     <img src="{{ asset('frontAssets/images/service-8.jpg') }}" alt="images" class="img-fluid">
                     <div class="text-overley">
                        <p>Others</p>
                     </div>
                  </a>
               </div>
            </div> -->
         </div>
      </div>
   </div>
</section>
<!-- end lg-service -->
<section class="about-part">
   <div class="container">
      <div class="row">
         <div class="col-sm-5" id="home-workImg-id">
            <img src="{{ asset('frontAssets/images/abt-img.jpg') }}" alt="about-image" class="img-fluid round-shape">
         </div>
         <div class="col-sm-7" id="home-work-id">
            <div class="top-title">
               <h1>How It Works <span></span></h1>
            </div>
            <p>It’s the ProPandas way of doing legal work.</p>
            <ul>
               <li>You post your legal need on ProPandas</li>
               <li>ProPandas will connect you with a lawyer through secure communication</li>
               <li>The lawyer will take care of your legal need at ProPandas virtual office</li>
            </ul>
            <p>We believe that streamlining and digitalizing the legal market will make it moretransparent, efficient and secure for everyone. Hire a lawyer shall be as easy andefficient as hailing a ride. ProPandas will guarantee that communication with yourlawyer will stay secure by using encryption technology.</p>
            <div class="inf-part">
               <div class="row">
                  <div class="col-md-6">
                     <h3><span><img src="{{ asset('frontAssets/images/hmm-icon.png') }}" alt="icon"></span>25 year <small>Long Experience</small></h3>
                  </div>
                  <div class="col-md-6">
                     <h3 class="no-border cntct-text">+1 6502509458 <small>Call to ask any question</small></h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of about-part -->
<section class="review-section">
   <div class="container"  id="testimonials-full-client">
     <!--  <div class="top-title white-title">
         <h1><small>Testimonial</small>What People Say <span></span></h1>
      </div>

     <div class="owl-carousel review-slide owl-theme " >
               <div class="item "> 
                        <img class="img-fluid clint-prf" src="{{ asset('frontAssets/images/clint-logo.jpg') }}"  alt="brnd-images"> 
                        <figcaption>
                           <p class="review-text">I am looking forward to the launch of ProPandas as it will enable me to connect withspecialized lawyers on a case-to-case basis with no unnecessary overhead costs oroffice visits. </p>
                           <blockquote class="cnt-info">
                              <h4>Sebastian Schwarzenegger</h4>
                              <p>Investmentbanker and Entrepreneur</p>
                           </blockquote>
                        </figcaption>
              
               </div>
               <div class="item "> 
                        <img class="img-fluid clint-prf" src="{{ asset('frontAssets/images/clint-logo.jpg') }}"  alt="brnd-images"> 
                        <figcaption>
                           <p class="review-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit. </p>
                           <blockquote class="cnt-info">
                              <h4>Howard K. Stern</h4>
                              <p>CEO and Co-Founder</p>
                           </blockquote>
                        </figcaption>
              
               </div>

               
            </div> -->







      
   </div>
</section>
<!-- end of review-section -->
<section class="owner-part">
   <div class="container">
      <div class="top-title">
         <h1><small>Meet the People</small>Behind Propandas <span></span></h1>
         <p id="behind-propandas-heading-details">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
      </div>
      <div class="owner-list" id="teamScrollHome">
         <div class="row equal-row" id="behind-propandas-full-data">
            <div class="col-sm-6 equal-box">
               <div class="srvc-item">
                  <div class="img-part">
                     <a href="javascript:void(0)"><img src="{{ asset('frontAssets/images/owner-1.jpg') }}" alt="images" class="img-fluid"></a>
                  </div>
                  <div class="img-info">
                     <h5>Daniel Schwarzl</h5>
                     <h6>co-founder</h6>
                     <p>Daniel Schwarzl is co-founder of ProPandas and an admitted attorney in New York with experience in technology law, cryptocurrencies and the entertainment industry.Having graduated from Stanford University, Daniel is focused on bridging with technology.</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 equal-box">
               <div class="srvc-item">
                  <div class="img-part">
                     <a href="#"><img src="{{ asset('frontAssets/images/owner-2.jpg') }}" alt="images" class="img-fluid"></a>
                  </div>
                  <div class="img-info">
                     <h5>Robin Lumsden</h5>
                     <h6>co-founder</h6>
                     <p>Robin Lumsden is co-founder at ProPandas and managing partner of the business law firm Lumsden & Partner with offices in Vienna, New York and Silicon Valley and an investor to multiple technology companies and founder of a digital asset hedge fund. He completed degrees at the Universities Berkeley and Stanford was formerly a professional tennis player.</p>
                  </div>
               </div>
            </div>
            <!-- <div class="col-sm-4">
               <div class="srvc-item">
                  <div class="img-part">
                     <a href="#"><img src="images/owner-3.jpg" alt="images" class="img-fluid"></a>
                  </div>
                  <div class="img-info">
                     <h5>Deepak Mittal</h5>
                     <h6>co-founder</h6>
                     <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos </p>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>
</section>
<!-- owner-part -->

@endsection