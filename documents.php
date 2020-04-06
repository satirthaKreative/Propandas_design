<?php include ("inc/header.php") ?>
<section class="dshbord-theme">
  <div class="container">
    <div class="row">
      <div class="col-md-12 sd-icon">
        <div class="ic-menu">
          <div class="icn-lst">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
          <div class="dsh-menu">
            <ul>
              <li><a href="javascript:void(0)">Dashboard</a></li>
              <li><a href="javascript:void(0)">Messages</a></li>
              <li><a href="javascript:void(0)">Documents</a></li>
              <li><a href="javascript:void(0)">My Jobs</a></li>
              <li><a href="javascript:void(0)">Invoices</a></li>
              <li><a href="javascript:void(0)">Transactions</a></li>
              <li><a href="javascript:void(0)">System Messages</a></li>
              
            </ul>
          </div>
        </div>
        <h3 class="fs-title">Documents</h3>
        <div class="custom-file theme-upload">
          <input type="file" class="custom-file-input" id="customFile" name="filename">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <hr>
      </div>
    </div>
    <div class="docs-list">
      <div class="docs-cnt-header">
        <div class="row flex-row-reverse">
        <div class="col-sm-5 col-xs-12 col-md-4 ">
          <form>
            <input type="text" name="" id="" class="form-control" placeholder="Search Documents">
          </form>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-8 ">
          <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">

            <a class="nav-item nav-link active " data-toggle="tab" href="#view_all" role="tab" aria-selected="true">View All</a>

            <a class="nav-item nav-link" data-toggle="tab"  href="#client-tab" role="tab" aria-selected="false">View by Client
</a>

            <a class="nav-item nav-link" data-toggle="tab"  href="#view-jobs" role="tab" aria-selected="false">View by Job</a>
                     
          </div>
        </div>
      </div>
      </div>

      <div class="docs-container">
        <div class="tab-content theam-tab">
         <div id="view_all" class="tab-pane fade  show active">
          <h3>Qui dolorem ipsum quia dolor</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
          <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
          <ul>
            <li>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</li>
            <li>consectetur, adipisci velit, sed quia non numquam eius</li>
            <li>modi tempora incidunt ut labore et dolore magnam</li>
          </ul>
         </div>
         <div id="client-tab" class="tab-pane fade ">
         <div class="no-convertion">
               <p>No conversation found</p>
            </div>
         </div>
         <div id="view-jobs" class="tab-pane fade">
          <div class="no-convertion">
               <p>No conversation found</p>
            </div>
         </div>
         
       </div>
      </div>
      
      
    </div>
    
    
    
    
  </div>
</section>
<!-- end of dshbord-theme -->
<?php include ("inc/footer.php") ?>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
var fileName = $(this).val().split("\\").pop();
$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>