<?php include ("inc/header.php") ?>
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Business Lawyers</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               <ul>
                  <li ><a href="javascript:void(0)"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comments" aria-hidden="true"></i>Messages</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file-text" aria-hidden="true"></i>Documents</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-briefcase" aria-hidden="true"></i>My Jobs</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-exchange" aria-hidden="true"></i>Transactions</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true"></i>System Messages</a></li>
                  <li class="active"><a href="javascript:void(0)"><i class="fa fa-area-chart" aria-hidden="true"></i>Project Status</a></li>
               </ul>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">
               <div class="table-responsive theme-table prj-list-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Project List</th>
                           <th>Project Name</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td> 01</td>
                           <td>Trademark Search Services</td>
                           <td>01/13/2020</td>
                           <td>progress</td>
                           <td><a target="_blank" href="javascript:void(0)" class="shrt-btn vw-btn short-font" data-toggle="modal" data-target="#review-modal">Completed</a></td>
                        </tr>
                        <tr>
                           <td> 02</td>
                           <td>Trademark Search Services</td>
                           <td>01/13/2020</td>
                           <td>progress</td>
                           <td><a target="_blank" href="javascript:void(0)" class="shrt-btn vw-btn short-font" data-toggle="modal" data-target="#review-modal">Completed</a></td>
                        </tr>
                        <tr>
                           <td> 03</td>
                           <td>Trademark Search Services</td>
                           <td>01/13/2020</td>
                           <td>progress</td>
                           <td><a target="_blank" href="javascript:void(0)" class="shrt-btn vw-btn short-font" data-toggle="modal" data-target="#review-modal">Completed</a></td>
                        </tr>
                        <tr>
                           <td> 04</td>
                           <td>Trademark Search Services</td>
                           <td>01/13/2020</td>
                           <td>progress</td>
                           <td><a target="_blank" href="javascript:void(0)" class="shrt-btn vw-btn short-font" data-toggle="modal" data-target="#review-modal">Completed</a></td>
                        </tr>
                        <tr>
                           <td> 05</td>
                           <td>Trademark Search Services</td>
                           <td>01/13/2020</td>
                           <td>progress</td>
                           <td><a target="_blank" href="javascript:void(0)" class="shrt-btn vw-btn short-font" data-toggle="modal" data-target="#review-modal">Completed</a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <!-- review-modal Modal -->
               <div class="modal fade theme-modal" id="review-modal">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <!-- Modal body -->
                        <div class="modal-body ">
                           <div class="prj-review">
                              <div class="rtang-part">
                                 <h6>Write Your Own Review</h6>
                                 <div class="rating-bx">
                                    <h4>How do you rate this Project? Select the number of stars as your rating</h4>
                                    <div class="rating-row">
                                       <!-- <p><span class="rt-type">Value</span> 
                                          <span class="strs-rate">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star" aria-hidden="true"></i>
                                              <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                              <i class="fa fa-star-o" aria-hidden="true"></i>       
                                          </span>
                                          </p> -->
                                       <div class="rt-type">Service </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             <input class="star star-5" id="service-review-5" type="radio" name="star">
                                             <label class="star star-5" for="service-review-5"></label>
                                             <input class="star star-4" id="service-review-4" type="radio" name="star">
                                             <label class="star star-4" for="service-review-4"></label>
                                             <input class="star star-3" id="service-review-3" type="radio" name="star">
                                             <label class="star star-3" for="service-review-3"></label>
                                             <input class="star star-2" id="service-review-2" type="radio" name="star">
                                             <label class="star star-2" for="service-review-2"></label>
                                             <input class="star star-1" id="service-review-1" type="radio" name="star">
                                             <label class="star star-1" for="service-review-1"></label>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="rating-row">
                                       <div class="rt-type">Value </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             <input class="star star-5" id="value-review-5" type="radio" name="star">
                                             <label class="star star-5" for="value-review-5"></label>
                                             <input class="star star-4" id="value-review-4" type="radio" name="star">
                                             <label class="star star-4" for="value-review-4"></label>
                                             <input class="star star-3" id="value-review-3" type="radio" name="star">
                                             <label class="star star-3" for="value-review-3"></label>
                                             <input class="star star-2" id="value-review-2" type="radio" name="star">
                                             <label class="star star-2" for="value-review-2"></label>
                                             <input class="star star-1" id="value-review-1" type="radio" name="star">
                                             <label class="star star-1" for="value-review-1"></label>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="rating-row">
                                       <div class="rt-type">Time </div>
                                       <div class="strs-rate stars">
                                          <form action="">
                                             <input class="star star-5" id="time-review-5" type="radio" name="star">
                                             <label class="star star-5" for="time-review-5"></label>
                                             <input class="star star-4" id="time-review-4" type="radio" name="star">
                                             <label class="star star-4" for="time-review-4"></label>
                                             <input class="star star-3" id="time-review-3" type="radio" name="star">
                                             <label class="star star-3" for="time-review-3"></label>
                                             <input class="star star-2" id="time-review-2" type="radio" name="star">
                                             <label class="star star-2" for="time-review-2"></label>
                                             <input class="star star-1" id="time-review-1" type="radio" name="star">
                                             <label class="star star-1" for="time-review-1"></label>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="review-bx">
                                    <form>
                                       <div class="form-group">
                                          <h4>Summary</h4>
                                          <input type="text" name="" value="" class="form-control">
                                       </div>
                                       <div class="form-group">
                                          <h4>Review</h4>
                                          <textarea class="form-control" ></textarea>
                                       </div>
                                       <div class="form-group">
                                          <input type="submit" name="" value="Submit" class="flt-search">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="detail-content prj-status">
                  <div class="row">
                    <div class="col-md-12 text-center">
                       <h5>Trademark Search Services</h5>                     
                       <h6><span>Project Status :</span><label>progress </label></h6>
                       <h6><span>Date :</span><label>20/04/2020</label></h6>
                        <p class="top-prsp-btn text-center"><span><a href="javascript:void(0)" class="dt-btn cmplted-btn">Completed</a></span> </p>                    
                   
                    </div> 
                  
                    <div class="col-md-12 prj-review">                     
                           <div class="rtang-part">
                             <h6>Write Your Own Review</h6>
                            
                             <div class="rating-bx">
                              <h4>How do you rate this Project? Select the number of stars as your rating</h4> 
                             <p><span class="rt-type">Service </span>
                              <span class="strs-rate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>       
                              </span>
                             </p>  
                  
                              <p><span class="rt-type">Value</span> 
                              <span class="strs-rate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>       
                              </span>
                             </p>
                  
                              <p><span class="rt-type">Time</span> 
                              <span class="strs-rate">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                  <i class="fa fa-star-o" aria-hidden="true"></i>       
                              </span>
                             </p>                           
                                                          
                               </div>
                  
                               <div class="review-bx">
                                <form>
                                  <div class="form-group">
                                    <h4>Summary</h4> 
                                   <input type="text" name="" value="" class="form-control">
                                  </div>
                  
                                  <div class="form-group">
                                    <h4>Review</h4> 
                                  <textarea class="form-control" ></textarea>
                                  </div>
                  
                                   <div class="form-group">
                                    <input type="submit" name="" value="Submit" class="flt-search">
                                  </div>
                                   
                                </form>
                                 
                               </div>
                           </div>
                        
                    </div>                 
                    
                  </div> 
                              
                  </div> -->                 
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
<?php include ("inc/footer.php") ?>