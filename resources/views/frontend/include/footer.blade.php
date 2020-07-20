<footer class="footer-section">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <h3>OFFICE Address</h3>
            <div class="ft-content">
               <div class="ft_addr">
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     Wiedner Hauptstrasse 120
                  </p>
                  <!-- <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-phone" aria-hidden="true"></i></span>
                     +1 6502509458
                  </p> -->
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                     Office@propandas.com
                  </p>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <h3>Useful Links</h3>
            <div class="ft-content ft-cont">
               <ul>
                  <li><a href="{{ url('/how-it-works') }}">How it Works</a></li>
                  <li><a href="#">For Lawyers</a></li>
                  <li><a href="#">Free Legal Documents</a></li>
                  <li><a href="#">Blog </a></li>
                  <li><a href="#">Sitemap</a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <h3>ABOUT</h3>
            <div class="ft-content ft-cont">
               <ul>
                  <li><a href="#">The Company</a></li>
                  <li><a href="{{ url('/career') }}">Careers</a></li>
                  <li><a href="#">Customers</a></li>
                  <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                  <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-3">
            <h3>Follow Us</h3>
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
   <div class="copy-part text-center">
      <div class="container">
         <p>© 2020 <a href="{{ url('/') }}">propandas.com</a> &nbsp;|&nbsp; All Rights Reserved.</p>
      </div>
   </div>

   <!-- success Modal -->
   <div class="modal fade theme-modal" id="success-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> <span>Number confirmed</span> </h3>
                  <p>Your Number has been verified</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Error Modal -->
   <div class="modal fade theme-modal" id="Error-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> <span>Sorry Wrong Update</span> </h3>
                  <p>Sorry You are entered wrong OTP </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /end modal -->
   <!-- job data Modal -->
   <div class="modal fade theme-modal" id="jobPostClientSuccessModal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Thank You </h3>
                  <h6>We send Your Queries To The Lawyers </h6>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- coming-soon Modal -->
      <div class="modal fade theme-modal" id="coming-modal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal body -->
               <div class="modal-body text-center">
                  <div class="center-part">
                     <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Coming Soon</h3>   
                      <h6>We are coming to you very soon </h6>                               
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- /end comming soon model -->
</footer>
<!-- end footer-section -->
<!-- Back to top button -->
<a  href="#go-top" class="back-top clearHeader" ><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- google language api -->
<!-- <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <script type="text/javascript">
            function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay: false, includedLanguages: ''}, 'google_translate_element');}
            </script> -->
<!-- /google language api -->

<script src="{{ asset('frontAssets/js/popper.min.js') }}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- <script src="{{ asset('frontAssets/js/bootstrap.min.js') }}"></script> -->
<script src="{{ asset('frontAssets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.multiselect.js') }}"></script>
<!-- country js -->
<script src="{{ asset('frontAssets/js/country.js') }}"></script>
<!-- front-home js -->
<script src="{{ asset('frontAssets/js/home.js') }}"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="{{ asset('frontAssets/js/mySelect2.js') }}"></script>
<!-- <script src="js/custom.js"></script> -->

<!-- New Addition -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
<!-- /end new addition -->
@guest

