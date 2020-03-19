@extends('layouts.frontendLayouts.app')
@section('content')
<?php 
   $link = $_SERVER['PHP_SELF'];
   $link_array = explode('/',$link);
   $page = end($link_array);
   $my_id = base64_decode($page);
?>
<section class="inner-banner">
   <div class="container">
      <h1>Set Password</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="javascript: ;">Home</a></li>
            <li>Password Recovery</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="login-content">
   <div class="container">
      <div class="row">
         <div class=" offset-3 col-sm-6 login-box cst-login">
            <h1>Set Your Password </h1>
            @php $myData = 1 @endphp
            <form method="post" action="{{ route('password.update',$my_id) }}">
               @csrf
               @method('PUT')
               <input type="hidden" name="main_mail" value="{{ Session::get('mysession') }}">
               <div class="form-group">
                  <input type="password" name="pass" class="form-control" placeholder="Type Password" value="" required="" />
               </div>
               <div class="form-group">
                   <input type="password" name="cpass" class="form-control" placeholder="Confirm Password" value="" required="" />
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