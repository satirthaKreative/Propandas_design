@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Administrator Notification</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @if(Auth::user()->is_lawyer == 0)
                  @include('frontend.front-pages.client.include.sidebar')
               @elseif(Auth::user()->is_lawyer == 1)
                  @include('frontend.front-pages.lawyer.include.sidebar')
               @endif

            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
                <h6>Administrator Message</h6>     
               <div class="dshbrd-inner"> 
                        
               <ul class="filter-result notification-list system-msg-class">

                  <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading system message</h5></li>
                  
               </ul>
            </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('pagewishjs')
<script type="text/javascript">
  $(function(){
    page_system_msg_load();
    setInterval(function(){ page_system_msg_load(); },50000);
  });

  function close_system_msg(id)
  {
    $.ajax({
      url: '/close-system-msg',
      type: 'GET',
      data: {id: id},
      dataType: 'json',
      success: function(event_response){
          page_system_msg_load();
      }, error: function(event_response){

      }
    })
  }


  function page_system_msg_load()
  {
    $.ajax({
      url: '/system-message/all-msg',
      type: 'GET',
      dataType: 'json',
      success:  function(event_response){
        $(".system-msg-class").html(event_response);
      }, error:  function(event_response){

      }
    })
  }


</script>
@endsection