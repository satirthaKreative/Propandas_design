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
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">CLIENT BUSINESS </h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               <ul>
                  <li class="active"><a href="javascript:void(0)"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comments" aria-hidden="true"></i>Messages</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file-text" aria-hidden="true"></i>Documents</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-briefcase" aria-hidden="true"></i>Posted Jobs</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-exchange" aria-hidden="true"></i>Transactions</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true"></i>System Messages</a></li>
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
                           <th>Start Date</th>
                           <th>End Date</th>
                           <th>Status</th>
                           <th>Action</th>
                          
                        </tr>
                     </thead>
            <tbody> 

            <tr>
           <td>01</td>
            <td>PROPAN441010</td>
            <td>July 05,2020</td>
            <td>July 08,2020</td>
            <td><span class="job-status in-progress">In Progress</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange = "addModal()" >
                   <option selected="selected" value="" >Status</option>
                   <option value="" >Proposal</option>
                   <option value="">Initiated</option>
                   <option value="">In Progress</option>
                   <option value="">Completed </option>
                   <option value="">Closed</option>                                      
                </select>
              </td>            
          </tr>

        <tr>
           <td>02</td>
            <td>PROPAN441010</td>
            <td>July 04,2020</td>
            <td>July 07,2020</td>
            <td><span class="job-status completed">Completed</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange = "addModal()">
                   <option selected="selected" value="" >Status</option>
                   <option value="">Proposal</option>
                   <option value="">Initiated</option>
                   <option value="">In Progress</option>
                   <option value="">Completed </option>
                   <option value="">Closed</option>                                      
                </select>
              </td>            
          </tr>






          <tr>
           <td>03</td>
            <td>PROPAN441014</td>
            <td>July 05,2020</td>
            <td>July 08,2020</td>
            <td><span class="job-status initiated">Initiated</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange = "addModal()">
                   <option selected="selected" value="">Status</option>
                   <option value="">Proposal</option>
                   <option value="">Initiated</option>
                   <option value="">In Progress</option>
                   <option value="">Completed </option>
                   <option value="">Closed</option>                                      
                </select>
              </td>            
          </tr>

        <tr>
           <td>04</td>
            <td>PROPAN441020</td>
            <td>July 11,2020</td>
            <td>July 15,2020</td>
            <td><span class="job-status proposal">Proposal</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange = "addModal()">
                   <option selected="selected" value="">Status</option>
                   <option value="">Proposal</option>
                   <option value="">Initiated</option>
                   <option value="">In Progress</option>
                   <option value="">Completed </option>
                   <option value="">Closed</option>                                      
                </select>
              </td>            
          </tr>


        <tr>
           <td>05</td>
            <td>PROPAN441020</td>
            <td>July 15,2020</td>
            <td>July 20,2020</td>
            <td><span class="job-status closed">Closed</span></td>           
            <td>
               <select name="type" id="" class="form-control shrt-control" aria-hidden="true" onchange = "addModal()">
                   <option selected="selected" value="">Status</option>
                   <option value="">Proposal</option>
                   <option value="">Initiated</option>
                   <option value="">In Progress</option>
                   <option value="">Completed </option>
                   <option value="">Closed</option>                                      
                </select>
              </td>            
          </tr>

         
          
            </tbody>

         	</table>
         </div>        
               
            </div>
         </div>
      </div>
   </div>

<!-- accept-soon Modal -->
   <div class="modal fade theme-modal green-mdl-text" id="modal_id">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->          

            <div class="modal-body text-center">
               <div class="center-part">
                  <h3><span><img src="images/logo.png" alt="logo" class="modal-logo"></span>Are you sure</h3>   
                   <h6>To Confirm This Action?</h6>
                   <p>
                    <span><a href="#" class="short-anchr">Yes</a></span>
                    <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal">No</a></span>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>
<!-- end of dshbord-theme -->
<?php include ("inc/footer.php") ?>

<script>
  function addModal(){
  $("#modal_id").modal('show');

   setTimeout(function(){ $("#modal_id").modal('hide'); }, 10000);
}</script>

<script type="text/javascript">
  
</script>

<script type="text/javascript">
  $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();
     $(".close-modal").click( function(){
         $("#modal_id").modal('hide');
     });    
   });
</script>