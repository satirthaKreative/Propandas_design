@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Notification</h3>
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
               <h6>Notification</h6>
               <ul class="invite-part">  
                  <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading notificatios ...</h5></li>
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
      invite_page_load();
   });
   function invite_page_load()
   {
      $.ajax({
         url: '/lawyer-notification-ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            $(".invite-part").html(event);
         }, error:  function(event){

         }
      })
   }
</script>
@endsection