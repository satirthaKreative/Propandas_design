<?php include ("inc/header.php") ?>
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
               <img src="images/rg-logo.png" alt="logo-white" class="wh-logo"> 
               <h2><span>Lets Get</span> Started</h2>
               <p>Sed ut perspi ciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab  rem aperiam,</p>
               <h4><strong>Sign Up Here <i class="fa fa-long-arrow-right" aria-hidden="true"></i></strong></h4>
            </div>
         </div>
         <div class="col-sm-8 login-box cst-login">
            <h1>SIGN UP AS A Lawyer</h1>
            <form method="post">
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
                        <input type="text" name="user" class="form-control" placeholder="First Name" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-5 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Last Name" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="email" name="user" class="form-control" placeholder="Email" value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-6 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Phone Number " value="" required="" />
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <input type="text" name="user" class="form-control" placeholder=" Law firm  " value="" required="" />
                        <p class="text-left"><small>Please put your own name if not a law firm</small></p>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <textarea name="" id="" class="form-control" placeholder="Law firm address"  ></textarea>
                        <p class="text-left"><small>Please put your residential address if you don’t have an office address</small></p>
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
                        <div class="file-field">                                 
                           <span><i class="fa fa-upload" aria-hidden="true"></i>Upload Resume</span>
                           <input type="file">    
                        </div>
                        <div class="captcha-place">
                           <img src="images/captcha.jpg" alt="captcha">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12 plr-5">
                     <div class="form-group">
                        <div class="checkbox">
                           <label><input type="checkbox" name="remember">By clicking on “Sign Up Now”, I agree to and understand the ProPandas <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>.</label>
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
            <p>Already have an account?  <a href="login.php">Sign In Now</a></p>
         </div>
         <!-- end of col-sm-8 -->
      </div>
   </div>
</section>
<!-- end of theme-content -->
<?php include ("inc/footer.php") ?>