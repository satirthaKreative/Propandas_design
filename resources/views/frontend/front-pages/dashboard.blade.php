@extends('layouts.frontendLayouts.app')
@section('content')
@guest
      <script>
         window.location.href="/login";
      </script>
@else
@if(Auth::user()->is_lawyer == 0)
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
               @if(Auth::user()->profileImg != '') 
                  @php $profile_picture = Auth::user()->profileImg @endphp
               @else
                  @php $profile_picture = 'frontAssets/images/no-img.jpg' @endphp
               @endif              
                  <img id="blah" src="{{ asset($profile_picture) }}" alt="your image" class="profile-icon">
                  <form enctype="multipart/form-data" id="dataImgShow">
                     <input type="file" class="myImgFile" name="image" onchange="readURL(this);">
                  </form>
               </div>
               @php $total_address = ''; @endphp

               @if(Auth::user()->address1 != '')
                  @php $total_address .= Auth::user()->address1.", "; @endphp
               @endif

               @if(Auth::user()->address2 != '')
                     @php $total_address .= Auth::user()->address2.", "; @endphp
               @endif

               @if(Auth::user()->city != '')
                     @php $total_address .= Auth::user()->city." "; @endphp
               @endif

               @if(Auth::user()->zipcode != '')
                     @php $total_address .= Auth::user()->zipcode.", "; @endphp
               @endif


               <div class="short-profile">
                  <h3>{{ Auth::user()->name }} {{ Auth::user()->lname }}</h3>
                  <p><i class="fa fa-envelope icn-show" aria-hidden="true" ></i>{{ Auth::user()->email }}</p>
                  <p><i class="fa fa-phone icn-show" aria-hidden="true" ></i> <span class="country-phn-code"></span>{{ Auth::user()->phn_num }}</p>
                  <p><i class="fa fa-map-marker icn-show" aria-hidden="true" ></i>{{ $total_address }} <span class="country-name-dashboard"></span>.</p>
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
   
   <!-- Edit profile Modal -->
   <div class="modal fade theme-modal" id="Edit-profile-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
               <div class="edit-profile-part">
                  <h3>Edit All Information</h3>
                  <hr>
                  <form class="form-horizontal" id="editProfilePage" role="form" method="post">
                     <div class="form-group">
                        <label for="usr">Name :</label>   
                        <input type="hidden" name="profileId" value="{{ Auth::user()->id }}">        
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Rozer">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Last Name :</label>           
                        <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control" placeholder="Lermond">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Contact no :</label>           
                        <input type="text" name="contact_no" value="{{ Auth::user()->phn_num }}" class="form-control" placeholder="+1 6502509458">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Address1 :</label>           
                        <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control" placeholder="Address1">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Address2 :</label>           
                        <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control" placeholder="Address2">           
                     </div>
                     <div class="form-group">
                        <label for="usr">City :</label>           
                        <input type="text" name="city" value="{{ Auth::user()->city }}"  class="form-control" placeholder="city">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Zipcode :</label>           
                        <input type="text" name="zipcode" value="{{ Auth::user()->zipcode }}" class="form-control" placeholder="zipcode">           
                     </div>
                     <div class="form-group edt-group">
                        <input class="btn  inquery-submit" value="Save" onclick="saveEditModal()" type="button" name="submit">
                        <input class="btn  inquery-cancle" onclick="closeEditModal()" value="Cancel" type="button" >
                     </div>
                  </form>
               </div>
               <!--end of col-md-12 -->
            </div>
         </div>
      </div>
   </div>
    <!-- welcome Modal -->
   <div class="modal fade theme-modal" id="welcome-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Welcome to Propandas </h3>
                  <h6>To being a part of propandas Family </h6>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- job data Modal -->
   <div class="modal fade theme-modal" id="job-cate-post-data-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Thank You </h3>
                  <h6>We send Your Queries To The Lawyers </h6>
                  
               </div>
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
                     <form class="form-horizontal" id="editProfilePassword" role="form" method="post">
                        <div class="form-group">
                           <label for="usr">Change Password:</label>  
                           <input type="hidden" name="profileId" value="{{ Auth::user()->id }}">           
                           <input type="password" class="form-control" id="dashProfilePass" name="pass">           
                        </div>
                        <div class="form-group">
                           <label for="usr">Confirm Password:</label>           
                           <input type="password" class="form-control" id="dashProfileCPass" name="cpass">          
                        </div>  
                        <div class="form-group edt-group">
                           <input class="btn  inquery-submit" onclick="saveEditPassModal()" value="Change Password" type="button" name="submit"> 
                           <input class="btn  inquery-cancle" onclick="closeEditModal()" value="Cancel" type="button" >                      
                        </div>
                     </form>
                  </div>
                  <!--end of col-md-12 -->
               </div>
            </div>
         </div>
      </div>
