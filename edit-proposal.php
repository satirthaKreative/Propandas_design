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
            <h3 class="fs-title">Edit proposal</h3>
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

            <div class="table-responsive theme-table">
            <table class="table table-striped ">
               <thead>
              <tr>
                <th>Project Id</th>
                <th>Client Name</th>
                <th>Lawyer Name</th>               
              </tr>
            </thead>
            <tbody>
               <tr>
               <td>PROPAN00002</td>
               <td>Robert Hooks</td>
               <td>Daniel Schwarzl</td>            
             </tr>          
            </tbody>

            </table>
         </div>           
               <div class="dsbrd-qststep">
                        <form action="">                         

                           <div class="step-box proposal-form">
                           	<div class="form-group">                           		
                           		<label class="title-lable">Lawyer  Description</label>
                                    <input type="text" name="" value="Business Lawyers" >   
                           	</div>

                           	<div class="form-group">
                           		<label class="title-lable">Project description</label>
                                    <textarea name="" id=""></textarea>    
                           	</div>                           	

                           	<div class="form-group">
                           		<label class="title-lable">Billing Option</label>                           		                                 
                                     <label><input type="radio" name="optradio" checked="">Fixed Rate</label> 
                                     <label><input type="radio" name="optradio">Hourly Rate</label>  
                           	</div>

                           	<div class="form-group">                           		   
                           		   <label class="title-lable">Billing Rate</label>  
                                    <input type="text" name="" value="$100" >   
                           	</div>
                           	<div class="form-group">
                           	<input type="submit" name="" value="Submit Proposal" class="flt-search">
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
<?php include ("inc/footer.php") ?>