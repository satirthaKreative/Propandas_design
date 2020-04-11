<?php include ("inc/header.php") ?>
<!-- <section class="inner-banner">
   <div class="container">
      <h1>About Us</h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>About Us </li>
         </ul>
      </div>
   </div>
   </section> -->
<section class="dshbord-theme">
   <div class="container">
      <!-- <div class="notifications-alert">
         <ul>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#email-modal"><i class="fa fa-envelope fa-fw" aria-hidden="true" ></i>Email Verification</a></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#number-modal"><i class="fa fa-mobile fa-fw "  aria-hidden="true"></i>Number Verification</a></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#success-modal"><i class="fa  fa-check-circle fa-fw "  aria-hidden="true"></i>Success Modal</a></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#Error-modal"><i class="fa fa-exclamation-circle fa-fw "  aria-hidden="true"></i>Error Modal</a></li>
         </ul>
      </div> -->
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Dashboard</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               <ul>
                  <li class="active"><a href="javascript:void(0)"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comments" aria-hidden="true"></i>Messages</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file-text" aria-hidden="true"></i>Documents</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-briefcase" aria-hidden="true"></i>My Jobs</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-exchange" aria-hidden="true"></i>Transactions</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true"></i>System Messages</a></li>
               </ul>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="profile-content">
               <div class="profile-picture">                 
                  <img id="blah" src="images/clint-logo.jpg" alt="your image" class="profile-icon" />
                  <input type='file' onchange="readURL(this);" />
               </div>
               <div class="short-profile">
                  <h3>Mr. Rozer Lermond</h3>
                  <p><i class="fa fa-envelope icn-show" aria-hidden="true" ></i>rozerlermond@gmail.com</p>
                  <p><i class="fa fa-phone icn-show" aria-hidden="true" ></i>+1 6502509458</p>
                  <p><i class="fa fa-map-marker icn-show" aria-hidden="true" ></i>2361  Brentwood Drive San Marcos Texas Usa</p>
                  <p><a href="javascript:void(0)" class="edit-btn" data-toggle="modal" data-target="#Edit-profile-modal" data-toggle="tooltip" data-placement="top" data-tooltip="Edit-profile"><i class="fa fa-pencil" aria-hidden="true" ></i></a></p>

                  <p><a href="javascript:void(0)" class="edit-btn edit-btn2" data-toggle="modal" data-target="#change-password" data-toggle="tooltip" data-placement="top" data-tooltip="change-password"><i class="fa fa-cog" aria-hidden="true" ></i></a></p>
               </div>
            </div>
            <div class="dsbrd-content">
               <div class="welcome-part text-center">
                  <h2>Welcome to ProPandas!</h2>
                  <p>ProPandas is the easiest solution for any business to get cost-effective and high quality legal services.</p>
               </div>
               <hr>
               <h3>Post a Job</h3>
               <p>Get started by telling us about your business and legal needs. It only takes a minute and your information is strictly confidential.</p>
               <hr>
               <h3>Get Proposals</h3>
               <p>Our proprietary algorithm matches you with attorneys most qualified to handle your specific legal work. You can review proposals and schedule free consultations with no obligation.</p>
               <hr>
               <h6>Recent Jobs</h6>
               <ul>
                  <li>
                     <a href="javascript:void(0)">
                        <span class="left-step">
                           <h5>Trademark Search Services</h5>
                           <p>Posted about 5 hours ago</p>
                        </span>
                        <span class="right-step">
                           <p><label>10</label>Proposals</p>
                        </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)">
                        <span class="left-step">
                           <h5>Trademark Search Services</h5>
                           <p>Posted about 5 hours ago</p>
                        </span>
                        <span class="right-step">
                           <p><label>10</label>Proposals</p>
                        </span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)">
                        <span class="left-step">
                           <h5>Trademark Search Services</h5>
                           <p>Posted about 5 hours ago</p>
                        </span>
                        <span class="right-step">
                           <p><label>10</label>Proposals</p>
                        </span>
                     </a>
                  </li>
                  <li>
                     <div class="toolbox">
                        <p><a href="javascript:void(0)" class="txt-blue">Learn more about these colors</a></p>
                        <div class="tooltiptext">
                           <ul class="jtl-legend">
                              <li><i class="success-green-BG"></i>Open, accepting proposals</li>
                              <li><i class="warning-yellow-BG"></i>Work in progress</li>
                              <li><i class="danger-red-BG"></i>Canceled</li>
                              <li><i class="grey-30-BG"></i>Completed</li>
                           </ul>
                        </div>
                     </div>
                  </li>
               </ul>
               <hr>
               <h3>Hire your Lawyer</h3>
               <p>When you’re ready, instantly hire the attorney that’s right for you.</p>
               <div class="table-responsive theme-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Serial</th>
                           <th>Lawyer</th>
                           <th>Specialist </th>
                           <th>Value</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>01</td>
                           <td>Daniel Schwarzl</td>
                           <td>Corporate Law</td>
                           <td>$200.00</td>
                           <td><a  href="javascript:void(0)" class="shrt-btn">Hire Now</a></td>
                        </tr>
                        <tr>
                           <td>02</td>
                           <td>Eva Quasem</td>
                           <td>Criminal Law</td>
                           <td>$300.00</td>
                           <td><a  href="javascript:void(0)" class="shrt-btn">Hire Now</a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Email Modal -->
   <div class="modal fade theme-modal" id="email-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></span>Email Confirmation</h3>
                  <p>We have sent email to <a href="#">support@gmailcom</a>to confirm to your email address.Please click the provided link t complete your verification</p>
                  <hr>
                  <p>If you not got any email <a href="#"> Resend Email Link</a> </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Number Modal -->
   <div class="modal fade theme-modal" id="number-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></span>Number Confirmation</h3>
                  <p>Please Enter one time password  has been sent to 9831****** to verify your number</p>
                  <form>
                     <input type="password" name="">
                     <input type="submit" name="" value="validate" class="cnt-btn">
                  </form>
                  <hr>
                  <p><a href="#"> Resend One time Password</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- success Modal -->
   <div class="modal fade theme-modal" id="success-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-check-circle" aria-hidden="true"></i></span> Number confirmed</h3>
                  <p>Your Number has been verified</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Error Modal -->
   <div class="modal fade theme-modal" id="Error-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span> Sorry Wrong Update </h3>
                  <p>Sorry You are entered wrong OTP </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Edit profile Modal -->
   <div class="modal fade theme-modal" id="Edit-profile-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
               <div class="edit-profile-part">
                  <h3>Edit All Information</h3>
                  <hr>
                  <form class="form-horizontal" role="form" method="post">
                     <div class="form-group">
                        <label for="usr">Name :</label>           
                        <input type="text" class="form-control" placeholder="Rozer Lermond">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Email :</label>           
                        <input type="email" class="form-control" placeholder="rozerlermond@gmail.com">          
                     </div>
                     <div class="form-group">
                        <label for="usr">Contact no :</label>           
                        <input type="text" class="form-control" placeholder="+1 6502509458">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Address :</label> 
                        <textarea class="form-control" placeholder="2361 Brentwood Drive San Marcos Texas Usa"></textarea>
                     </div>
                     <div class="form-group edt-group">
                        <input class="btn  inquery-submit" value="Save" type="submit" name="submit">
                        <input class="btn  inquery-cancle" value="Cancel" type="button" name="submit">
                     </div>
                  </form>
               </div>
               <!--end of col-md-12 -->
            </div>
         </div>
      </div>
   </div>

   <!-- change password Modal -->
   <div class="modal fade theme-modal" id="change-password">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
               <div class="edit-profile-part">
                  <h3>Change-password</h3>
                  <hr>
                  <form class="form-horizontal" role="form" method="post">
                     <div class="form-group">
                        <label for="usr">Change Password:</label>           
                        <input type="password" class="form-control" >           
                     </div>
                     <div class="form-group">
                        <label for="usr">Confirm Password:</label>           
                        <input type="password" class="form-control" >          
                     </div>  
                     <div class="form-group edt-group">
                        <input class="btn  inquery-submit" value="Change Password" type="submit" name="submit">                       
                     </div>
                  </form>
               </div>
               <!--end of col-md-12 -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
<?php include ("inc/footer.php") ?>
<script >
   function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
   
               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result);
               };
   
               reader.readAsDataURL(input.files[0]);
           }
       } 
   
</script>