</section>
<script >
   

   function closeEditModal()
   {
      $("#Edit-profile-modal").modal('hide');
      $("#change-password").modal('hide');
   }

   function saveEditModal()
   {
      $.ajax({
         url: '/updateProfilePage',
         type: 'GET',
         data: $("#editProfilePage").serialize(),
         dataType: 'json',
         success: function(resp){
            if(resp == 1){
               $("#Edit-profile-modal").modal('hide');
               $( "#success-modal" ).modal('show');
               $( "#success-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#success-modal p" ).html('Your <i>Profile Password</i> successfully updated');
               setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
            }else{
               $('#Error-modal').modal('hide');
            }
         }, error: function(resp){

         }
      })
   }


   function saveEditPassModal()
   {
      $.ajax({
         url: '/updateProfilePassPage',
         type: 'GET',
         data: $("#editProfilePassword").serialize(),
         dataType: 'json',
         success: function(resp){
            console.log(resp);
            if(resp == 1){
               $("#change-password").modal('hide');
               $( "#success-modal" ).modal('show');
               $( "#success-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#success-modal p" ).html('Your <i>Profile Password</i> successfully updated');
               setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
            }else if(resp == 3){
               $("#change-password").modal('hide');
               $( "#Error-modal" ).modal('show');
               // $( "#Error-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#Error-modal p" ).html("Both <i>Password</i> Doesn't match");
               setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
            }else{
               $('#success-modal').modal('hide');
            }
         }, error: function(resp){

         }
      })
   }


   
