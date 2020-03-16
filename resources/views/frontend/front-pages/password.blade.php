@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>Set Password</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
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
            <h1>Set Your Password</h1>
            <form method="post">
               <div class="form-group">
                  <input type="password" name="user" class="form-control" placeholder="Type Password" value="" required="" />
               </div>
               <div class="form-group">
                   <input type="password" name="user" class="form-control" placeholder="Confirm Password" value="" required="" />
               </div>               
               <div class="form-group">
                  <input type="submit" name="LGform2" class="sign in" value="Set Password" />                 
               </div>
            </form>
            
           
         </div>
         <!-- end of col-sm-6 -->
         
     
      </div>
   </div>
</section>
<!-- end of theme-content -->
@endsection