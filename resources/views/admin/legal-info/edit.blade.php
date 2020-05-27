@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Legal Info
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Legal Info Update Form </li>
    </ol>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">Legal Info</h3>
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
                    @foreach($totalResult as $tot)
    	            <form action="{{ url('/legal-info/'.$tot->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Address1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="address_one" rows="5" placeholder="Enter first address">{{ $tot->address_one }}</textarea>
                            </div><!-- /.input group -->

                            <label>Google Link:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <textarea  required="required" class="form-control"  
                                name="google_link1" rows="2" placeholder="Enter This Google Address Link">{{ $tot->google_link1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                       
                        <div class="form-group">
                            <label>Address2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text" name="address_two" rows="5" placeholder="Enter second address">{{ $tot->address_two }}</textarea>
                            </div><!-- /.input group -->
                            <label>Google Link:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <textarea  required="required" class="form-control"  
                                name="google_link2" rows="2" placeholder="Enter This Google Address Link">{{ $tot->google_link2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Email:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <input type="email" required="required"  name="email_address" value="{{ $tot->email_address }}" class="form-control" id="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Contact Number:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <input type="text" required="required"  name="phone_number" value="{{ $tot->phone_number }}" class="form-control" id="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Heading:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <input type="text" required="required"  name="legal_heading" value="{{ $tot->legal_heading }}" class="form-control" id="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Heading Details:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text" name="heading_details" rows="5" placeholder="Enter details">{{ $tot->heading_details }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Copyright:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea required="required"  class="form-control legal-info-text" name="copyright" rows="10" placeholder="Enter copyright details">{{ $tot->copyright }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>External Links:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text" name="external_links" rows="10" placeholder="Enter external links">{{ $tot->external_links }}</textarea>
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
    </div>
</section>

@endsection