@else
  @if(Auth::user()->is_lawyer == 0)
  <script>
    $(function(){
      count_system_msg();
      unread_notify_count();
      unread_system_msg_count();
      setInterval(function(){ 
         unread_notify_count();
         unread_system_msg_count();
      },1000);
   })

    // notification show

    // count unread notify

    function unread_notify_count(){
      $.ajax({
         url: '/unread-notify-count',
         type: 'GET',
         dataType: 'json',
         success: function(event_res){
            if(event_res > 0){
               if(event_res < 10){
                  $(".unread-notify-count-class").html("( 0"+event_res+" )");
               }else if(event_res > 10){
                  $(".unread-notify-count-class").html("( "+event_res+" )");
               }
               
            }
         }
      })
   }

   function unread_system_msg_count(){
      $.ajax({
         url: '/unread-system-msg-count',
         type: 'GET',
         dataType: 'json',
         success: function(event_res){
            if(event_res > 0){
               if(event_res < 10){
                  $(".unread-system-msg-count-class").html("( 0"+event_res+" )");
               }else if(event_res > 10){
                  $(".unread-system-msg-count-class").html("( "+event_res+" )");
               }
               
            }
         }
      })
   }


   // count session
   function count_system_msg()
   {
      $.ajax({
         url: '/count-system-msg-session',
         type: 'GET',
         dataType: 'json',
         success: function(event_res){
            console.log(event_res);
         }, error: function(event_res){

         }
      })
   }

    // end  notify
  </script>
  @else
  <script>
     $(function(){
       lawyer_profile_speacialization_function();
       count_system_msg();
       unread_system_msg_count();
       setInterval(function(){ 
          unread_system_msg_count();
          notifying_lawyer_count();
       },1000);
    })
     // my specialization profile
     function lawyer_profile_speacialization_function()
     {
        $.ajax({
          url: '/category-lawyer-speacialization-ajax',
          type: 'GET',
          dataType: 'json',
          success: function(event){
            $(".lawyer-specialization-class-id").html(event);
            $(".lawyer-specialization-class-id").multiselect({ placeholder: 'Select Specialization'});
          }, error: function(event){

          }
        })
     }
     // count session
     function count_system_msg()
     {
        $.ajax({
           url: '/count-system-msg-session',
           type: 'GET',
           dataType: 'json',
           success: function(event_res){
              console.log(event_res);
           }, error: function(event_res){

           }
        })
     }

     // count lawyer notify
     function notifying_lawyer_count()
     {
        $.ajax({
           url: '/lawyer-notification-count-ajax',
           type: 'GET',
           dataType: 'json',
           success: function(event_res){
              if(event_res != 0)
              {
                if(event_res > 0 && event_res < 10){
                  var actual_count = '0'+event_res;
                }else{
                  var actual_count = event_res;
                }
                $(".lawyer-notify-class").html('('+actual_count+')');
              }
              else
              {

              }
           }, error: function(event_res){

           }
        })
     }

     function unread_system_msg_count(){
      $.ajax({
         url: '/unread-system-msg-count',
         type: 'GET',
         dataType: 'json',
         success: function(event_res){
            if(event_res > 0){
               if(event_res < 10){
                  $(".unread-system-msg-count-class").html("( 0"+event_res+" )");
               }else if(event_res > 10){
                  $(".unread-system-msg-count-class").html("( "+event_res+" )");
               }
               
            }
         }
      })
    }
  </script>
  @endif
@endguest
@if($msg_data = Session::get('jobPostDataSent'))
<script>
  $(function(){
    $("#job-cate-post-data-modal").modal('show');
    setTimeout(function(){ $("#job-cate-post-data-modal").modal('hide');  }, 5000);
  })
</script>
@php session()->forget('jobPostDataSent') @endphp
@endif
@if($message = Session::get('welcomeSession'))
<script>
  $(function(){
    $("#welcome-modal").modal('show');
    setTimeout(function(){ $("#welcome-modal").modal('hide');  }, 5000);
  })
</script>
@endif
<script> 
   $('.review-slide').owlCarousel({
   loop:true,
   autoplay:true,
   margin:0,
   responsiveClass:true,
   responsive:{
     0:{
         items:1,
         nav:true
     },
     600:{
         items:1,
         nav:true
     },
     1000:{
         items:1,
         nav:true,
         loop:true
     }
   }
   })

   function owlCarousalCreate()
   {
      $('.review-slide').owlCarousel({
      loop:true,
      autoplay:true,
      margin:0,
      responsiveClass:true,
      responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
      }
      });
   }


   $('.team-slide').owlCarousel({
   loop:true,
   autoplay:true,
   margin:10,
   responsiveClass:true,
   responsive:{
     0:{
         items:1,
         nav:true,
        
     },
     600:{
         items:2,
         nav:true,
         
     },
     1000:{
         items:3,
         nav:true,
        
     }
   }
   })

   function owlteamCarousal()
   {
    $('.team-slide').owlCarousel({
    loop:true,
    autoplay:true,
    margin:10,
    responsiveClass:true,
    responsive:{
      0:{
          items:1,
          nav:true,
         
      },
      600:{
          items:2,
          nav:true,
          
      },
      1000:{
          items:3,
          nav:true,
         
      }
    }
    })
   }
</script>



<script> 
   $('.brand-slider').owlCarousel({
   loop:true,
   autoplay:true,
   margin:10,
   responsiveClass:true,
   responsive:{
     0:{
         items:2,
         nav:true,
         loop:true
     },
     600:{
         items:3,
         nav:true,
         loop:true
     },
     1000:{
         items:6,
         nav:true,
         loop:true
     }
   }
   })
