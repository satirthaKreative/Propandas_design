@extends('layouts.frontendLayouts.app')
@section('content')
<section class="dshbord-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="fs-title">Invoice</h3>
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
               <div class="table-responsive theme-table prj-list-table">
                  <table class="table table-striped ">
                     <thead>
                        <tr>
                           <th>Project List</th>
                           <th>Project Name</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="client-invoice-id">
                        <tr>
                           <td colspan="4"> <center><i class="fa fa-spinner"></i> Loading Data's</center></td>
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
<script>
  $(function(){
    page_load_lawyer_invoice();
  });
    

  function page_load_lawyer_invoice(){
      $.ajax({
        url: "/lawyer_page_invoice_load",
        type: "GET",
        dataType: "json",
        success: function(event)
        {
            if(event.msg == "data")
            {
              $("#client-invoice-id").html(event.main_html);         
            }
            else if(event.msg == "no_data")
            {
              $("#client-invoice-id").html(event.main_html); 
            }
        },
        error: function(event)
        {

        }
      })
  }
</script>
@endsection