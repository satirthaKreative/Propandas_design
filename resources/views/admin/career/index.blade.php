@extends('layouts.backendLayouts.app')
@section('content')
<!-- Question Table -->
<section class="content-header">
    <h1>
        Career View
        <small>preview of Career table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/admin/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Career</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">Career Table</h3> <span class="float-right-btn"></span>
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
    	                    <th>Client Name</th>
    	                    <th>Client Email</th>
                            <th class="w30">Message</th>
    	                    <th>client contact</th>
    	                    <th>Action</th>
    	                    <!-- <th style="width: 40px">Label</th> -->
    	                </tr>
                        @if(count($categoryData)>0)
                            @foreach($categoryData as $cateData)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $cateData->fname }} {{ $cateData->lname }}</td>
                                <td>{{ $cateData->email }}</td>
                                <td>
                                    @if(strlen($cateData->msg)>100)
                                        {{ substr($cateData->msg,0,100)."... " }}<a href='javascript: ;' onclick="career_full_details({{ $cateData->id }})"><i class='fa fa-eye'></i></a>
                                        @else
                                            {{ $cateData->msg }}
                                    @endif
                                </td>
                                <td>
                                    {{ $cateData->phn_num }}
                                </td>
                                <td>
                                    <span class="text-danger">
                                        <a href="javascript: ;" onclick="delete_career({{ $cateData->id }})">
                                            <i class="fa fa-trash-o" aria-hidden="true" style="color: red"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-warning"><center><i class="fa fa-times"></i> No Question inserted yet!</center></td>
                            </tr>
                        @endif
    	            </table>
    	        </div><!-- /.box-body -->
                <div class="box-footer clearfix padding0">
                    <div class="float-right ">
                        {{ $categoryData->links() }}
                    </div>
                </div>
    	        <!-- <div class="box-footer clearfix">
    	            <ul class="pagination pagination-sm no-margin pull-right">
    	                <li><a href="#">&laquo;</a></li>
    	                <li><a href="#">1</a></li>
    	                <li><a href="#">2</a></li>
    	                <li><a href="#">3</a></li>
    	                <li><a href="#">&raquo;</a></li>
    	            </ul>
    	        </div> -->
    	    </div><!-- /.box -->

    	</div><!-- /.col -->
    </div>
</section>
<!-- The Career Modal -->
  <div class="modal" id="careerModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Career Query</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body careerModal-class">
          <i class="fa fa-spinner"></i> loading data...
        </div>
        
        
        
      </div>
    </div>
  </div>

<!-- /end of career modal -->

<!-- The Notification Career Modal -->
  <div class="modal" id="careerDeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Query</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body career-delete-modal">
          <div class="career-del-msg-class">
               <p>Are you really want to delete ?</p>
               <button type="button"  class="btn btn-success">Yes</button>
               <button type="button" class="btn btn-danger">No</button>
          </div>
        </div>
        
        
        
      </div>
    </div>
  </div>

<!-- /end of notification career modal -->

<script type="text/javascript">
    function career_full_details(id)
    {
        $.ajax({
            url: "/admin-career-ajax",
            type: "GET",
            data: {id: id},
            dataType: "json",
            success:  function(event_res)
            {
                $(".careerModal-class").html("<p>"+event_res+"</p>");
            },
            error: function(event_res)
            {
                $("#careerModal .modal-body").html("<p>Server down! No data comes from server! Check later</p>");
            }
        })
        $("#careerModal").modal('show');
    }

    function delete_career(id){
        $("#careerDeleteModal").modal('show');
        $("#careerDeleteModal  button:nth-child(2)").attr('onclick','yes_career_del('+id+')');
        $("#careerDeleteModal  button:nth-child(3)").attr('onclick','no_career_del()');
    }

    function no_career_del()
    {
        $("#careerDeleteModal").modal('hide');
    }

    function yes_career_del(id)
    {
        $.ajax({
            url: "/admin-career-delete-ajax",
            type: "GET",
            data: {id: id},
            dataType: "json",
            success:  function(event_res)
            {
                if(event_res.msg == 'success')
                {
                    $("#succ-modal").modal('show');
                    $("#careerDeleteModal").modal('hide');
                    setTimeout(function(){ $("#succ-modal").modal('hide'); location.reload();}, 3000);
                }
                else if(event_res.msg == 'error')
                {
                    $("#danger-a-modal").modal('show');
                    $("#careerDeleteModal").modal('hide');
                    setTimeout(function(){ $("#danger-a-modal").modal('hide'); }, 3000);
                }
                
            },
            error: function(event_res)
            {
                $("#danger-a-modal").modal('show');
                setTimeout(function(){ $("#danger-a-modal").modal('hide'); }, 3000);
            }
        });
    }
</script>
@endsection