</script>
<script>
   $('.price-slide').owlCarousel({
   loop:true,
   autoplay:true,
   smartSpeed:1000,
   margin:10,
   center:true,
   autoplayTimeout:3000,
   autoplayHoverPause:true,
   responsiveClass:true,
   responsive:{
     0:{
         items:1,
         nav:true
     },
     600:{
         items:2,
         nav:true
     },
     1000:{
         items:3,
         nav:true,
         loop:true
     }
   }
   })
</script>
<script type="text/javascript">
   var stickyOffset = $('.header-menu').offset().top;
   
   $(window).scroll(function(){
   var sticky = $('.header-menu'),
       scroll = $(window).scrollTop();
     
   if (scroll >= stickyOffset) sticky.addClass('stickyHeader');
   else sticky.removeClass('stickyHeader');
   });
</script> 
<!-- scroll to top -->

<!-- HAMBURGER -->
<script>
   $('.hamburger').on('click', function(e) {
     $(this).toggleClass('open');
     $('body').toggleClass('overflow');
     $('.side-navigation').toggleClass('active');
     $('.menu_side').toggleClass('show_menu');
   });
   
   $('.close-icon').on('click', function(e) {
      $('.hamburger').removeClass('open');
       $('.menu_side').removeClass('show_menu');
     });
</script>

<script>
  
function wishCategoryCheck()
{
  //jQuery time
  var current_fs, next_fs, previous_fs; //fieldsets
  var left, opacity, scale; //fieldset properties which we will animate
  var animating; //flag to prevent quick multi-click glitches

  $(".next").click(function(){
    if(animating) return true;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale current_fs down to 80%
        scale = 1 - (1 - now) * 0.2;
        //2. bring next_fs from the right(50%)
        left = (now * 50)+"%";
        //3. increase opacity of next_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({
          'transform': 'scale('+scale+')',
          'position': 'absolute'
        });
        next_fs.css({'left': left, 'opacity': opacity});
      }, 
      duration: 0, 
      complete: function(){
        current_fs.hide();
        animating = false;
      }, 
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    });
  });

  $(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {
        //as the opacity of current_fs reduces to 0 - stored in "now"
        //1. scale previous_fs from 80% to 100%
        scale = 0.8 + (1 - now) * 0.2;
        //2. take current_fs to the right(50%) - from 0%
        left = ((1-now) * 50)+"%";
        //3. increase opacity of previous_fs to 1 as it moves in
        opacity = 1 - now;
        current_fs.css({'left': left});
        previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
      }, 
      duration: 0, 
      complete: function(){
        current_fs.hide();
        animating = false;
      }, 
      //this comes from the custom easing plugin
      easing: 'easeInOutBack'
    });
  });

  $(".submit").click(function(){
    return false;
  })
}
</script>


<script>
 
</script>




<script>
     $(document).ready(function() {
        $(".not-located-us") .hide();

        $(".ys-locate").click(function(){
          $(".not-located-us").show();
          $(".located-us").hide();
        });

        $(".not-locate").click(function(){
          $(".located-us").show();
          $(".not-located-us").hide();
        });

         $(".legal-box").click(function(){
          $(this).toggleClass("active");
        });

         $('#multy-select').multiselect({
            placeholder: 'Select',
            });

        $('#search-select').multiselect({   
            placeholder: 'Select',
            search: true
        });

        

        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });

        $(function() {
            //caches a jQuery object containing the header element
            var header = $(".clearHeader");
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if (scroll >= 200) {
                    header.removeClass('clearHeader').addClass("darkHeader");
                } else {
                    header.removeClass("darkHeader").addClass('clearHeader');
                }
            });
        });

         

   });



//  language select

$(function(){
    $('.selectpicker').selectpicker();
});

// client dashboard
jQuery(document).ready(function() {
  showAboutData();
   change_country_wishDashboard();

});


</script>
<script type="text/javascript">
  function showAboutData()
  {
    $.ajax({
        url: '/showAboutDetails',
        type: 'GET',
        dataType: 'json',
        success: function(event){
            $(".about-part .abt-shape").html('<img src="'+event[0].about_image+'" alt="about-image" class="img-fluid">');
            $(".my-about-title").html('');
        $( ".my-about" ).html('<div class="top-title my-about-title"><h1><small>ABOUT US</small>'+event[0].about_title+'<span></span></h1></div>'+event[0].about_description);
        }, error: function(event){

        }
    })
  }

  function coming_soon_modal()
  {
    $("#coming-modal").modal('show');
    setTimeout(function(){ $("#coming-modal").modal('hide'); }, 3000);
  }
  </script>