@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>Contact Us</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Contact Us</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="contact-info-part theme-inner">
   <div class="container">
      <div class="row">
         <div class="col-lg-7 ">
            <h1>Get In Touch</h1>
            <h6>If you are seeking legal assistance or wish to speak with a lawyer about a legal matter, please post a job. Otherwise, please complete the form below to get in touch.</h6>
            <div class="contact-form">
               <form id="form-contact-data">
                  <div class="row">
                     <div class="col-lg-6 plr-5">             
                        <input type="text" required="required" name="name" value="" class="form-control" placeholder="Name">
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="email"  required="required" name="email" value="" class="form-control" placeholder="Email">
                     </div>
                     <div class="col-lg-6 plr-5">
                        <select name="regarding"  required="required" id="type" class="form-control" aria-hidden="true">
                           <option selected="selected" value="">Regarding</option>
                           <option value="schwarzldaniel@hotmail.com">Customer Support</option>
                           <option value="schwarzldaniel@hotmail.com">General Inquiry</option>
                           <option value="schwarzldaniel@hotmail.com">Press</option>
                           <option value="schwarzldaniel@hotmail.com">Partnership Opportunities</option>
                           <option value="schwarzldaniel@hotmail.com">Sales</option>
                           <option value="schwarzldaniel@hotmail.com">Publications</option>
                           <option value="schwarzldaniel@hotmail.com">Content Contribution</option>
                           <option value="schwarzldaniel@hotmail.com">Other</option>
                        </select>
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="text" required="required" name="subject" value="" class="form-control" placeholder="Subject">
                     </div>
                     <div class="col-lg-12 plr-5">
                        <textarea name="your_msg" required="required" rows="2" class="form-control" placeholder="Your Message "></textarea>
                     </div>
                     <div class="col-lg-12 plr-5">
                        <input type="button" class="contact-btn" onclick="contactSendEmail()" value="submit"><span id="pre-loading"></span>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-5 ">
            <div class="cnt-info-box">
               <div class="ft-content">
                  <h3>OFFICE Address</h3>
                  <div class="ft_addr">
                     <p class="icon-text">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Wiedner Hauptstrasse 120
                     </p>
                     <p class="icon-text">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        Office@propandas.com
                     </p>
                  </div>
                  <div class="follow-part">
                     <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-xing" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of contact-info-part -->
@endsection
@section('pagewishjs')
<script>
  function contactSendEmail()
  {
    if($('input[name=name]').val() == ''){
      $('input[name=name]').css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
    }else if($('input[name=email]').val() == ''){
      $('input[name=email]').css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
      $('input[name=name]').css({'border':'none', 'box-shadow': 'none'});
    }else if($('input[name=regarding]').val() == ''){
      $('input[name=regarding]').css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
      $('input[name=email]').css({'border':'none', 'box-shadow': 'none'});
    }else if($('input[name=subject]').val() == ''){
      $('input[name=subject]').css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
      $('input[name=regarding]').css({'border':'none', 'box-shadow': 'none'});
    }else if($('input[name=your_msg]').val() == ''){
      $('input[name=your_msg]').css({'border':'1px solid red', 'box-shadow': '0px 0px 10px -1px red'});
      $('input[name=subject]').css({'border':'none', 'box-shadow': 'none'});
    }else{
      $.ajax({
        url: '/ContactQueryMailControllerSendMail',
        type: 'GET',
        data: $('#form-contact-data').serialize(),
        dataType: 'json',
        beforeSend: function() {
                $("#pre-loading").html('<i class="text-info"><i class="fa fa-spinner"></i> Your query sending to propandas team... </i>');
        },
        success: function(event){
          if(event == 1){
            $("#pre-loading").find("i").hide();
            $(".contact-form").load(location.href + " .contact-form");
            $("#success-modal").modal('show');
            $("#success-modal h3").html('<span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Mail Send</span>');
            $("#success-modal p").html('We got your query. We will get back to you soon.');
            setTimeout(function(){ $("#success-modal").modal('hide');  }, 3000);
          }else{
            $("#Error-modal").modal('show');
            $("#Error-modal h3").html('<span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Sorry!! Something Wrong </span>');
            $("#Error-modal p").html('Your query does not send , Try again');
            setTimeout(function(){ $("#Error-modal").modal('hide');  }, 3000);
          }
        }
      })
    }
    
  }



   // var a = 0;
   // $(window).scroll(function() {
   // var oTop = $('#counter').offset().top - window.innerHeight;
   // if (a == 0 && $(window).scrollTop() > oTop) {
   //  $('.counter-value').each(function() {
   //    var $this = $(this),
   //      countTo = $this.attr('data-count');
   //    $({
   //      countNum: $this.text()
   //    }).animate({
   //        countNum: countTo
   //      },
   
   //      {
   
   //        duration: 2000,
   //        easing: 'swing',
   //        step: function() {
   //          $this.text(Math.floor(this.countNum));
   //        },
   //        complete: function() {
   //          $this.text(this.countNum);
   //          //alert('finished');
   //        }
   
   //      });
   //  });
   //  a = 1;
   // }
   
   // });
</script>
@endsection