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
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="User Name Or Email" required="" />
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
            <form method="post" action="{{ route('login') }}">
               <div class="form-group">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="User Email" value="" required="" />
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
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
