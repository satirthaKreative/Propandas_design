<?php include ("inc/header.php") ?>
<section class="inner-banner">
   <div class="container">
      <h1>Contact Us</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
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
               <form>
                  <div class="row">
                     <div class="col-lg-6 plr-5">             
                        <input type="text" name="" value="" class="form-control" placeholder="Name">
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="email" name="" value="" class="form-control" placeholder="Email">
                     </div>
                     <div class="col-lg-6 plr-5">
                        <select name="type" id="type" class="form-control" aria-hidden="true">
                           <option selected="selected" value="mine">Regarding</option>
                           <option value="">Option 1</option>
                           <option value="">Option 2</option>
                           <option value="">Option 3</option>
                        </select>
                     </div>
                     <div class="col-lg-6 plr-5">             
                        <input type="text" name="" value="" class="form-control" placeholder="Subject">
                     </div>
                     <div class="col-lg-12 plr-5">
                        <textarea name="comment" rows="2" class="form-control" placeholder="Your Message "></textarea>
                     </div>
                     <div class="col-lg-12 plr-5">
                        <input type="submit" value="submit">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
   var a = 0;
   $(window).scroll(function() {
   var oTop = $('#counter').offset().top - window.innerHeight;
   if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },
   
        {
   
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }
   
        });
    });
    a = 1;
   }
   
   });
</script>
<?php include ("inc/footer.php") ?>