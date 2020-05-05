<?php include ("inc/header.php") ?>
<section class="inner-banner">
   <div class="container">
      <h1>legal Info</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Legal-info</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="theme-inner">
   <div class="container">
      <div class="cmp-content">
         <h6>Nemo enim ipsam voluptatem</h6>
         <hr>
         <div class="row">
            <div class="col-sm-6">
               <div class="ft_addr">
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     <span class="ft-info">
                     RF Marketing und Betriebs GmbH 
                     <br>
                     Franzensgasse 11/1,
                     <br>
                     1050 Wien
                     <br>
                     Österreich
                     </span>
                  </p>
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                     hallo@rechtsfux.at
                  </p>
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-phone" aria-hidden="true"></i></span>
                     +43 1 934 6975
                  </p>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="ft_addr">
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     <span class="ft-info">
                     Unternehmensgegenstand
                     <br>
                     digitale Vermittlung von Rechtsdienstleistungen und Beratung bei der Digitalisier ung des Rechtsdienstleistungsmarktes
                     <br>
                     Firmenbuchnummer: 509939k
                     <br>
                     Firmenbuchgericht: Wien
                     <br>
                     Firmensitz: 1050 Wien
                     </span>
                  </p>
               </div>
            </div>
         </div>
         <h6>At vero eos et accusamus et iusto</h6>
         <p>Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
         <br>
         <h6>Copyright.</h6>
         <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</p>
         <ul>
            <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</li>
            <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</li>
            <li><i class="fa fa-check-square-o" aria-hidden="true"></i>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</li>
         </ul>
         <h6>Externe Links</h6>
         <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
         <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
      </div>
   </div>
</section>
<!-- end of theme-inner -->
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