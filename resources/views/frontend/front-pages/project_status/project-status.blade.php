@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Business Lawyers</h3>
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
               <div class="table-responsive theme-table prj-list-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Project List</th>
                           <th>Project Name</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="project-status-id">
                        <tr>
                           <td colspan="5"> <center><i class="fa fa-spinner"><i> Loading projects</center></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!-- review-modal Modal -->
               <div class="modal fade theme-modal" id="review-modal">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <!-- Modal body -->
                        <div class="modal-body ">
                           <div class="prj-review">
                              <div class="rtang-part">
                                 <h6>Write Your Own Review</h6>
                                 <div class="rating-bx">
                                    <h4>How do you rate this Project? Select the number of stars as your rating</h4>
                                    <div class="rating-row">
                                       
                                       <div class="rt-type">Service </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             @for($i=5; $i > 0; $i--)
                                             <input class="star star-{{ $i }}" id="service-review-{{ $i }}" value="{{ $i }}" type="radio" name="star" onclick="click_star('{{ $i }}')">
                                             <label class="star star-{{ $i }}" for="service-review-{{ $i }}"></label>
                                             @endfor
                                             <input type="hidden" id="click-star-service-id" value="0" name="">
                                          </form>
                                       </div>
                                    </div>
                                    <div class="rating-row">
                                       <div class="rt-type">Value </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             @for($j=5; $j > 0; $j--)
                                             <input class="star star-{{ $j }}" id="value-review-{{ $j }}" value="{{ $j }}" type="radio" name="star" onclick="click_value('{{ $j }}')">
                                             <label class="star star-{{ $j }}" for="value-review-{{ $j }}"></label>
                                             @endfor
                                             <input type="hidden" id="click-star-value-id" value="0" name="">
                                          </form>
                                       </div>
                                    </div>
                                    <div class="rating-row">
                                       <div class="rt-type">Time </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             @for($k=5; $k > 0; $k--)
                                             <input class="star star-{{ $k }}" id="time-review-{{ $k }}" value="{{ $k }}" type="radio" name="star" onclick="click_time('{{ $k }}')">
                                             <label class="star star-{{ $k }}" for="time-review-{{ $k }}"></label>
                                             @endfor
                                             <input type="hidden" id="click-star-time-id" value="0" name="">
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="review-bx">
                                    <form>
                                       <div class="form-group">
                                          <h4>Summary</h4>
                                          <input type="text" required="" name="" value="" class="form-control" id="summary-id">
                                       </div>
                                       <div class="form-group">
                                          <h4>Review</h4>
                                          <textarea class="form-control" required="" id="review-id"></textarea>
                                       </div>
                                       <input type="hidden" name="" id="pname">
                                       <input type="hidden" name="" id="pid">
                                       <input type="hidden" name="" id="lid">
                                       <input type="hidden" name="" id="cid">
                                       <div class="form-group">
                                          <input type="button" onclick="complete_function_click()" name="" value="Submit" class="flt-search">
                                       </div>
                                    </form>
                                 </div>
                              </div>
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
@endsection
@section('pagewishjs')
	<!-- loading page javascript -->
	<script>
      function click_star(data)
      {
         $("#click-star-service-id").val(data);
      }

      function click_value(data){
         $("#click-star-value-id").val(data);
      }

      function click_time(data){
         $("#click-star-time-id").val(data);
      }

      function open_modal_completeProj(pname, pid, cid, lid)
      {
         $("#review-modal").modal('show');
         $("#pname").val(pname);
         $("#pid").val(pid);
         $("#cid").val(cid);
         $("#lid").val(lid);
      }

      function complete_function_click()
      {
         var service_star = $("#click-star-service-id").val();
         var value_star = $("#click-star-value-id").val();
         var time_star = $("#click-star-time-id").val();

         var summary = $("#summary-id").val();
         var review = $("#review-id").val();

         var pname = $("#pname").val();
         var pid = $("#pid").val();
         var cid = $("#cid").val();
         var lid = $("#lid").val();

         $.ajax({
            url: "/give-client-review-ajax-submit",
            type: "GET",
            data: {service_star:service_star, value_star:value_star, time_star:time_star, summary: summary, review:review, pname:pname, pid:pid, cid:cid, lid:lid},
            dataType: "json",
            success: function(event){
               $("#review-modal").modal('hide');
               $("#success-modal").modal('show');
               $("#success-modal .modal-body").html('<div class="center-part"><h3><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Successfully Completed</span> </h3><p>Thank you for sharing your feedback</p></div>');
               setTimeout(function(){ $("#success-modal").modal('hide'); page_load_of_project_status(); }, 3000);
            }, error: function(event){

            }
         })
      }
		$(function(){
			page_load_of_project_status();
		});
	</script>
	<!-- /loading page javascript -->
	<script>
		function page_load_of_project_status()
		{
			$.ajax({
				url: "/page-load-proj-status",
				type: "GET",
				dataType: "json",
				success:  function(event){
					if(event.msg == 'msg'){
						$("#project-status-id").html(event.html);
					}else if(event.msg == 'no_msg'){
						$("#project-status-id").html(event.html);
					}
					
				}, error:  function(event){

				}
			})
		}
	</script>
@endsection