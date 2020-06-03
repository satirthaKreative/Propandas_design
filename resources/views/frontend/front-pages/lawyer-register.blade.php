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
            <h1>SIGN UP AS A Lawyer</h1>
            <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-sm-2 plr-5">
                     <div class="form-group">
                        <select class="form-control" required="" name="degree"  id="">
                           <option value="">Degree</option>
                           <option value="Dr.">Dr.</option>
                           <option value="Mag.">Mag.</option>
                           <option value="LL.M.">LL.M.</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-5 plr-5">
                     <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="First Name" value="" />
                     </div>
                  </div>
                  <div class="col-sm-5 plr-5">
                     <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('name') }}" required placeholder="Last Name" />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" id="email_client" onkeyup="email_client_check()" required="required" />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="text" name="phn_num" class="form-control" required="required" placeholder="Phone Number"/>
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <select name="lawyer_specialization[]" multiple="multiple"  class="form-control lawyer-specialization">                       
                          
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="text" name="law_firm" class="form-control" placeholder="Law firm" required="" />
                        <p class="text-left"><small>Please put your own name if not a law firm</small></p>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <textarea name="law_firm_address" id="" required="" class="form-control" placeholder="Law firm address"  ></textarea>
                        <p class="text-left"><small>Please put your residential address if you don’t have an office address</small></p>
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <input type="text" name="city"  class="form-control" placeholder="City" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <input type="text" name="zipcode" class="form-control" placeholder="Zip Code" value="" required=""  />
                     </div>
                  </div>
                  <div class="col-sm-4 plr-5">
                     <div class="form-group">
                        <select class="form-control county_list" required="" name="country" id="county_list">
                           <option>Country</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <div class="file-field">                                 
                           <span><i class="fa fa-upload" aria-hidden="true"></i>Upload Resume</span>
                           <input type="file" name="upload" required>    
                        </div>
                        <div class="captcha-place">
                        	<input type="hidden" name="is_lawyer" required class="is_lawyer_class" value="1">
                           <form action="?" method="POST">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LdmG-IUAAAAAHN-m47EwE4RVObxb_88bpcwoYdd"></div>  
                             
                           </form>
                        </div>
                     </div>
                  </div>


                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <div class="checkbox">
                           <label><input type="checkbox" checked="checked" name="remember">By clicking on “Sign Up Now”, I agree to and understand the ProPandas <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>.</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <input type="submit" name="LGform2" id="email_wish_sign_up" class="sign in captcha-submit-class" value="Sign up" disabled/>
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
<script>
  function email_client_check()
  {

    var mail_check = jQuery("#email_client").val();
    var lawyer_value = jQuery(".is_lawyer_class").val();
    $.ajax({
      url: '/checking_email_registration',
      type: 'GET',
      data: {mail_check: mail_check, lawyer_value: lawyer_value},
      dataType: 'json',
      success: function(event){
        if(event == 1){
          jQuery("#email_wish_sign_up").removeAttr('disabled', 'disabled');
          $("#email_client").removeAttr('style');
          $("#email_client").removeAttr('title');
        }else if(event == 0){
          jQuery("#email_wish_sign_up").attr('disabled', 'disabled');
          $("#email_client").css({"color":"#e40f0f", "border-bottom": "solid 1px #e40f0f"});
          $("#email_client").attr('title', 'Email Address Already Registered');
        }
      }, error: function(event){
        console.log("Error Details...");
      }
    })
  }
</script>
@endsection
@section('pagewishjs')
<script type="text/javascript">

  $(function(){
    $.ajax({
      url: '/lawyer-register-specialization',
      type: 'GET',
      dataType: 'json',
      success: function(event){
        var html = '';
        for(var i=0; i<event.length; i++)
        {
          html += '<option value="'+event[i].id+'">'+event[i].category_name+'</option>'; 
        }
        $(".lawyer-specialization").html(html);
        $('.lawyer-specialization').multiselect({
            placeholder: 'lawyer specialization',
        });
      }, error: function(event){

      }
    })
  })
</script>
@endsection