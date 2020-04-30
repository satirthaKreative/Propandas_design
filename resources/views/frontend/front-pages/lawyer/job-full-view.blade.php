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
               @include('frontend.front-pages.lawyer.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">              
               <div class="detail-content">
                   <div class="media ">
                            <img class="md-img" src="{{ asset('frontAssets/images/no-img.jpg') }}" alt="image">
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
                                 <span><a href="javascript:void(0)" class="dt-btn">Select Job</a></span>
                                 <span><a href="javascript:void(0)" class="dt-btn">Cancel Job</a></span>
                                 </p>
                               
                             </div>
                        </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection