@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>Email Verification</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Login</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="login-content">
   <div class="container">
      <div class="row">
         <div class=" offset-3 col-sm-6 login-box cst-login">
            <h1>Email Verification Required</h1>
            <div class="pending-content">
               <p class="text-center"><img src="images/flying_paperplane.png" alt="images" class="srt-img"></p>
               <p>Thank you for your interest to us! In order to continue, you'll need to verify your email address.</p>
               <p>
                  We've sent you a message from <a href="#">info@support.com</a> to the email address you provided. To activate your account please check your email, find our message from us and follow the instructions therein.
               </p>
               <p>If you did not receive the email, check your spam, or <a href="javascript:void(0)"></a>click here to resend. If you have any questions or issues, please <a href="javascript:void(0)">contact us</a>.</p>
               <p>
                  Thank you,<br>The propandas Team
               </p>
            </div>
            
           
         </div>
         <!-- end of col-sm-6 -->
         
     
      </div>
   </div>
</section>
<!-- end of theme-content -->
@endsection