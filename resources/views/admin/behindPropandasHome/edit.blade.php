@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Behind Propandas Update
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Behind Propandas</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Behind Propandas Form</h3> <span class="float-right-btn"><a href="{{ url('/behindpropandas') }}" class="btn btn-sm btn-success text-white">View Behind Propandas</a></span>
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
                    <form action="{{ url('/behindpropandas/'.$cateData->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Upload Owner Image:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="file" name="behind_propandas_images"  class="form-control" >
                            </div><!-- /.input group -->
                            <img src="{{ asset($cateData->behind_propandas_images) }}" style="width: 150px;" alt="">
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Owner Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <input type="text" class="form-control" value="{{ $cateData->owner_name }}" name="owner_name" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Owner Designation:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" value="{{ $cateData->designation }}" name="designation" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Owner Professional Details:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <textarea class="form-control" name="behind_propandas_pdetails" rows="10">{{ $cateData->behind_propandas_pdetails }}</textarea>
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