@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>Terms of Use</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Terms of Use</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="theme-inner">
   <div class="container">
      <div class="cmp-content">
         <span class="text-info"><i class="fa fa-spinner"></i> Loading details .....</span>
      </div>
   </div>
</section>
@endsection
@section('pagewishjs')
<script>
  $(function(){
    $.ajax({
      url: "/frontTermsPage",
      type: "GET",
      dataType: "json",
      success: function(event){
        $(".cmp-content").html(event[0].terms);
      }, error: function(event){

      }
    })
  })
</script>
@endsection