</script>
@elseif(Auth::user()->is_lawyer == 1)
<section class="dshbord-theme">
   <div class="container">

      @if(Auth::user()->verify_phn == 0) 
      <div class="notifications-alert">
         <ul>          
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#number-modal"><i class="fa fa-mobile fa-fw " aria-hidden="true"></i>Please Verify Your Mobile Number</a></li>  

         </ul>
      </div>
      @endif
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title" >Dashboard</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.lawyer.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
         
          <div class="profile-content">
               <div class="profile-picture">  
               @if(Auth::user()->profileImg != '') 
                  @php $profile_picture = Auth::user()->profileImg @endphp
               @else
                  @php $profile_picture = 'frontAssets/images/no-img.jpg' @endphp
               @endif              
                  <img id="blah" src="{{ asset($profile_picture) }}" alt="your image" class="profile-icon">
                  <form enctype="multipart/form-data" id="dataImgShow">
                     <input type="file" class="myImgFile" name="image" onchange="readURL(this);">
                  </form>
               </div>

               @php $total_address = ''; @endphp

               @if(Auth::user()->law_firm != '')
                  @php $total_address .= Auth::user()->law_firm.", "; @endphp
               @endif

               @if(Auth::user()->law_firm_address != '')
                  @php $total_address .= Auth::user()->law_firm_address.", "; @endphp
               @endif

               @if(Auth::user()->address1 != '')
                     @php $total_address .= Auth::user()->address1.", "; @endphp
               @endif

               @if(Auth::user()->city != '')
                     @php $total_address .= Auth::user()->city." "; @endphp
               @endif

               @if(Auth::user()->zipcode != '')
                     @php $total_address .= Auth::user()->zipcode.", "; @endphp
               @endif

               <div class="short-profile">
                  <h3>{{ Auth::user()->name }} {{ Auth::user()->lname }}</h3>
                  <p><i class="fa fa-envelope icn-show" aria-hidden="true"></i>{{ Auth::user()->email }}</p>
                  <p><i class="fa fa-phone icn-show" aria-hidden="true"></i><span class="country-phn-code"></span>{{ Auth::user()->phn_num }}</p>
                  <p><i class="fa fa-map-marker icn-show" aria-hidden="true"></i>{{ $total_address }}<span class="country-name-dashboard"></span>.</p>
                  <p><a href="javascript:void(0)" class="edit-btn" data-toggle="modal" data-target="#Edit-profile-modal" data-placement="top" data-tooltip="Edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                  <p><a href="javascript:void(0)" class="edit-btn edit-btn2" data-toggle="modal" data-target="#change-password" data-placement="top" data-tooltip="change-password"><i class="fa fa-cog" aria-hidden="true"></i></a></p>
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
                  <p>Please verify your number</p>
                  <p><?= Auth::user()->phn_num; ?></p>
                  <p><a href="javascript: ;" class="cnt-btn" onclick="phn_number_verify_modal()"> Click To Send Verification Code</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Number Modal -->
   <div class="modal fade theme-modal" id="number-modal1">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></span>Number Confirmation</h3>
                  <p>Please Enter one time password  has been sent to verify your number</p>
                  <form>
                     <input type="text" id="validate-sms-id-name">
                     <p id="hide-phn-otp-verify" style="display: none; color: red;">Please Enter a valid code</p>
                     <input type="button" onclick="validate_sms()" value="validate" class="cnt-btn">
                  </form>
               </div>
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
                  <form class="form-horizontal" id="editProfilePassword" role="form" method="post">
                     <div class="form-group">
                        <label for="usr">Change Password:</label>  
                        <input type="hidden" name="profileId" value="{{ Auth::user()->id }}">          
                        <input type="password" class="form-control" name="pass">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Confirm Password:</label>           
                        <input type="password" class="form-control" name="cpass">          
                     </div>  
                     <div class="form-group edt-group">
                        <input class="btn  inquery-submit"  onclick="saveEditPassModal()"  value="Change Password" type="button" name="submit"> 
                         <input class="btn  inquery-cancle" onclick="closeEditModal()" value="Cancel" type="button" name="submit">                      
                     </div>
                  </form>
               </div>
               <!--end of col-md-12 -->
            </div>
         </div>
      </div>
   </div>

   <!-- welcome Modal -->
   <div class="modal fade theme-modal" id="welcome-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Welcome to Propandas </h3>
                  <h6>To being a part of propandas Family </h6>
                  
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- job data Modal -->
   <div class="modal fade theme-modal" id="job-cate-post-data-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="{{ asset('frontAssets/images/logo.png') }}" alt="logo" class="modal-logo"></span>Thank You </h3>
                  <h6>We send Your Queries To The Lawyers </h6>
                  
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
                  <form class="form-horizontal" id="editProfilePage" role="form" method="post">
                     <div class="form-group">
                        <label for="usr">Name</label> 
                        <input type="hidden" name="profileId" value="{{ Auth::user()->id }}">          
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Mr. Paul  ">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Last Name</label>           
                        <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}" placeholder="Doe">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Contact no</label>           
                        <input type="text" class="form-control" name="phn_no" value="{{ Auth::user()->phn_num }}" placeholder="+1 4582549656">           
                     </div>
                     <div class="form-group">
                        <label for="usr">Law firm Name</label> 
                        <input type="text" class="form-control" placeholder="Romcade Law firm" name="law_firm" value="{{ Auth::user()->law_firm }}" > 
                     </div>

                     <div class="form-group">
                        <label for="usr">Law firm address</label> 
                        <input type="text" class="form-control" placeholder="33/1 New Road Bristol" name="law_firm_address" value="{{ Auth::user()->law_firm_address }}" > 
                     </div>

                     <div class="form-group">
                        <label for="usr">City</label> 
                        <input type="text" class="form-control" placeholder="Bristol" name="city" value="{{ Auth::user()->city }}" > 
                     </div>

                     <div class="form-group">
                        <label for="usr">Zip Code</label> 
                        <input type="text" class="form-control" placeholder="743125" name="zipcode" value="{{ Auth::user()->zipcode }}" > 
                     </div>

                     <div class="form-group edt-group">
                        <input class="btn  inquery-submit" value="Save" onclick="saveEditModal()" type="button" name="submit">
                        <input class="btn  inquery-cancle" onclick="closeEditModal()" value="Cancel" type="button" >
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

