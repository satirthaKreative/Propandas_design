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
            <form method="post">
               <div class="form-group">
                  <input type="text" name="user" class="form-control" placeholder="User Name Or Email" value="" required="" />
               </div>
               <div class="form-group">
                  <input type="password" name="LGform2_pwd" class="form-control" placeholder="Password" value="" required=""/>
               </div>
               <div class="form-group">
                  <div class="checkbox">
                     <label><input type="checkbox" name="remember"> Remember me</label>
                  </div>
               </div>
               <div class="form-group">
                  <input type="submit" name="LGform2" class="sign in" value="Sign In" />
                  <a href="#" class="Forget-Pwd" value="">Forgot your password?</a>
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
            <form method="post">
               <div class="form-group">
                  <input type="text" name="user" class="form-control" placeholder="User Name Or Email" value="" required="" />
               </div>
               <div class="form-group">
                  <input type="password" name="LGform2_pwd" class="form-control" placeholder="Password" value="" required=""/>
               </div>
               <div class="form-group">
                  <div class="checkbox">
                     <label><input type="checkbox" name="remember"> Remember me</label>
                  </div>
               </div>
               <div class="form-group">
                  <input type="submit" name="LGform2" class="sign in" value="Sign In" />
                  <a href="#" class="Forget-Pwd" value="">Forgot your password?</a>
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
      </div>
   </div>
</section>
<!-- end of theme-content -->
@endsection