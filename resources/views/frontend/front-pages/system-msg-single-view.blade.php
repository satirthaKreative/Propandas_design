@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Administrator Trade </h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @if(Auth::user()->is_lawyer == 0)
                  @include('frontend.front-pages.client.include.sidebar')
               @elseif(Auth::user()->is_lawyer == 1)
                  @include('frontend.front-pages.lawyer.include.sidebar')
               @endif


               <?php
                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = base64_decode(end($link_array));
                ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">

              <div class="detail-content notf-detail">
                <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading system message</h5></li>

                                 <!-- <div class="reply-form" >
                                    <h5>Your Comment</strong></h5>
                                    <form>
                                      <textarea name="" id="" placeholder="Your Message"></textarea>
                                      <input type="submit" name="" value="Submit" class="flt-search">
                                    </form>
                                 </div> -->
              </div>                       
               
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script type="text/javascript">
  $(function(){
    page_system_msg_load();
    function page_system_msg_load()
    {
      var sys_id = '<?php echo $get_arg_id; ?>';
      $.ajax({
        url: '/system-single-msg-ajax',
        type: 'GET',
        data: {system_id: sys_id},
        dataType: 'json',
        success:  function(event_response){
          if(event_response[0].unseen_status == 0)
          {
            $.ajax({
              url: '/unseen-status-ajax',
              type: 'GET',
              data: {system_id: sys_id},
              dataType: 'json',
              success: function(event_unseen){

              }, error: function(event_unseen){

              }
            })
          }

          if(event_response[0].project_name == null || event_response[0].project_name == '')
          {
            $project_value = 'Not Defined By Administrator';
          }
          else
          {
            $project_value = event_response[0].project_name;
          }
          var html = '';
          html +='<div class="row"><div class="col-md-8"><h5>Administrator Message</h5><h6><b>Project Name : </b>'+$project_value+'</h6></div><div class="col-md-4"><span class="date-text"><i class="fa fa-clock-o" aria-hidden="true"></i>'+event_response[0].updated_at+'</span></div></div><p><strong>Message in detail</strong></p><p>'+event_response[0].administrator_msg+'</p><p><span><a href="/system-message" class="dt-btn">Back</a></span></p>';

          $(".notf-detail").html(html);
        }, error:  function(event_response){

        }
      })
    }
  
  })



</script>
@endsection