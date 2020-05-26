@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Lawyer-proposal</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
                @include('frontend.front-pages.lawyer.include.sidebar')
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
               <div class="dsbrd-qststep dshbrd-inner">
                        <form action="" id="proposal-form">                         

                           <div class="step-box proposal-form">
                            <div class="form-group">                              
                              <label class="title-lable">Lawyer  Description</label>
                                    <input type="text" name="lawyer_des" onfocusout="lawyer_des_check()"> 
                                    <input type="hidden" name="project_id"  value="{{ $get_arg_id }}">  
                            </div>

                            <div class="form-group">
                              <label class="title-lable">Lawyer  Comments</label>
                                    <textarea name="lawyer_comment" id="" onfocusout="lawyer_comment_check()"></textarea>    
                            </div>                            

                            <div class="form-group">
                              <label class="title-lable">Billing Option</label>                                                                
                                     <label><input type="radio" name="billing_option" value="0" checked>Fixed Rate</label> 
                                     <label><input type="radio" name="billing_option" value="1">Hourly Rate</label>  
                            </div>

                            <div class="form-group">                                 
                                 <label class="title-lable">Billing Rate</label>  
                                    <input type="number" name="billing_rate" onfocusout="billing_rate_check()">   
                            </div>
                            <div class="form-group">
                            <input type="button" onclick="submit_proposal()" name="search_submit" value="Submit" class="flt-search">
                           </div>
                                                                  
                              </div> 
                      
                           
                           
                        </form>
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
      function submit_proposal(){
        var rate_val = $("input[name=billing_rate]").val();
        if($("input[name=lawyer_des]").val() == ''){
          $("input[name=lawyer_des]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("input[name=lawyer_des]").attr('title','Enter your description');
        }else if($("textarea[name=lawyer_comment]").val() == ''){
          $("textarea[name=lawyer_comment]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("textarea[name=lawyer_comment]").attr('title','Enter your comment');
        }else if($("input[name=billing_rate]").val() == ''){
          $("input[name=billing_rate]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("input[name=billing_rate]").attr('title','Enter your rate for the project');
        }else{
          $.ajax({
             // headers: {
             //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             // },
             url: '/apply-job-with-proposal',
             type: 'GET',
             data: $("#proposal-form").serialize(),
             dataType: 'json',
             success: function(event_response){
              if(event_response == 1){
                $("#success-modal").modal('show');
                $("#success-modal h3").html('<span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Applied Successfully</span>');
                $("#success-modal p").html('<span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Your proposal send to client</span>');
                $(".dsbrd-qststep").load(location.href + " .dsbrd-qststep");
                setTimeout(function(){ $("#success-modal").modal('hide'); },3000);
              }else{
                $("#Error-modal").modal('show');
                $("#Error-modal h3").html('<span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Something Wrong</span>');
                $("#Error-modal p").html('<span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Server is not responding. Try again later</span>');
                setTimeout(function(){ $("#Error-modal").modal('hide'); },3000);
              }
             }, error: function(event_response){

             }
          })
        }
        
      }


      function lawyer_des_check()
      {
        if($("input[name=lawyer_des]").val() == ''){
          $("input[name=lawyer_des]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("input[name=lawyer_des]").attr('title','Enter your description');
        }else{
          $("input[name=lawyer_des]").css({'border':'1px solid green','box-shadow':'0 0 3px 0 green'});
          $("input[name=lawyer_des]").removeAttr('title');
        }
      }

      function lawyer_comment_check(){
        if($("input[name=lawyer_des]").val() == ''){
          $("textarea[name=lawyer_comment]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("textarea[name=lawyer_comment]").attr('title','Enter your comment');
        }else{
          $("textarea[name=lawyer_comment]").css({'border':'1px solid green','box-shadow':'0 0 3px 0 green'});
          $("textarea[name=lawyer_comment]").removeAttr('title');
        }
      }

      function billing_rate_check(){
        if($("input[name=billing_rate]").val() == ''){
          $("input[name=billing_rate]").css({'border':'1px solid red','box-shadow':'0 0 3px 0 red'});
          $("input[name=billing_rate]").attr('title','Enter your rate for the project');
        }else{
          $("input[name=billing_rate]").css({'border':'1px solid green','box-shadow':'0 0 3px 0 green'});
          $("input[name=billing_rate]").removeAttr('title');
        }
      }
   </script>
@endsection