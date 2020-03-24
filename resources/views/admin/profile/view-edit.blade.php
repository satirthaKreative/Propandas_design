@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Profile
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Forms</a></li>
        <li class="active">Profile Forms</li>
    </ol>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">Profile Details</h3> 
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
                    @foreach($myProfile as $myP)
    	            <form action="{{ route('admin-profile.update',$myP->id) }}"  enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        	<div class="profile-img">
                        		@if($myP->admin_img != '')
                            		<img src="{{ asset($myP->admin_img) }}" alt=""/>
                            	@else
									<img src="{{ asset('backendAssets/img/avatar5.png') }}" alt=""/>
                            	@endif
                            	<div class="file btn btn-lg btn-primary">
                                	Change Photo
                                	<input type="file" name="upload"/>
                            	</div>
                        	</div>
                        </div>
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Profile Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="text" value="{{ $myP->name }}" class="form-control" name="profile_name" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Admin Login Credentail Email:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" class="form-control" value="{{ $myP->email }}" name="admin_email" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Admin Password Recovery Email:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input type="email" class="form-control" name="recovery_email" value="{{ $myP->recovery_email }}" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Submit</button>
                        </div>   
                    </form>
                    @endforeach
    	        </div><!-- /.box-body -->

    	    </div><!-- /.box -->

    	</div><!-- /.col (left) -->

    	<!-- Re-enter password -->
			<div class="col-md-6">

			    <div class="box box-danger">
			        <div class="box-header">
			            <h3 class="box-title">Change Password</h3> 
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

		                @if($message = Session::get('success_pass'))
		                    <div class="alert alert-success">
		                        <strong>{{ $message }}</strong>
		                    </div>
		                @endif
			            <form action="{{ route('admin-profile.edit',$myP->id) }}" method="get">
		                    @csrf

		                    <!-- phone mask -->
		                    <div class="form-group">
		                        <label>New Password:</label>
		                        <div class="input-group">
		                            <div class="input-group-addon">
		                                <i class="fa fa-eye"></i>
		                            </div>
		                            <input type="password" class="form-control" placeholder="Enter Password" value="" name="p_pass" />
		                        </div><!-- /.input group -->
		                    </div><!-- /.form group -->

		                    <!-- phone mask -->
		                    <div class="form-group">
		                        <label>Confirm Password:</label>
		                        <div class="input-group">
		                            <div class="input-group-addon">
		                                <i class="fa fa-eye"></i>
		                            </div>
		                            <input type="password" class="form-control" placeholder="Re-enter Password" value="" name="cp_pass" />
		                        </div><!-- /.input group -->
		                    </div><!-- /.form group -->

		                    <div class="clearfix">
		                        <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Submit</button>
		                    </div>   
		                </form>
			        </div><!-- /.box-body -->

			    </div><!-- /.box -->

			</div><!-- /.col (left) -->
    	<!-- /Re-enter Password -->
    </div>
</section>
@endsection