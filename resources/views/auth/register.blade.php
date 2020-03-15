@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>SIGN UP</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Register</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="login-content">
   <div class="container">
      <div class="row">
         <div class="col-sm-4 side-register">
            <div class="rg-inner">
               <img src="{{ asset('frontAssets/images/rg-logo.png') }}" alt="logo-white" class="wh-logo"> 
               <h2><span>Lets Get</span> Started</h2>
               <p>Sed ut perspi ciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab  rem aperiam,</p>
               <h4><strong>Sign Up Here <i class="fa fa-long-arrow-right" aria-hidden="true"></i></strong></h4>
            </div>
         </div>
         <div class="col-sm-8 login-box cst-login">
            <h1>SIGN UP AS A Client</h1>
            <form method="post" action="{{ route('register') }}">
                @csrf
               <div class="row">
                  <div class="col-sm-2 plr-5">
                     <div class="form-group">
                        <select class="form-control" id="">
                           <option>Degree</option>
                           <option value="">Degree 1</option>
                           <option value="">Degree 2</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-5 plr-5">
                     <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="First Name" />
                     </div>
                  </div>
                  <div class="col-sm-5 plr-5">
                     <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('name') }}" required placeholder="Last Name"  />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email"  />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Phone Number " value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <textarea name="" id="" class="form-control" placeholder="Address (Line 1)"  ></textarea>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <textarea name="" id="" class="form-control" placeholder="Address (Line 2)"  ></textarea>
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="City" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Zip Code" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <select class="form-control" id="">
                           <option>Country</option>
                           <option value="">Australia</option>
                           <option value="">Austria</option>
                           <option value="">Barbados</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <select class="form-control" id="">
                           <option>Time Zone</option>
                           <option value="">Time Zone 1</option>
                           <option value="">Time Zone 2</option>
                           <option value="">Time Zone 3</option>
                        </select>
                        <p class="text-left"><small>Pick based on IP address</small></p>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <div class="checkbox">
                           <label><input type="checkbox" name="remember"> By clicking on “Sign Up Now”, I agree to and understand the ProPandas <a href="#">Terms of Use</a>  & <a href="#">Privacy Policy</a> .</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <input type="submit" name="LGform2" class="sign in" value="Sign up" />
                     </div>
                  </div>
               </div>
            </form>
            <div class="others-login-part">
               <div class="or-space">
                  <span>Or</span>
               </div>
            </div>
            <p>Already have an account?  <a href="{{ route('login') }}">Sign In Now</a></p>
         </div>
         <!-- end of col-sm-8 -->
      </div>
   </div>
</section>
<!-- end of theme-content -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Choose User Tpe') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="is_laywer"  value="1"> I'm a laywer
                                <input type="radio" name="is_laywer" value="0"> I'm a customer
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
