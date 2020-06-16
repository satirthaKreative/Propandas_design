@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Academic Profile</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.lawyer.include.sidebar')
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <div class="dsbrd-qststep profile-academic">
                  <form action="{{ url('/profile-details') }}" enctype="multiple/form-data" id="my-academic-form-id" type="POST" >
                    @csrf
                     <div class="row">                        
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <label for="">Headline</label>
                              <input type="text" name="heading" id="heading" class="form-control" placeholder="30 characters">
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <label for="">About Yourself <small>(500 characters, maximum 5000 characters)</small></label>
                              <textarea class="form-control" id="academic_details" name="academic_details" placeholder="Enter About Yourself"></textarea>                                   
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group ">
                              <label for="">Association certificate</label>
                              <div class="custom-file theme-upload">
                                 <input type="file" class="custom-file-input" id="association_certification" name="association_certification">
                                 <label class="custom-file-label" for="association_certification">Choose file</label>
                              </div>
                              <span class="text-info download1"></span>
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Law Schools Attended</label>
                              <select name="law_school_attendance[]" multiple="multiple" class="form-control theme-select" id="law-school-multi"><!-- 
                                 <option value="1">Attended 1</option>
                                 <option value="2">Attended 2</option>
                                 <option value="3">Attended 3</option>
                                 <option value="4">Attended 4</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Address Proof</label>
                              <div class="custom-file theme-upload">
                                 <input type="file" class="custom-file-input" id="address_proof" name="address_proof">
                                 <label class="custom-file-label" for="address_proof">Choose file</label>
                              </div>
                              <span class="text-info download2"></span>
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Identity Proof</label>
                              <div class="custom-file theme-upload">
                                 <input type="file" class="custom-file-input" id="identity_proof" name="identity_proof">
                                 <label class="custom-file-label" for="identity_proof">Choose file</label>
                              </div>
                              <span class="text-info download3"></span>
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <label for="">Provide services</label>                                    
                              <select name="category_id[]" multiple="multiple" class="form-control lawyer-specialization-class-id-jio theme-select" id="cate-specialization">
                                 <!-- <option value="1">Business</option>
                                 <option value="2">Intellectual Property</option>
                                 <option value="3">Employment</option>
                                 <option value="4">Contracts & Agreements</option>
                                 <option value="5">Immigration</option>
                                 <option value="6">Real Estate</option>
                                 <option value="7">Tax</option>
                                 <option value="8">Lawsuits & Disputes</option>
                                 <option value="9">Other</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <label for="">Others services</label>
                              <input type="text" name="other_services" class="form-control" id="other_services_id" placeholder="Enter services">
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Hourly Rate</label>
                              <input type="number" name="hourly_rate" class="form-control" id="hourly_rate_id" placeholder="Enter Rate">                     
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for=""> Projects/clients would you like to work for</label>
                              <select name="work_like" id="work_like" class="form-control">
                                 <option value="Single Consultation">Single Consultation</option>
                                 <option value="Ongoing Assistance">Ongoing Assistance</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Which law can you advice?</label>
                              <select name="law_country" class="form-control law_country-class" id="law_country_id">
                                 <option value="1">Germany</option>
                                 <option value="2">Austria</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Languages do you speak?</label>
                              <select name="languages[]" multiple="multiple" class="form-control theme-select" id="language-multi">
                                 <!-- <option value="1">languages 1</option>
                                 <option value="2">languages 2</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <hr>
                           <h6>Please add a bank account to receive payments:</h6>
                           <h3>New Bank Information</h3>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">First Name</label>
                              <input type="text" name="bank_fname" class="form-control" placeholder="First Name" id="bank_fname">
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">Last Name</label>
                              <input type="text" name="bank_lname" class="form-control" placeholder="Last Name" id="bank_lname">
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">BIC</label>
                              <input type="text" name="bank_bic" class="form-control" placeholder="Enter Bic" id="bank_bic">
                           </div>
                        </div>
                        <div class="col-md-6 plr-5">
                           <div class="form-group">
                              <label for="">IBAN</label>
                              <input type="text" name="bank_iban" class="form-control" placeholder="Enter Iban" id="bank_iban">
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <div class="note-txt">
                                 <p>Your information is secure <a href="#" style="text-decoration: underline;">Learn more</a></p>
                                 <p>By using our service, you agree to pay all ProPandas lawyers through the ProPandas platform, including subsequent projects and transactions not related to the initial project. This policy protects both clients and lawyers and allows ProPandas to guarantee the quality of legal work if disputes arise.</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <div class="form-group">
                              <div class="checkbox">
                                 <label><input type="checkbox" name="remember"> I agree to these terms</label>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 plr-5">
                           <input type="submit"  name="add_account" id="add-academic-id" value="Add Account" class="flt-search">
                           <a href="/dashboard" class="dt-btn">Back</a>

                           <p class="academic-error-msg" style="display: none"></p>
                           <p class="academic-success-msg" style="display: none"></p>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script>
   $(function(){
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    
    // $('.theme-select').multiselect({});
    // start actual part

    languages_func();
    law_school_func();
    law_school_func_specialization();
    academic_function_update();

   })
   
   // language select
   function languages_func(){
      $.ajax({
          url: '/profile-language-ajax',
          type: 'GET',
          dataType: 'json',
          success: function(event){
            $("#language-multi").html(event);
            $('#language-multi').multiselect({});
          }, error: function(event){

          }
      })
   }
   // end languages

   // Law school attendent
   function law_school_func(){
      $.ajax({
          url: '/law-school-ajax',
          type: 'GET',
          dataType: 'json',
          success: function(event){
            $("#law-school-multi").html(event);
            $('#law-school-multi').multiselect({});
          }, error: function(event){

          }
      })
   }
   // end law school

   // Law school attendent
   function law_school_func_specialization(){
      $.ajax({
          url: '/law-school-ajax-cate-special',
          type: 'GET',
          dataType: 'json',
          success: function(event){
            $(".lawyer-specialization-class-id-jio").html(event);
            $('.lawyer-specialization-class-id-jio').multiselect({});
          }, error: function(event){

          }
      })
   }
   // end law school

   // update
   function academic_function_update()
   {
      $.ajax({
        url: '/',
        type: 'GET',
        dataType: 'json',
        success: function(resp){

        }, error: function(resp){
          
        }
      })
   }
   // end update

   // academic data save

  

    $("form#my-academic-form-id").submit(function(e) {
        e.preventDefault();  
        if($("#heading").val() == '')
        {
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter a heading</span>').fadeIn().delay(3000).fadeOut('slow');
             $(".academic-error-msg").show();
        }else if($("#heading").val().length > 30){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Heading must be less than 30 characters</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#academic_details").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter academic details</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#academic_details").val().length < 1){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Academic details not less than 500 characters</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#academic_details").val().length > 5000){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Academic details not more than 5000 characters</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        // }else if($("#association_certification").val() == ''){
        //     $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> upload association certificate</span>').fadeIn().delay(3000).fadeOut('slow');
        //     $(".academic-error-msg").show();
        // }else if($("#address_proof").val() == ''){
        //     $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> upload address proof</span>').fadeIn().delay(3000).fadeOut('slow');
        //     $(".academic-error-msg").show();
        // }else if($("#identity_proof").val() == ''){
        //     $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> upload identity proof</span>').fadeIn().delay(3000).fadeOut('slow');
        //     $(".academic-error-msg").show();
        // }else 
        }else if($("#cate-specialization").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Choose a minimum one specialization</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#hourly_rate_id").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your a approx hourly rate</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#work_like").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Choose your work like way</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#law_country_id").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your preferable country policy</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#language-multi").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Choose your languages</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#bank_fname").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your bank first name</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#bank_lname").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your bank last name</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#bank_bic").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your bank BIC</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else if($("#bank_iban").val() == ''){
            $(".academic-error-msg").html('<span class="text-danger"><i class="fa fa-times"></i> Enter your bank IBAN</span>').fadeIn().delay(3000).fadeOut('slow');
            $(".academic-error-msg").show();
        }else{
          var formData = new FormData(this);

          $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/profile-details',
              type: 'POST',
              data: formData,
              success: function (data) {
                // console.log(data);
                  $(".academic-error-msg").hide();
                  $(".academic-success-msg").html('<span class="text-success"><i class="fa fa-check"></i> Successfully Save</span>').fadeIn().delay(3000).fadeOut('slow');
                  $(".academic-success-msg").show();
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }  
        
    });

   // end academic data save

   

</script>
<script>
  // submit academic profile
    $(function(){
      $.ajax({
        url: '/academic-profile-checking-data-ajax',
        type: 'GET',
        dataType: 'json',
        success:  function(event){
          console.log(event.address_proof);
          if(event.count_res == 1){
             $("#heading").val(event.heading);
             $("#academic_details").val(event.academic_details);
             if(event.association_certification !== ""){
                $(".download1").html(" <a href='"+event.association_certification+"' download><i class='fa fa-download'><i></a>");
             }
             if(event.identity_proof !== ""){
                $(".download3").html(" <a href='"+event.identity_proof+"' download><i class='fa fa-download'><i></a>");
             }
             if(event.address_proof !== ""){
              $(".download2").html(" <a href='"+event.address_proof+"' download><i class='fa fa-download'><i></a>");
             }
             $("#other_services_id").val(event.other_services);
             $("#hourly_rate_id").val(event.hourly_rate);
             $("#work_like").val(event.work_like);
             $("#bank_lname").val(event.bank_lname);
             $("#bank_bic").val(event.bank_bic);
             $("#bank_iban").val(event.bank_iban);
             $("#bank_fname").val(event.bank_fname);

            
          }else{
              
          }
        }, error: function(event){

        }
      })
    })
   // save submit academic profile
</script>
@endsection