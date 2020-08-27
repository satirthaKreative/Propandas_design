@extends('layouts.backendLayouts.app')
@section('content')
<style>
	/*modal design*/
	.backend-form-modal .modal-body h4{
		text-transform: capitalize;
	    color: #000000;
	    font-size: 16px;
	    width: 100%;
	    text-align: center;
	    margin: 0 auto;
	    line-height: 27px;
	    margin-bottom: 10px;
	    letter-spacing: 0;
	    font-weight: 500;
		}

	.backend-form-modal .modal-body span.icon-sign i {
	    display: block;
	    margin-bottom: 10px;
	    font-size: 66px;
	    color: #08256f;
	}


	.backend-form-modal .modal-logo img{
	    display: block;
	    margin: 0 auto;
	    margin-bottom: 20px;
	    max-width: 90px;
	    margin-top: 25px;
	}


	.backend-form-modal .modal-body .short-anchr {
	    background: #279ce0;
	    color: #fff !important;
	    padding: 6px 25px;
	    font-size: 14px;
	    min-width: 110px;
	    line-height: 22px;
	    border-radius: 0px;
	    text-decoration: none !important;
	    display: inline-block;
	    transition: 1s;
	    margin: 3px;
	    margin-top: 10px;
	    clear: both;
	}


	.backend-form-modal .modal-body .transparent-anchr {
	    background: transparent;
	    border: solid 2px #bdbbbb;
	    color: #131313 !important;
	    text-decoration: none !important;
	}

</style>
<!-- Legal Document Table -->
<section class="content-header">
    <h1>
        Rental Agreement View
        <small>preview of Rental Agreement table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Rental Agreement</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">Rental Agreement Table</h3> <span class="float-right-btn"><a href="javascript: ;" onclick="add_agreement_modal()" class="btn btn-sm btn-success text-white">Add Agreement</a></span>
    	        </div><!-- /.box-header -->
    	        <div class="box-body">
    	            <table class="table table-bordered table-striped table-reponsive" id="legal-docx-value-show">
    	                <tr>
    	                    <th style="width: 10px">#</th>
    	                    <th>Title</th>
    	                    <th>Type</th>
    	                    <th>Action</th>
    	                </tr>
                        <tr >
                            <td colspan="4" class="text-info"><center><i class="fa fa-spinner"></i> Loading Rental Agreement</center></td>
                        </tr>
                                
                        
    	            </table>
    	        </div><!-- /.box-body -->
    	    </div><!-- /.box -->

    	</div><!-- /.col -->
    </div>
    <!-- modal -->

    <!-- The delete Confirm Modal -->
    <div class="modal fade backend-form-modal" id="delete-confirm-modal">
       <div class="modal-dialog">
          <div class="modal-content">
             <!-- Modal body -->          
             <div class="modal-body text-center">
                <div class="center-part">
                   <span class="modal-logo"><img src="http://propandas.com/frontAssets/images/logo.png" alt="logo"></span>
                   <h4>Are you sure to delete your legal document data</h4>
                   <p>
                      <span><a href="javascript: ;" class="short-anchr" id="delete-confirm-btn-id">Yes</a></span>
                      <span><a href="Javascript:void(0)" class="short-anchr transparent-anchr close-modal" data-dismiss="modal" aria-label="Close">No</a></span>
                   </p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- /End of delete confirm modal -->

    <div class="modal fade  backend-form-modal" id="form-modal" >
        <div class="modal-dialog">
           <div class="modal-content">
              <!-- Modal body -->
              <div class="modal-body ">
                 <div class="center-part">
                    <h3>Add Agreement details</h3>                
                    <form id="form-agreement-deails">
                       <div class="body-form">
                       	<div class="form-group">
                         <label>Legal Docx Title</label>
                        
                         <select class="form-control" id="title-id" name="title_id">
                         	<option value="">Choose a title</option>                       
                         </select>                    
                       </div>                   

                       <div class="form-group">
                          <label>Full Description</label> 
                          <textarea class="form-control big-height-text" id="editor1" name="editor1"></textarea>                        
                       </div>                    
                       
                       </div>

                       <input type="button" name="" value="Submit " onclick="CKupdate();agreement_submit()" class="info-btn">
                       
                    </form>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- success2 Modal -->
     <div class="modal fade backend-form-modal" id="success-save2">
        <div class="modal-dialog">
           <div class="modal-content">
              <!-- Modal body -->
              <div class="modal-body contact-modal-design text-center">
                 <div class="center-part">
                    <span class="icon-sign"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                    <h4>That legal document deleting successfully from propandas database</h4>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- success -->
     <div class="modal fade backend-form-modal" id="success-save">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body contact-modal-design text-center">
               <div class="center-part">
                  <span class="icon-sign"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                  <h4>Your agreement data save to propandas database</h4>
               </div>
            </div>
         </div>
      </div>
   </div>


</section>
@endsection
@section('adminPageWishJs')
<script>
	$(function(){
		loading_agreement_download();
		agreement_all_title();
	})

	function loading_agreement_download()
	{
		$.ajax({ 
			url: "/legal-agreement-show",
			type: 'GET',
			dataType: "json",
			success:  function(event)
			{
				jQuery("#legal-docx-value-show").html(event);
			},
			error: function(event)
			{

			}
		});
	}

	// asking for confirmation modal open

	function asking_modal(id)
	{
		$("#delete-confirm-btn-id").attr('onclick','final_confirm('+id+')');
		$("#delete-confirm-modal").modal('show');
	}


	function final_confirm(id)
	{
		$.ajax({
			url: '/deleting-legal-docx',
			type: 'GET',
			data: {legal_id: id},
			dataType: 'json',
			success: function(event){
				setTimeout(function(){ $("#delete-confirm-modal").modal('hide'); }, 500);
				setTimeout(function(){ $("#success-save2").modal('show'); }, 600);
				setTimeout(function(){ $("#success-save2").modal('hide'); loading_agreement_download(); }, 3000);
			}, error: function(event){

			}
		})
	}

	function add_agreement_modal()
	{
		$("#form-modal").modal('show');
	}

	function agreement_submit()
	{
		
		$.ajax({
			// headers: {
   //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
   //          },
			url: '/submit-legal-agreement-part',
			type: 'GET',
			data: $("#form-agreement-deails").serialize(),
			dataType: 'json',
			success: function(event){
				setTimeout(function(){ $("#form-modal").modal('hide'); }, 100);
				setTimeout(function(){ $("#success-save").modal('show'); }, 300);
				setTimeout(function(){ $("#success-save").modal('hide'); loading_agreement_download(); }, 3000);
			}, error: function(event){

			}
		})
	}

	function agreement_all_title()
	{
		$.ajax({
			url: '/agreement-all-title',
			type: 'GET',
			dataType: 'json',
			success: function(event){
				$("#title-id").html(event);
			}, error: function(event){

			}
		})
	}
</script>
<!-- ckeditor -->
<script>
  CKEDITOR.replace( 'editor1' );
  function CKupdate(){
      for ( instance in CKEDITOR.instances )
          CKEDITOR.instances[instance].updateElement();
  }
</script>
@endsection