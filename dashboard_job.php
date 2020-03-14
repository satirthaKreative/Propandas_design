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
            <div class="dsbrd-content">
               <h6>Recent Jobs</h6>
               <ul>
                  <li>
                     <div class="src-filter">
                        <form action="">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="">Filter Jobs</label>
                                    <select name="type" id="type"  class="form-control" aria-hidden="true">
                                       <option selected="selected" value="mine">Jobs I Posted</option>
                                       <option value="in_progress">In Progress</option>
                                       <option value="completed">Completed</option>
                                       <option value="abandoned">Canceled</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="">Search Jobs</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="Search for jobs by title...">
                                 </div>
                              </div>
                           </div>
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
                        </form>
                     </div>
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
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
<?php include ("inc/footer.php") ?>