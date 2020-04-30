@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        "How it works" Add
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">"How it works"</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">"How it works" Form</h3> <span class="float-right-btn"><a href="{{ url('/howitwork') }}" class="btn btn-sm btn-success text-white">View "How it works"</a></span>
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
                    <form action="{{ url('howitwork') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Heading Title:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="heading_title" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control"  id="docx-show-details" name="descriptions" rows="10"></textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Years count:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="year_count" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>Years count:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="year_text" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>Contact:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="contact_no" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                            <label>Contact Text:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="contact_text" required="">
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        

                        <div class="form-group">
                            <label>Upload File:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <input type="file" name="howit_images" class="form-control" required="">
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