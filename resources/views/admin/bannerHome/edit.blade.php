@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Banner Add
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Banner</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Banner Form</h3> <span class="float-right-btn"><a href="{{ url('/banner') }}" class="btn btn-sm btn-success text-white">View Banner</a></span>
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
                    <form action="{{ url('/banner/'.$cateData->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Date dd/mm/yyyy -->
                        
                        <div class="form-group">
                            <label>Banner Top Title:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" value="{{ $cateData->top_banner_title }}" class="form-control" name="top_banner_title" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Banner Main Title:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="main_banner_title" required="" value="{{ $cateData->main_banner_title }}">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        

                        <div class="form-group">
                            <label>Upload File:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="file" name="banner_images"  class="form-control" >
                            </div><!-- /.input group -->
                            <img src="{{ asset($cateData->banner_images) }}" style="width: 150px;" alt="">
                        </div><!-- /.form group -->

                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control" name="title_description" rows="10">{{ $cateData->title_description }}</textarea>
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