<script >

   function phn_number_verify_modal()
   {
      var phn_num_send = <?= Auth::user()->phn_num; ?>;
      $.ajax({
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
         url: '/ajaxPhoneVerifySendData',
         type: 'POST',
         data: {phn_num_send: phn_num_send},
         dataType: 'json',
         success:  function(resp){
            console.log(resp);
            if(resp != 0){
               $("#number-modal").modal('hide');
               $("#number-modal1").modal('show');
            }else{
               $("#number-modal").modal('hide');
            }
         }, error: function(resp){

         }
      })
   }

   function validate_sms(){
      var valid_code = $("#validate-sms-id-name").val();
      if(valid_code == ''){
         $("#validate-sms-id-name").css('border','1px solid red');
      }else{
         $("#validate-sms-id-name").css('border','1px solid black');
         $.ajax({
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
            url: '/ajaxPhoneVerifyData',
            type: 'POST',
            data: {valid_code: valid_code},
            dataType: 'json',
            success:  function(resp){
               if(resp == 1){
                  $("#number-modal1").modal('hide');
                  $( "#success-modal" ).modal('show');
                  $( "#success-modal span:nth-child(2)" ).html('Successfully Verified');
                  $( "#success-modal p" ).html('Your <i>Phone number</i> successfully verified');
                  setTimeout(function(){ location.reload(); }, 3000);
               }else{
                  $("#hide-phn-otp-verify").show();
                  setTimeout(function(){ $("#hide-phn-otp-verify").hide(); }, 5000);
               }
            }, error: function(resp){

            }
         })
      }
   }

   function closeEditModal()
   {
      $("#Edit-profile-modal").modal('hide');
      $("#change-password").modal('hide');
   }

   function saveEditModal()
   {
      $.ajax({
         url: '/updateLawyerProfilePage',
         type: 'GET',
         data: $("#editProfilePage").serialize(),
         dataType: 'json',
         success: function(resp){
            if(resp == 1){
               $("#Edit-profile-modal").modal('hide');
               $( "#success-modal" ).modal('show');
               $( "#success-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#success-modal p" ).html('Your <i>Profile Details</i> successfully updated');
               setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
            }else{
               $('#Error-modal').modal('hide');
            }
         }, error: function(resp){

         }
      })
   }


   function saveEditPassModal()
   {
      $.ajax({
         url: '/updateProfilePassPage',
         type: 'GET',
         data: $("#editProfilePassword").serialize(),
         dataType: 'json',
         success: function(resp){
            if(resp == 1){
               $("#change-password").modal('hide');
               $( "#success-modal" ).modal('show');
               $( "#success-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#success-modal p" ).html('Your <i>Profile Password</i> successfully updated');
               setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
            }else if(resp == 3){
               $("#change-password").modal('hide');
               $( "#Error-modal" ).modal('show');
               // $( "#Error-modal span:nth-child(2)" ).html('Successfully Updated');
               $( "#Error-modal p" ).html("Both <i>Password</i> Doesn't match");
               setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
            }else{
               $('#success-modal').modal('hide');
            }
         }, error: function(resp){

         }
      })
   }

   
</script>
@endif
<script>
   function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
   
               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result);

                       var formData = new FormData($('#dataImgShow')[0]);

                       $.ajax({
                           headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                           url:    '/myImgFileUploadProfile',
                           type:   'POST',
                           data:   formData,
                           cache:  false,
                           dataType: 'json',
                           processData: false,
                           contentType: false, 
                           success: function(data){
                              if(data == 1){
                                 $( "#success-modal" ).modal('show');
                                 $( "#success-modal span:nth-child(2)" ).html('Successfully Updated');
                                 $( "#success-modal p" ).html('Your <i>Profile Image</i> successfully updated');
                                 setTimeout(function(){ $("#success-modal").modal('hide'); }, 3000);
                              }else if(data == 0){
                                 $( "#Error-modal" ).modal('show');
                                 $( "#Error-modal p" ).html("Your <i>Profile Image</i> isn't updated");
                                 setTimeout(function(){ $("#Error-modal").modal('hide'); }, 3000);
                              }
                           }
                       });
               };
   
               reader.readAsDataURL(input.files[0]);
               
           }
       } 
   function change_country_wishDashboard()
   {
      var country_val = <?= Auth::user()->country; ?>;
      $.ajax({
         url: '/country_change_dashboard',
         type: 'GET',
         data: {country_val:  country_val},
         dataType: 'json',
         success:  function(event){
            $(".country-name-dashboard").html(event.nicename);
            $(".country-phn-code").html("+"+event.phonecode+" ");
         }, error: function(event){

         }
      })
   }
</script>

@endguest
<!-- end of dshbord-theme -->
@endsection