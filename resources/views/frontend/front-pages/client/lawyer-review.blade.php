@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Lawyers Review</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.client.include.sidebar')
               <?php 
                  $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                  $link_array = explode('/',$link);
                  $last_part_url = end($link_array);
               ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">              
               <div class="detail-content  single-lawyer">
                   <div class="media ">
                            <img class="md-img" src="https://image.freepik.com/free-photo/smiling-mature-lawyer-working-courtroom_23-2147898545.jpg" alt="image">
                             <div class="media-body">
                              <div class="row">
                                <div class="col-md-8">
                                   <h5 id="lawyer-name-h5">Robert Hooks  </h5>
                                <p class="dg-text"><em>Lawyers Review</em></p> 
                                <div class="rating-bx">                               
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half-o" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                <label class="rv-number"><a href="javascript: ;"><i class="fa fa-plus-circle" aria-hidden="true"></i>14 Reviews</a></label>
                             </div>
                                <h6 id="lawyer-location-h6"><span>Location :</span>London, United Kingdom. </h6>
                                </div>

                                <div class="col-md-4">
                                </div>                                
                              </div>
                                        
                               
                             </div>
                        </div>


                        <div class="reviews-box" id="reviews-id" >
                              <h6>All Reviews</h6>
                              <div class="single-review">
                                <div class="media">
                                <img class="md-img" src="https://image.freepik.com/free-photo/smiling-mature-lawyer-working-courtroom_23-2147898545.jpg" alt="image">
                                <div class="media-body">
                                  <div class="top-rtg-line">
                                    <div class="rtng">
                                       <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="user-date">
                                      <span class="user-co">Nick Jones</span>
                                      <span class="date-co">3 Months ago</span>
                                    </div>
                                  </div>
                                  <h4>Best Services</h4>
                                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                              </div>
                              </div>

                              
                              
                            </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
  <script type="text/javascript">
    $(function(){
      page_load_lawyer_review();
    })

    function page_load_lawyer_review()
    {
      var page_extend = '<?php echo $last_part_url; ?>';

      $.ajax({
        url: "/lawyer-review-ajax",
        type: "GET",
        data: {page_extend: page_extend},
        dataType: "json",
        success: function(event){
          $("#lawyer-name-h5").html(event.full_name);
          $(".rating-bx").html(event.star_view);
          $("#lawyer-location-h6").html('<span>Location :</span>'+event.user_address);
          $("#reviews-id").html('<h6>All Reviews</h6>'+event.main_review);
        }, error: function(event){

        }
      })
    }
  </script>
@endsection