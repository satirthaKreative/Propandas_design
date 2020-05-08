@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Terms
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Terms Update Form </li>
    </ol>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">Terms Info</h3>
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
    	            <form action="{{ url('/terms/'.$tot->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Terms Details:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="terms" rows="5" placeholder="Enter first address">{{ $tot->terms }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                       
                        

                        <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Update Propandas Terms</button>
                        </div>   
                    </form>
                    @endforeach
    	        </div><!-- /.box-body -->

    	    </div><!-- /.box -->

    	</div><!-- /.col (left) -->
    </div>
</section>

@endsection