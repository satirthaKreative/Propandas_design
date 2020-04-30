@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>Login</h1>
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
         <div class="col-sm-6 login-box cst-login">
            <h1>Customer LOGIN</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
               <div class="form-group">
                <input type="hidden" name="is_lawyer" value="0">
                  <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" placeholder="User Name Or Email" required="" />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
               </div>
               <div class="form-group">
                  <input type="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="" name="password" required=""/>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
               </div>
               <div class="form-group">
                  <div class="checkbox">
                     <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                  </div>
               </div>
               <div class="form-group">
                <!-- <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button> -->
                  <input type="submit" name="LGform2" class="sign in" value="Sign In" />
                  <a href="javascript: ;" onclick="myChangePassLogin(0)" class="Forget-Pwd" value="">Forgot your password?</a>
               </div>
            </form>
            <div class="others-login-part">
               <div class="or-space">
                  <span>Or</span>
               </div>
            </div>
            <div class="google-login">
               <a href="#"><span><img src="{{ asset('frontAssets/images/g-logo.png') }}" alt="icon"></span>Sign in with google </a>
            </div>
            <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up Now</a></p>
         </div>
         <!-- end of col-sm-6 -->
         <div class="col-sm-6 login-box lwr-login">
            <h1>lawyer login</h1>
            <form method="post" action="{{ route('login') }}">
              @csrf
               <div class="form-group">
                <input type="hidden" name="is_lawyer" value="1">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="User Email" required="" />
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
               </div>
               <div class="form-group">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="" required=""/>
               </div>
               <div class="form-group">
                  <div class="checkbox">
                     <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                  </div>
               </div>
               <div class="form-group">
                  <input type="submit" name="LGform2" class="sign in" value="Sign In" />
                  <a href="javascript: ;" class="Forget-Pwd" onclick="myChangePassLogin(1)" value="">Forgot your password?</a>
               </div>
            </form>
            <div class="others-login-part">
               <div class="or-space">
                  <span>Or</span>
               </div>
            </div>
            <div class="google-login">
               <a href="#"><span><img src="{{ asset('frontAssets/images/g-logo.png') }}" alt="icon"></span>Sign in with google </a>
            </div>
            <p>Don't have an account yet? <a href="{{ route('lawyer-registration') }}">Sign up Now</a></p>
         </div>
         <!-- end of col-sm-6 -->
      </div>
   </div>
</section>
<!-- end of theme-content -->
<!-- client forgot Modal -->
   <div class="modal fade theme-modal" id="forgot-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-lock fa-3x" aria-hidden="true"></i></span>Forgot Password?</h3>
                  <p>You can reset your Password here </p>
                  <form>
                     <input type="text" name="" id="email-address-forgot-password" placeholder="email address">
                     <span class="invalid-feedback" id="email-forgot-pass-error" style="display: none;" role="alert">
                         <strong></strong>
                     </span>
                     <input type="button" onclick="myForgotPassRecovery(0)" id="email-address-forgot-password-btn" value="Send My Password" class="cnt-btn">
                  </form>
                  <hr>
                  <p>Remember Password? <a href="{{ url('/login') }}">Login Here</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
<!-- end forgot modal -->
<!-- sent Modal -->
   <div class="modal fade theme-modal" id="sent-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><i class="fa fa-lock fa-3x" aria-hidden="true"></i>Your Password </h3>
                  <h6>Successfully send to your email address </h6>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
<!-- /sent modal --> 

<script>
  function myForgotPassRecovery(data){
    // forgot login pass submit btn


      var email_value_forgot = $("#email-address-forgot-password").val();
      var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        if(email_value_forgot == '' || email_value_forgot == null){
          $("#email-address-forgot-password").css({'border':'1px solid red', 'line-height': '4em',
    'box-shadow': '0px 0px 10px red'});
          $("#email-forgot-pass-error").html("<strong><i class='fa fa-times'></i> Please enter your email</strong>").fadeIn().delay(3000).fadeOut('slow');
        }else if(re.test(email_value_forgot) == false ){
          $("#email-address-forgot-password").css({'border':'1px solid red', 'line-height': '4em',
    'box-shadow': '0px 0px 10px red'});
          $("#email-forgot-pass-error").html("<strong><i class='fa fa-times'></i> Please enter your valid email address</strong>").fadeIn().delay(3000).fadeOut('slow');
        }else{
          $("#email-address-forgot-password").css({'border':'1px solid green', 'line-height': '4em',
    'box-shadow': '0px 0px 10px green'});
          $.ajax({
              url: '/myEmailForgotPasswordRecovery',
              type: 'GET',
              data: {email_value: email_value_forgot,data_val: data},
              dataType: 'json',
              beforeSend: function() {
                // setting a timeout
                $("#email-forgot-pass-error").html("<strong style='color:green'><i class='fa fa-spinner'></i> Checking your email address...</strong>").fadeIn().delay(3000).fadeOut('slow');
              },
              success: function(response){
                if(response == 0){
                    setTimeout(function(){ 
                      if(data == 0){
                        $("#email-forgot-pass-error").html("<strong><i class='fa fa-times'></i> Your email address is not registered as a client</strong>").fadeIn().delay(3000).fadeOut('slow');
                        $("#email-address-forgot-password").css({'border':'1px solid red', 'line-height': '4em','box-shadow': '0px 0px 10px red'});
                      }else if(data == 1){
                        $("#email-forgot-pass-error").html("<strong><i class='fa fa-times'></i> Your email address is not registered as a lawyer</strong>").fadeIn().delay(3000).fadeOut('slow');
                        $("#email-address-forgot-password").css({'border':'1px solid red', 'line-height': '4em','box-shadow': '0px 0px 10px red'});
                      }
                    },3000);
                }else if(response == 1){
                    setTimeout(function(){ 
                        $("#email-forgot-pass-error").html("<strong style='color: green;'><i class='fa fa-check'></i> Password successfully send to your email address</strong>").fadeIn().delay(3000).fadeOut('slow');
                        $("#email-address-forgot-password").css({'border':'1px solid green', 'line-height': '4em','box-shadow': '0px 0px 10px green'});
                    }, 3000);
                    setTimeout(function(){ $('#forgot-modal').modal('hide'); }, 5000);
                    // set time hide
                    setTimeout(function(){ $('#sent-modal').modal('show'); }, 6000);
                    // set time hide
                    setTimeout(function(){ $("#sent-modal").modal('hide');  location.reload(); },9000);
                }
              }, error: function(response){
                setTimeout(function(){  $("#email-forgot-pass-error").html("<strong><i class='fa fa-times'></i> Server error occuring! Try again later</strong>").fadeIn().delay(3000).fadeOut('slow'); $("#email-address-forgot-password").removeAttr('style'); }, 3000);
              }
          })
          

        }

    // end forgt login password submit check
  }

  function myChangePassLogin(data_v){
    $("#forgot-modal").modal('show');
    $("#email-address-forgot-password-btn").attr('onclick','myForgotPassRecovery('+data_v+')');
  }
</script> 
@endsection