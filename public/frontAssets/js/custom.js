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
