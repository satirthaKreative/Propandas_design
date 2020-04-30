@extends('layouts.backendLayouts.app')
@section('content')
<!-- Category Options Table -->
<section class="content-header">
    <h1>
        "How it works" View
        <small>preview of "How it works" table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">"How it works" View</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">"How it works" Table</h3> 
                    <span class="float-right-btn">
                        @if(count($totalResult)>0)
                            <a href="{{ url('/howitwork/1') }}" class="btn btn-sm btn-success text-white">Update "How it works"</a>
                        @else
                            <a href="{{ url('/howitworkAdd') }}" class="btn btn-sm btn-success text-white">Add "How it works"</a>
                        @endif
                    </span>
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
    	                    <th >Heading Title</th>
    	                    <th class="w20">Descriptions</th>
                            <th >Count Year</th>
                            <th >Year Text</th>
                            <th >Contact Number</th>
                            <th >Contact Text</th>
                            <th >Image</th>
    	                    <!-- <th style="width: 40px">Label</th> -->
    	                </tr>
                        @if(count($totalResult)>0)
                            @foreach($totalResult as $cateData)
                            <tr>
                                <td>1.</td>
                                <td>{{ $cateData->heading_title }}</td>
                                <td >
                                    @if(strlen($cateData->descriptions)>100)
                                        {{ strip_tags(substr($cateData->descriptions,0,100))."..." }}
                                        @else
                                            {{ strip_tags($cateData->descriptions) }}
                                    @endif
                                </td>
                                <td>{{ $cateData->year_count }}</td>
                                <td>{{ $cateData->year_text }}</td>
                                <td>{{ $cateData->contact_no }}</td>
                                <td>{{ $cateData->contact_text }}</td>
                                <td>
                                    <img style="width: 150px;" src="{{ asset($cateData->howit_images) }}" alt="">
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="8" class="text-warning"><center><i class="fa fa-times"></i> No data in table yet!</center></td>
                            </tr>
                        @endif
    	            </table>
    	        </div><!-- /.box-body -->
                
    	    </div><!-- /.box -->

    	</div><!-- /.col -->
    </div>
</section>
@endsection