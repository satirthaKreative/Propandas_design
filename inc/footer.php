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
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-phone" aria-hidden="true"></i></span>
                     +1 6502509458
                  </p>
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                     d.schwarzl@lumsden.at
                  </p>
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <h3>Useful Links</h3>
            <div class="ft-content ft-cont">
               <ul>
                  <li><a href="#">How it Works</a></li>
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
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Customers</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Terms of Service</a></li>
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
         <p>© 2020 <a href="#">propandas.com</a> &nbsp;|&nbsp; All Rights Reserved.</p>
      </div>
   </div>
</footer>
<!-- end footer-section -->
<!-- Back to top button -->
<a  href="#go-top" class="back-top clearHeader" ><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.multiselect.js"></script>

<script src="js/custom.js"></script>

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
</script>

</body>
</html>