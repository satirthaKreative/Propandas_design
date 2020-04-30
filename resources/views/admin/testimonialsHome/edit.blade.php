@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Testimonials Add
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Testimonials</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Testimonials Form</h3> <span class="float-right-btn"><a href="{{ url('/testimonials') }}" class="btn btn-sm btn-success text-white">View Testimonials</a></span>
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
                    @if($message1 = Session::get('error_message'))
                        <div class="alert alert-danger">
                            <strong>{{ $message1 }}</strong>
                        </div>
                    @endif
                    @foreach($totalResult as $cateData)
                    <form action="{{ url('/testimonials/'.$cateData->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Client Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" value="{{ $cateData->client_name }}" name="client_name" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Client Designation:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" value="{{ $cateData->client_designation }}" name="client_designation" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        

                        <div class="form-group">
                            <label>Upload Client Image:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="file" name="client_img" class="form-control" >
                            </div><!-- /.input group -->
                            <img src="{{ asset($cateData->client_img) }}" style="width: 150px;" alt="">
                        </div><!-- /.form group -->

                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Client Comment:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control" name="client_comment" rows="10">{{ $cateData->client_comment }}</textarea>
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