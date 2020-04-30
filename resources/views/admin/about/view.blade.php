@extends('layouts.backendLayouts.app')
@section('content')
<!-- Options Table -->
<section class="content-header">
    <h1>
        About Us View
        <small>preview of About Us table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">About-us</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">About-Us Table</h3> <span class="float-right-btn">
                    @if(count($aboutUsData))
                        <a href="javascript: ;"  onclick="updateModal()" class="btn btn-sm btn-success text-white">Edit About</a>
                        @else
                        <a href="javascript: ;"  onclick="addModal()" class="btn btn-sm btn-success text-white">Add About</a>
                    @endif
                    </span>
    	        </div><!-- /.box-header -->
    	        <div class="box-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
    	            <table class="table table-bordered table-striped table-reponsive">
    	                <tr>
    	                    <th style="width: 10px">#</th>
    	                    <th class="w20">Image</th>
    	                    <th>Title</th>
                            <th  class="w40">Description</th>
    	                </tr>
                        @if(count($aboutUsData))
                            @foreach($aboutUsData as $dataU)
                            <tr>
                                <td>
                                    1.
                                </td>
                                <td>
                                    <img src="{{ asset($dataU->about_image) }}" alt="" style="width:100px">
                                </td>
                                <td>
                                    {{ $dataU->about_title }}
                                </td>
                                <td>
                                    {{ $dataU->about_description }}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-warning"><center><i class="fa fa-times"></i> About Us Details Are Empty</center></td>
                            </tr>
                        @endif
    	            </table>
    	        </div><!-- /.box-body -->
                <div class="box-footer clearfix padding0">
                    <div class="float-right ">
                    </div>
                </div>
    	    </div><!-- /.box -->

    	</div><!-- /.col -->
    </div>
</section>
<!-- about modal -->
<div class="modal" id="about-us-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-about-data" enctype="multipart/form-data" method="POST">
            @csrf
          <div class="form-group">
            <label for="about-title">Title</label>
            <input type="text" required="required" name="title" class="form-control" id="about-title"  placeholder="Title">
          </div>
          <div class="form-group">
            <label for="about-image">Image</label>
            <input type="file" required="required" name="image" class="form-control" id="about-image" placeholder="Image">
          </div>
          <div class="form-group">
            <label for="about-des">Description</label>
            <textarea type="text" required="required" name="desc" class="form-control desc" id="docx-show-details" placeholder="Description"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / about modal -->
<!-- about modal -->
<div class="modal" id="about-us-modal1" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-about-data1" enctype="multipart/form-data" method="POST">
            @csrf
          <div class="form-group">
            <label for="about-title">Title</label>
            <input type="text" name="title" class="form-control" id="about-title"  placeholder="Title">
          </div>
          <div class="form-group">
            <label for="about-image">Image</label>
            <input type="file" name="image" class="form-control" id="about-image" placeholder="Image">
          </div>
          <div class="form-group">
            <label for="about-des">Description</label>
            <textarea type="text" name="desc" class="form-control desc" id="docx-show-details1" placeholder="Description" rows="10"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / about modal -->
<script>
    function addModal(){
        $("#about-us-modal").modal('show');
        $("#about-us-modal .modal-title").html("<h3>Add About Us</h3>");
    }
    function updateModal(){
        $("#about-us-modal1").modal('show');
        $("#about-us-modal1 .modal-title").html("<h3>Edit About Us</h3>");
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            url: '/showAboutDetails',
            type: 'GET',
            dataType: 'json',
            success: function(event){
                jQuery("#docx-show-details1").val(event[0].about_description);

                jQuery("#docx-show-details1").attr('id','docx-show-details2');
                CKEDITOR.replace( 'docx-show-details2' );

                jQuery("#about-us-modal1 #about-title").val(event[0].about_title);
            }, error: function(event){

            }
        })


    }

</script>

@endsection
