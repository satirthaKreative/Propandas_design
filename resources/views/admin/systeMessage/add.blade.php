@extends('layouts.backendLayouts.app')
@section('content')
<!-- Question add -->
<section class="content-header">
    <h1>
        System Message Add
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">System Message Forms</li>
    </ol>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">System Message</h3> <span class="float-right-btn"><a href="{{ route('admin-question.index') }}" class="btn btn-sm btn-success text-white">View System Message</a></span>
    	        </div>
    	        <div class="box-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
    	            <form action="{{ url('/admin/system-message/create-project') }}" method="post">
                        @csrf
						<!-- Users Type -->
                        <div class="form-group">
                            <label>User Type:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <select onchange="change_client_type()" class="form-control" name="client_or_lawyer_type" id = "user_type_id" required="" />
                                    <option value="">Enter user type</option>
                                    <option value="0">Client</option>
                                    <option value="1">Lawyer</option>
                                </select>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        
						<div class="form-group user-name-div-class">
                            <label>User Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <select class="form-control" onchange="user_check_name()" name="client_or_lawyer_id" id = "user_names_id" required="" />
                                	<option value="">First Select User Type</option>
                                </select>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- User Names -->
                        <div class="form-group project-name-class">
                            <label>Project Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="text" class="form-control" name="project_name" placeholder="Enter project name" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        

                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Administrator System Message:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea required="" class="form-control" name="administrator_msg" rows="10"></textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Submit</button>
                        </div>   
                    </form>
    	        </div><!-- /.box-body -->

    	    </div><!-- /.box -->

    	</div><!-- /.col (left) -->
    </div>
</section>
@endsection
@section('adminPageWishJs')
	<!-- client type -->

		<script type="text/javascript">
			function change_client_type()
			{
				var u_id = $("#user_type_id").val();

				$.ajax({
					url: '/admin/system-message/ajax',
					type: 'GET',
					data: {u_id: u_id},
					dataType: 'json',
					success:  function(event){
						var html ='';

						if(u_id == 1){
							var user_types = 'Lawyer Names:';
							var users_name_type = 'lawyer';
						}else if(u_id == 0){
							var user_types = 'Client Names:';
							var users_name_type = 'client';
						}

						html += '<option value="">Choose a '+users_name_type+' name</option>';
						for(var i=0; i < event.length; i++)
						{
							html += '<option value="'+event[i].id+'">'+event[i].name+' '+event[i].lname+'</option>';
						}

						$(".user-name-div-class label").html(user_types);
						$("#user_names_id").html(html);
					}, error:  function(event){

					}
				})
			}

			function user_check_name()
			{
				var user_name_id = $("#user_names_id").val();

				$.ajax({
					url: '/admin/system-message/ajax-project',
					type: 'GET',
					data: {user_name_id:  user_name_id},
					dataType: 'json',
					success:  function(event){
						$(".project-name-class").html(event);
					}, error:  function(event){

					}
				})
			}
		</script>

	<!-- client type end -->
@endsection