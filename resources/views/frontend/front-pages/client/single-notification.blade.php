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
               @include('frontend.front-pages.client.include.sidebar')
               <?php

                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = end($link_array);

                
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">

              <div class="detail-content notf-detail">
                <p class="text-center text-info"><i class="fa fa-spinner"></i> loading current notification details</p>
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
      page_load_func();
      
   })

   function page_load_func()
   {
      var actual_id = '<?php echo $get_arg_id ?>';
      var decode_id = window.atob(actual_id);

      $.ajax({
         url: '/notification-single-show',
         type: 'GET',
         data: {data: decode_id},
         dataType:'json',
         success: function(event){
            var html = '';
            var date_new = new Date(event.proposal_data[0].created_at);
            var year_val = date_new.getFullYear();
            var month_val1 = date_new.getMonth();
            var day_val1 = date_new.getDate();

            if(month_val1 < 10){
               var month_val = "0"+date_new.getMonth();
            }else if(month_val1 > 9){
               var month_val = date_new.getMonth();
            }
            var day_val1 = date_new.getDate();
            if(day_val1 < 10){
               var day_val = "0"+date_new.getDate();
            }else if(day_val1 > 9){
               var day_val = date_new.getDate();
            }

            var create_date = year_val+"/"+month_val+"/"+day_val;

            if(event.proposal_data[0].billing_option == 0){
               var bill = event.proposal_data[0].billing_rate+" /fixed";
            }else if(event.proposal_data[0].billing_option == 1){
               var bill = event.proposal_data[0].billing_rate+" /hourly";
            }

            html += '<div class="row"><div class="col-md-8"><h5>Project Proposal by: '+event.user_data[0].name+'</h5><h6><i class="fa fa-envelope" aria-hidden="true"></i>'+event.user_data[0].email+'</h6><h6><i class="fa fa-phone" aria-hidden="true"></i>'+event.user_data[0].phn_num+'</h6></div><div class="col-md-4"><span class="date-text"><i class="fa fa-clock-o" aria-hidden="true"></i>'+create_date+'</span></div></div><p><b>Proposal Details</b></p><p>'+event.proposal_data[0].lawyer_des+'</p><p>'+event.proposal_data[0].lawyer_comment+'</p><p><b>Biling Charge : </b>'+bill+'</p><p><span><a href="/notification" class="dt-btn">Back</a></span> </p>';

            $(".notf-detail").html(html);
         }
      })
   }

</script>
@endsection