@extends('layouts.frontendLayouts.app')
@section('content')


<section class="inner-banner">
   <div class="container">
      <h1>Careers</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Career</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->

<section class="basic-content theme-inner">
   <div class="container">
      <div class="top-title">
         <h1>Careers<span></span></h1> 
         <p>Are you ready to disrupt a highly protected and traditional industry? Join the legal tech movement.</p>       
      </div>

      <div class="col-md-8 offset-2 text-center career-form">
      	<p>Send us your elevator pitch and become part of Propandas!</p>      
               <form id="career-form">
                  <div class="row">
                     <div class="col-lg-6 plr-5">             
                        <input type="text" name="fname"  id="fname" value="" class="form-control" placeholder="First Name">
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="text" name="lname"  id="lname" value="" class="form-control" placeholder="Last Name">
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="email" name="c_email"  id="c-email" value="" class="form-control" placeholder="Email">
                     </div>                   
                     <div class="col-lg-6 plr-5">             
                        <input type="text" name="c_phone"  id="c-phone" value="" class="form-control" placeholder="Phone Number">
                     </div>
                     <div class="col-lg-12 plr-5">
                        <textarea name="comment" id = "comment"  rows="2" class="form-control" placeholder="Your Message "></textarea>
                     </div>
                     <div class="col-lg-12 plr-5">
                        <input type="submit" value="submit" id="career-submit-btn">
                     </div>
                  </div>
               </form>
            
      </div>

      
   </div>
</section>  <!-- end of basic-content -->


@endsection
@section('pagewishjs')

	@guest

	@else
		<script type="text/javascript">
			$(function(){
				onload_page_career();
			})

			function onload_page_career()
			{
				$("#fname").val('<?= Auth::user()->name; ?>');
				$("#lname").val('<?= Auth::user()->lname; ?>');
				$("#c-email").val('<?= Auth::user()->email; ?>');
				$("#c-phone").val('<?= Auth::user()->phn_num; ?>');
			}
		</script>
	@endguest

	<script type="text/javascript">
		$("#career-submit-btn").on('click',function(e){
			e.preventDefault();


			if($("#fname").val() == ""){
				$("#fname").css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
			}else if($("#lname").val() == ""){
				$("#lname").css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
				$("#fname").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
			}else if($("#c-email").val() == ""){
				$("#c-email").css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
				$("#lname").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
			}else if($("#c-phone").val() == ""){
				$("#c-phone").css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
				$("#c-email").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
			}else if($("#comment").val() == ""){
				$("#comment").css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
				$("#c-phone").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
			}else{
				$("#fname").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
				$("#lname").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
				$("#c-email").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
				$("#c-phone").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});
				$("#comment").css({'border':'1px solid green', 'box-shadow': '0px 0px 10px -1px green'});

				$.ajax({
					url: "/career-ajax",
					type: "GET",
					data: $("#career-form").serialize(),
					dataType: "json",
					success: function(event){
						if(event.msg == "success"){
							$("#success-modal").modal('show');
							$("#success-modal h3").html('<span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Your query successfully sent</span>');
							$("#success-modal p").html('We got your query. We will get back to you soon.');
							$("#fname").val("");
							$("#lname").val("");
							$("#c-email").val("");
							$("#c-phone").val("");
							$("#comment").val("");

							$("#fname").css({'border':'1px solid #d2d2d2', 'box-shadow': '0px 0px 10px -1px #d2d2d2'});
							$("#lname").css({'border':'1px solid #d2d2d2', 'box-shadow': '0px 0px 10px -1px #d2d2d2'});
							$("#c-email").css({'border':'1px solid #d2d2d2', 'box-shadow': '0px 0px 10px -1px #d2d2d2'});
							$("#c-phone").css({'border':'1px solid #d2d2d2', 'box-shadow': '0px 0px 10px -1px #d2d2d2'});
							$("#comment").css({'border':'1px solid #d2d2d2', 'box-shadow': '0px 0px 10px -1px #d2d2d2'});


							setTimeout(function(){ $("#success-modal").modal('hide');  }, 3000);
						}else if(event.msg == "error"){
							$("#Error-modal").modal('show');
							$("#Error-modal h3").html('<span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Sorry!! Something Wrong </span>');
							$("#Error-modal p").html('Your query does not send , Try again');
							
							setTimeout(function(){ $("#Error-modal").modal('hide');  }, 3000);
						}else{

						}
					}, error: function(event){

					}
				})
			}
		})
	</script>

@endsection