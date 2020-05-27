@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>legal Info</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Legal-info</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="theme-inner">
   <div class="container">
      <div class="cmp-content">
         <h6>Contact Us & Address</h6>
         <hr>
         <div class="row">
            <div class="col-sm-6">
               <div class="ft_addr">
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     <span class="ft-info" id="address1">
                        <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                     </span>
                  </p>
                  <p class="icon-text" id="email-legal">
                    <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </p>
                  <p class="icon-text" id="phone-legal">
                    <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                  </p>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="ft_addr">
                  <p class="icon-text">
                     <span class="icon-div"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                     <span class="ft-info" id="address2">
                        <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
                     </span>
                  </p>
               </div>
            </div>
         </div>
         <h6 id="heading-legal"></h6>
         <p id="details-legal"></p>
         <br>
         <h6>Copyright.</h6>
         <p  id="copy-legal">
           <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
         </p>
         
         <h6>Externe Links</h6>
         <p id="external-legal">
           <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
         </p>
      </div>
   </div>
</section>
@endsection
@section('pagewishjs')
<script>
  $(function(){
    $.ajax({
      url: "/frontLegalInfoFullDataShow",
      type: "GET",
      dataType: "json",
      success: function(event){
        $("#address1").html("<a href='"+event[0].google_link1+"' target='_blank'>"+event[0].address_one+"</a>");
        $("#email-legal").html('<span class="icon-div"><i class="fa fa-envelope" aria-hidden="true"></i></span> '+event[0].email_address);
        $("#phone-legal").html('<span class="icon-div"><i class="fa fa-phone" aria-hidden="true"></i></span>'+event[0].phone_number);
        $("#address2").html("<a href='"+event[0].google_link2+"' target='_blank'>"+event[0].address_two+"</a>");
        $("#heading-legal").html(event[0].legal_heading);
        $("#details-legal").html(event[0].heading_details);
        $("#copy-legal").html(event[0].copyright);
        $("#external-legal").html(event[0].external_links);
      }, error: function(event){

      }
    })
  })
</script>
@endsection