@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Proposal List</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
               <?php
                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = end($link_array);

                $decode_arg_id = base64_decode($get_arg_id);
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">              
               <div class="detail-content">
                  <div class="media media-single-proposal">
                       <ul>
                          <li class="no-search-file" style="list-style-type: none"><h5 class="text-info"><i class="fa fa-spinner"></i> No proposal according for this project</h5></li>
                        </ul>    
                  </div>
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
      var url_id = '<?php echo $decode_arg_id ?>';
      $.ajax({
         url: '/single-proposal-ajax',
         type: 'GET',
         data: {url_id: url_id},
         dataType: 'json',
         success:  function(event){
          console.log(event);
            $(".media-single-proposal").html(event)
         }, error:  function(event){
            
         }
      })
   })
</script>
@endsection