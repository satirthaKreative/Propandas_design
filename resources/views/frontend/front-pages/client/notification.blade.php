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
               
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
                <h6>Notification</h6>     
               <div class="dshbrd-inner"> 
                        
               <ul class="filter-result notification-list">

                  <p class="text-center text-info"><i class="fa fa-spinner"></i> loading notifications</p>

                  
                  
               </ul>
            </div>
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
      page_load_func();

      setInterval(function(){ 
         $(".notification-list").load(location.href + " .notification-list");
         page_load_func(); 
      },50000);
   })


   function page_load_func()
   {
      $.ajax({
         url: '/notify-all',
         type: 'GET',
         dataType: 'json',
         success: function(event_res){
            console.log(event_res)
            if(event_res.length > 0){
               var html = '';
               for(var i = 0 ; i < event_res.length ; i++)
               {
                  var date_new = new Date(event_res[i].actual_date);
                  var year_val = date_new.getFullYear();
                  var month_val1 = date_new.getMonth();
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

                  if(event_res[i].category_description.length > 200){
                     var des = (event_res[i].category_description).substr(0,200)+"...";
                  }else{
                     var des = event_res[i].category_description;
                  }

                  if(event_res[i].unread_status == 'unread'){
                     var state_unread_check = 'unread-notify';
                  }else if(event_res[i].unread_status == 'read'){
                     var state_unread_check = 'read-notify';
                  }

                  if(event_res[i].main_notification_type == "proposal"){
                     var main_notify_type = 'Someone send proposal for this '+event_res[i].category_name+' project';
                     var getting_notify_heading = 'Getting a new proposal';
                  }



                  html +='<li  class="'+state_unread_check+'"><div class="left-step"><div class="media"><div class="close-circle"><a href="javascript: ;" onclick=remove_notify("'+window.btoa(event_res[i].propandasId)+'")><i class="fa fa-times" aria-hidden="true"></i></div></a> <div class="media-body"><h5><a href="/notification/'+window.btoa(event_res[i].propandasId)+'">'+getting_notify_heading+'</a></h5><p><a href="/notification/'+window.btoa(event_res[i].propandasId)+'">'+main_notify_type+'</a></p></div></div></div><div class="right-step"><span class="date-text"><i class="fa fa-clock-o" aria-hidden="true"></i>'+create_date+'</span></div> </li>';
               }
               $(".notification-list").html(html);
            }else{
               $(".notification-list").html("<li class='no-search-file'><h5 class='text-danger'><i class='fa fa-times'></i> No notification in queue </h5></li>");
            }
         }, error: function(event_res){

         }
      })
   }


   

   function remove_notify(data){
      $.ajax({
         url: '/notify-remove',
         type: 'GET',
         data: {data: window.atob(data) },
         dataType: 'json',
         success: function(event_res){
            page_load_func();
         }
      })
   }

</script>
@endsection