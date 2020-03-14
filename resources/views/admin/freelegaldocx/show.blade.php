@extends('layouts.backendLayouts.app')
@section('content')
<!-- category Show Page -->
<section class="content-header">
    <h1>
        @foreach($searchShow as $seShow)
        {{ $seShow->category_name }}
        @endforeach
        's Detail View
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
        @foreach($searchShow as $seShow)
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">View Details Of Document</h3> <span class="float-right-btn"><a href="{{ route('admin-freelegaldoc.index') }}" class="btn btn-sm btn-success text-white">All Docx View</a></span>
    	        </div>
    	        <div class="box-body">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>Category Name:</label>
                            <div class="input-group">
                                <div class="input-group-addon bg-white">
                                    <i class="fa fa-list"></i>
                                </div>
                                <input type="text" class="form-control" name="category_name" value="{{ $seShow->category_name }}"  readonly="readonly" />
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <!-- phone mask -->
                        @if($seShow->is_upload == 1)
                        <div class="form-group">
                            <label>File Uploaded:</label>
                            <div class="input-group">
                                @if($seShow->uploaded_type == 'png' || $seShow->uploaded_type == 'jpeg' || $seShow->uploaded_type == 'jpg' || $seShow->uploaded_type == 'webp' || $seShow->uploaded_type == 'gif' )
                                    @php $file_type = "backendAssets/img/image.png" @endphp
                                @else
                                    @php $file_type = "backendAssets/img/document.png" @endphp
                                @endif
                                <a href="{{ asset($seShow->uploaded_path) }}" target="_blank"><img src="{{ asset($file_type) }}" class="doc-img" alt=""></a>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        @endif
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <div class="input-group-addon bg-white">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea class="form-control" name="category_description"  id="docx-show-details" readonly="readonly"  rows="10">{{ $seShow->uploaded_text }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                         
    	        </div><!-- /.box-body -->

    	    </div><!-- /.box -->

    	</div><!-- /.col (left) -->
        @endforeach
    </div>
</section>
@endsection