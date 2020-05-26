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
               @include('frontend.front-pages.client.include.sidebar')
               <?php

                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = end($link_array);
                $get_decode_id = base64_decode($get_arg_id);
                
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">

              <div class="detail-content job-proposal-requried-class">
                  <li class="no-search-file"><h5 class="text-info"><i class="fa fa-spinner"></i> Loading Job ...</h5></li>
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
      var get_url_id = '<?= $get_decode_id ?>';
      $.ajax({
        url: '/single-job-rquirement-proposal-ajax',
        type: 'GET',
        data: {get_id: get_url_id},
        dataType: "json",
        success: function(event){
          $(".job-proposal-requried-class").html(event);
        }, error: function(event){

        }
      })
    })
  </script>
@endsection