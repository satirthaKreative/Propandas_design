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
    <div class="notifications-alert">
         <ul>            
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#number-modal"><i class="fa fa-mobile fa-fw " aria-hidden="true"></i>Number Verification</a></li>           
         </ul>
      </div>
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Dashboard</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               <ul>
                  <li class="active"><a href="javascript:void(0)"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-exchange" aria-hidden="true"></i>Income Report</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true"></i>System Messages</a></li>
               </ul>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">

          <div class="profile-content">
               <div class="profile-picture">                 
                  <img id="blah" src="images/abt-img2.jpg" alt="your image" class="profile-icon">
                  <input type="file" onchange="readURL(this);">
               </div>
               <div class="short-profile">
                  <h3>Mr. Paul Hemming</h3>
                  <p><i class="fa fa-envelope icn-show" aria-hidden="true"></i>paulhemming@gmail.com</p>
                  <p><i class="fa fa-phone icn-show" aria-hidden="true"></i>+1 4582549656</p>
                  <p><i class="fa fa-map-marker icn-show" aria-hidden="true"></i>33/1 New Road Bristol, United Kingdom</p>
                  <p><a href="javascript:void(0)" class="edit-btn" data-toggle="modal" data-target="#Edit-profile-modal" data-placement="top" data-tooltip="Edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
               </div>
            </div>
            <div class="dsbrd-content">
               <div class="welcome-part text-center">
                   <h2>Welcome to ProPandas!</h2>
               <p>ProPandas is the easiest solution for any business to get cost-effective and high quality legal services.</p>
               </div>
              
               <hr>

               <div class="ft-part odd-bg">
                  <h4>Create Client</h4>
                  <form>
                     <div class="row">                      
                              <div class="col-md-6 plr-5">                                                                  
                                    <input type="text" name="" id="" class="form-control" placeholder="First Name">
                              </div>
                              <div class="col-md-6 plr-5">                                                             
                                    <input type="text" name="" id="" class="form-control" placeholder="Last Name">
                              </div>  

                              <div class="col-md-6 plr-5">                                                                  
                                    <input type="Email" name="" id="" class="form-control" placeholder="Enter Email">
                              </div>
                              <div class="col-md-6 plr-5">                                                             
                                    <input type="text" name="" id="" class="form-control" placeholder="Phone Number">
                              </div> 
                              <div class="col-md-12 plr-5">                                                             
                                    <input type="submit" value="sends a request" class="sent-btn">
                              </div>                        
                     </div>
                  </form>
               </div>


               <div class="ft-part even-bg">
                  <h3>Track Time</h3>
                  <p>List of all Lawyer projects</p>
                  <div class="table-responsive theme-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Select</th>
                           <th>project ID</th>
                           <th>project name</th>
                           <th>Client Name</th>
                           <th>Add a time</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td><input type="checkbox" name="remember"></td>
                           <td>#232524</td>
                           <td>Criminal</td>
                           <td>Daniel Schwarzl</td>
                           <td><a href="javascript:void(0)" class="shrt-btn">Add a time</a></td>
                        </tr>
                        <tr>
                           <td><input type="checkbox" name="remember"></td>
                           <td>#232526</td>
                           <td>Derivatives</td>
                           <td>Kery Bannet</td>
                           <td><a href="javascript:void(0)" class="shrt-btn">Add a time</a></td>
                        </tr>
                        <tr>
                           <td><input type="checkbox" name="remember"></td>
                           <td>#232528</td>
                           <td>David Brettle</td>
                           <td>Daniel Schwarzl</td>
                           <td><a href="javascript:void(0)" class="shrt-btn">Add a time</a></td>
                        </tr>
                        <tr>
                           <td><input type="checkbox" name="remember"></td>
                           <td>#232530</td>
                           <td>James Oliver</td>
                           <td>Kery Bannet</td>
                           <td><a href="javascript:void(0)" class="shrt-btn">Add a time</a></td>
                        </tr>
                        
                     </tbody>
                  </table>
               </div>
               </div>

              <div class="ft-part odd-bg">
                <h3>Bill a Client</h3>
                 <p>List of all Lawyer projects</p>
                <div class="table-responsive theme-table">
          <table class="table table-striped ">
            <thead>            
              <tr>
               <th>Select</th>
               <th>project ID</th>
               <th>project name</th>
               <th>Client Name</th>
               <th>create an invoice</th>
            </tr>
            </thead>
            <tbody>
              <tr>
           <td><input type="checkbox" name="remember"></td>
           <td>#232528</td>
           <td>David Brettle</td>
           <td>Daniel Schwarzl</td>
            <td><a target="_blank" href="javascript:void(0)">create an invoice</a></td>
          </tr>

          <tr>
           <td><input type="checkbox" name="remember"></td>
           <td>#232530</td>
           <td>Derivatives</td>
           <td>Kery Bannet</td>
           <td><a target="_blank" href="javascript:void(0)">create an invoice</a></td>
          </tr>

            </tbody>

          </table>
         </div>
              </div>               

         <h3>Post a Job</h3>
         <p>Get started by telling us about your business and legal needs. It only takes a minute and your information is strictly confidential.</p>               
               
            </div>
         </div>
      </div>

     <!-- The Modal -->
<div class="modal fade theme-modal" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         
         <!-- Modal body -->
         <div class="modal-body text-center">
            <div class="center-part">
               <h3>login first</h3>
               <p>You need to login first</p>
               <p><a href="#" class="cnt-btn">Login Now <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a></p>
            </div>
            
         </div>          
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
                        <input type="text" class="form-control" placeholder="Mr. Paul Hemming ">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Email :</label>           
                        <input type="email" class="form-control" placeholder="paulhemming@gmail.com">          
                     </div>
                     <div class="form-group">
                        <label for="usr">Contact no :</label>           
                        <input type="text" class="form-control" placeholder="+1 4582549656">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Address :</label> 
                        <textarea class="form-control" placeholder="33/1 New Road Bristol, United Kingdom"></textarea>
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