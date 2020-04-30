@extends('layouts.backendLayouts.app')
@section('content')
<!-- Category Options Table -->
<section class="content-header">
    <h1>
        Banner View
        <small>preview of banner table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Banner View</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">Banner Table</h3> <span class="float-right-btn"><a href="{{ url('/bannerAdd') }}" class="btn btn-sm btn-success text-white">Add Banner</a></span>
    	        </div><!-- /.box-header -->
    	        <div class="box-body">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
    	            <table class="table table-bordered table-striped table-reponsive">
    	                <tr>
    	                    <th style="width: 10px">#</th>
    	                    <th class="w20">Top title</th>
    	                    <th class="w20">Main title</th>
    	                    <th class="w20">Descriptions</th>
                            <th class="w20">Banner Image</th>
    	                    <th>Action</th>
    	                    <!-- <th style="width: 40px">Label</th> -->
    	                </tr>
                        @if(count($totalResult)>0)
                            @foreach($totalResult as $cateData)
                            <tr>
                                <td>1.</td>
                                <td>{{ $cateData->top_banner_title }}</td>
                                <td>{{ $cateData->main_banner_title }}</td>
                                <td>
                                    @if(strlen($cateData->title_description)>100)
                                        {{ substr($cateData->title_description,0,100)."..." }}
                                        @else
                                            {{ $cateData->title_description }}
                                    @endif
                                </td>
                                <td>
                                    <img style="width: 150px;" src="{{ asset($cateData->banner_images) }}" alt="">
                                </td>
                                <td>
                                    <form action="{{ url('/banner/'.$cateData->id) }}" method="post">
                                        <a href="{{ url('/banner/'.$cateData->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-warning"><center><i class="fa fa-times"></i> No data in table yet!</center></td>
                            </tr>
                        @endif
    	            </table>
    	        </div><!-- /.box-body -->
                
    	    </div><!-- /.box -->

    	</div><!-- /.col -->
    </div>
</section>
@endsection