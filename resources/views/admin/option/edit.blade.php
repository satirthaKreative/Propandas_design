@extends('layouts.backendLayouts.app')
@section('content')
<!-- Question Show Page -->
<section class="content-header">
    <h1>
        Option's Detail View
        <small>preview of detail view</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Detail View</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">View Details</h3> <span class="float-right-btn"><a href="{{ route('admin-option.index') }}" class="btn btn-sm btn-success text-white">Detail View</a></span>
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
                    @foreach($cate1 as $catedt)
                    <form action="{{ route('admin-option.update',$catedt->mainID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>Question Type:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <select type="text" class="form-control" name="question_type" >
                                    @foreach($mainCd as $main_ct)
                                        <option value="{{ $main_ct->id }}" <?php if($main_ct->id == $catedt->ques_id) { echo 'selected'; } ?> >{{ $main_ct->question_name }}</option>
                                    @endforeach
                                </select>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Option Description:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control" name="question_description" rows="10">{{ $catedt->option_label }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Submit</button>
                        </div>
                    </form> 
                    @endforeach
                        <!-- <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Submit</button>
                        </div> -->  
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!-- /.col (left) -->
    </div>
</section>
@endsection