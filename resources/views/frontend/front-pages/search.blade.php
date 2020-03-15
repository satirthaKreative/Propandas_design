@extends('layouts.frontendLayouts.app')
@section('content')
<section class="inner-banner">
   <div class="container">
      <h1>SERVICES LIST </h1>
      <div class="breadcum-top">
         <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>services</li>
         </ul>
      </div>
   </div>
</section>
<!-- end of inner-banner -->
<section class="theme-content">
   <div class="container">
      <div class="theme_multystep">
         <!-- MultiStep Form -->
         <div class="row">
            <div class="col-md-8 offset-2">
               <div class="progress step-progress">
                   <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                     <span class="sr-only">70% Complete</span>
                   </div>
                 </div>

               <form id="msform">
                  <!-- fieldsets -->
                  <fieldset>
                     <h2 class="fs-title">Startup Job Posting</h2>
                     <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nam, ipsam voluptate ab iure qui veniam. Voluptatibus officiis voluptas in ipsum sed eum iusto architecto blanditiis eaque illum totam fugiat assumenda soluta et officia, ea, sequi nemo ad nihil perspiciatis eos quisquam mollitia cum facilis! Excepturi beatae nobis quo delectus nostrum ullam ad magnam tempora, laboriosam, expedita ex.</p>
                     <p class="text-justify">
                        Velit praesentium, facilis eius distinctio omnis temporibus quas aut odio fugit minima ducimus deserunt cumque, optio saepe molestiae ipsam unde laudantium. Quos deleniti consequatur, ex, debitis itaque excepturi, possimus laborum dolor esse veniam deserunt eos, doloribus dolorem tempore voluptate molestias sint saepe!
                     </p>
                     <p><strong>A good description includes:</strong></p>
                     <ul>
                        <li>Unique details about your project or legal needs</li>
                        <li>Project timeline and expected deliverables</li>
                        <li>Your budget expectations</li>
                        <li>Specific legal expertise or background that you need</li>
                     </ul>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset>
                     <h2 class="fs-title">What kind of startup assistance do you need?</h2>
                     <h3 class="fs-subtitle">Tell us something more</h3>
                     <ul class="list-option">
                        <li>
                           <label><input type="checkbox" name="remember">Business Formation and Structure</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Contracts or Agreements</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Employment</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Trademark</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Patent</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Raising Capital</label>    
                        </li>
                        <li>
                           <label><input type="checkbox" name="remember">Something Else</label>    
                        </li>
                     </ul>
                     <div class="error-required">Required Question</div>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset>
                     <h2 class="fs-title">Which agreements would you like to discuss with a lawyer?</h2>
                     <h3 class="fs-subtitle">Your presence on the social network</h3>
                     <input type="text" name="twitter" placeholder="Name"/>
                     <input type="email" name="facebook" placeholder="Email"/>
                     <input type="text" name="gplus" placeholder="Phone Number"/>
                     <input type="password" name="pass" placeholder="Password"/>
                     <input type="password" name="cpass" placeholder="Confirm Password"/>
                     <textarea name="" id="" placeholder="Message"></textarea>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset>
                     <h2 class="fs-title">What will you need </h2>
                     <h3 class="fs-subtitle">Fill in your credentials</h3>
                     <select name="" >
                        <option value="1">Select</option>
                        <option value="1"> MTGA</option>
                        <option value="2">MTGO</option>
                        <option value="3">Cockatrice</option>
                        <option value="4">Xmage</option>
                     </select>
                     <select name="" multiple="multiple" id="multy-select">
                        <option value="1"> MTGA</option>
                        <option value="2">MTGO</option>
                        <option value="3">Cockatrice</option>
                        <option value="4">Xmage</option>
                     </select>
                     <select name="" multiple  id="search-select">
                        <option value="1"> MTGA</option>
                        <option value="2">MTGO</option>
                        <option value="3">Cockatrice</option>
                        <option value="4">Xmage</option>
                     </select>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset >
                     <h2 class="fs-title">Would you like to receive text (SMS) notifications</h2>
                     <ul class="list-option">
                        <li>
                           <label><input type="radio" name="optradio">Yes</label>    
                        </li>
                        <li>
                           <label><input type="radio" name="optradio">No</label>    
                        </li>
                     </ul>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset id="">
                     <h2 class="fs-title">Enter your phone number below to receive SMS notifications</h2>
                     <h3 class="fs-subtitle">Once you enter your phone number, click "Next". You will receive a text message from UpCounsel. Reply "Yes" to confirm your number. Message & data rates may apply.</h3>
                     <input type="text" name="twitter" placeholder="Phone Number"/>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="button" name="next" class="next action-button" value="Next"/>
                  </fieldset>
                  <fieldset id="">
                     <h2 class="fs-title">Where are you located?</h2>
                     <div class="located-us">
                        <input type="text" name="twitter" placeholder="City"/>
                        <select name="" >
                           <option value="">Select</option>
                           <option value="1"> MTGA</option>
                           <option value="2">MTGO</option>
                           <option value="3">Cockatrice</option>
                           <option value="4">Xmage</option>
                        </select>
                        <p class="text-right"><a href="javascript:void(0)" class="ZipPanel ys-locate">Located in the U.S.?</a></p>
                     </div>
                     <div class="not-located-us">
                        <input type="text" name="twitter" placeholder="Zip Code"/>
                        <p class="text-right"><a href="javascript:void(0)" class="ZipPanel not-locate ">Not located in the U.S.?</a></p>
                     </div>
                     <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                     <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                  </fieldset>                  
               </form>
               <!-- link to designify.me code snippets --> 
            </div>
         </div>
         <!-- /.MultiStep Form -->
      </div>
   </div>
</section>
@endsection