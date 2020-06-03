@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Related Lawyers</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content dshbrd-lawyer-related">              
               <ul>
                  <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Searching lawyers according to your requirements ...</h5></li>
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
         url: '/related-lawyers-ajax',
         type: 'GET',
         dataType: 'json',
         success: function(event){
            $(".dshbrd-lawyer-related").html(event);
         }, error:  function(event){

         }
      })
   }

   function send_invite(project_id, lawyer_id, client_id, count_id){
      $.ajax({
         url: '/notification-send-to-related-lawyer',
         type: 'GET',
         data: {project_id: project_id, lawyer_id: lawyer_id, client_id: client_id, count_id: count_id},
         dataType: 'json',
         success: function(event)
         {
            if(event == 'Success')
            {
               invite_page_load();
            }
         },
         error: function(event)
         {

         }
      })
   }
</script>
@endsection