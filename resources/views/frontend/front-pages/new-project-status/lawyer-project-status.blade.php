@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">BUSINESS LAWYERS</h3>
            <hr>
         </div>
         <div class="col-md-3">
            <div class="side-menu">
               @include('frontend.front-pages.lawyer.include.sidebar')
               <?php

                $link = $_SERVER['REQUEST_URI']; // PHP_SELF
                $link_array = explode('/',$link);
                $get_arg_id = base64_decode(end($link_array));
                ?>
            </div>
         </div>
         <!-- end of col-md-3 -->
         <div class="col-md-9">
            <div class="dsbrd-content">  
            <div class="src-filter ">
                        <form action="">
                           <div class="row">
                              <div class="col-md-4 plr-5">
                                 <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="type" id="type" class="form-control" aria-hidden="true">
                                       <option selected="selected" value="mine">Select Status</option>
                                       <option value="">In Progress</option>
                                       <option value="">Completed</option>
                                       <option value="">Initiated</option>
                                       <option value="">Proposal</option>
                                       <option value="">Closed</option>                                      
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 plr-5">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <select name="type" id="type" class="form-control" aria-hidden="true">
                                       <option selected="selected" value="mine">Select Month</option>
                                       <option value="">April</option>
                                       <option value="">May</option> 
                                       <option value="">June</option>
                                       <option value="">July</option> 

                                    </select>
                                 </div>
                              </div>
                              

                               <div class="col-md-4 plr-5">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="submit" name="" value="Search" class="flt-search">
                                 </div>
                              </div>
                           </div>
                           
                        </form>
                     </div>         
         <div class="table-responsive theme-table prj-list-table">
         	<table class="table table-striped ">
         		<thead>
                        <tr>
                           <th>Sr No</th>
                           <th>Project Name</th>
                           <th>Client Name</th>
                           <th>Start Date</th>
                           <th>Status</th> 
                        </tr>
                     </thead>
            <tbody> 
              <tr class="table-data-loding">
                                <td colspan="6">
                                    <i class="fa fa-spinner"></i> Loading Data's
                                </td>
                              </tr>

            <tr>
           <td>01</td>
            <td>PROPAN441010</td>
            <td>Roger</td>
            <td>July 05,2020</td>
            <td><span class="job-status in-progress">In Progress</span></td> 
                        
          </tr>

          <tr>
           <td>02</td>
            <td>PROPAN441010</td>
            <td>Robert Hooks</td>
            <td>July 05,2020</td>
            <td><span class="job-status completed">Completed</span></td> 
                        
          </tr>

          <tr>
           <td>03</td>
            <td>PROPAN441010</td>
            <td>William David</td>
            <td>July 05,2020</td>
            <td><span class="job-status initiated">Initiated</span></td> 
                        
          </tr>

          <tr>
           <td>04</td>
            <td>PROPAN441010</td>
            <td>Sara Najjar</td>
            <td>July 05,2020</td>
            <td><span class="job-status proposal">Proposal</span></td> 
                        
          </tr>
          <tr>
           <td>05</td>
            <td>PROPAN441010</td>
            <td>Mitri Valentine</td>
            <td>July 05,2020</td>
            <td><span class="job-status closed">Closed</span></td> 
                        
          </tr>


          

          

       

         
          
            </tbody>

         	</table>
         </div>        
               
            </div>
         </div>
      </div>
   </div>
</section>
<!-- end of dshbord-theme -->
@endsection
@section('pagewishjs')
<script type="text/javascript">
  $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();     
   });
</script>
@endsection