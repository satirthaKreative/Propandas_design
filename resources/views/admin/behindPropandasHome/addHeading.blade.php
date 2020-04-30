@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Behind Propandas Heading Add
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Behind Propandas Heading</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Behind Propandas Heading Form</h3> <span class="float-right-btn"><a href="{{ url('/behindpropandas') }}" class="btn btn-sm btn-success text-white">View Behind Propandas Heading</a></span>
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
                    <form action="{{ url('behindpropandasheading') }}" method="post" >
                        @csrf
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Heading Details Of Behind Propandas :</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control" rows="10" name="heading_name" required=""></textarea>
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