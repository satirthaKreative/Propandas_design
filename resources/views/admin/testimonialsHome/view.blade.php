@extends('layouts.backendLayouts.app')
@section('content')
<!-- Category Options Table -->
<section class="content-header">
    <h1>
        Testimonials View
        <small>preview of Testimonials table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Testimonials View</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">Testimonials Table</h3> <span class="float-right-btn"><a href="{{ url('/testimonialsAdd') }}" class="btn btn-sm btn-success text-white">Add Testimonials</a></span>
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
    	                    <th >Client Name</th>
    	                    <th class="w20">Client comments</th>
    	                    <th >Client Designation</th>
                            <th >Testimonials Image</th>
    	                    <th>Action</th>
    	                    <!-- <th style="width: 40px">Label</th> -->
    	                </tr>
                        @if(count($totalResult)>0)
                        @php $i=0 @endphp
                            @foreach($totalResult as $cateData)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $cateData->client_name }}</td>
                                <td>
                                    @if(strlen($cateData->client_comment)>100)
                                        {{ substr($cateData->client_comment,0,100)."..." }}
                                        @else
                                            {{ $cateData->client_comment }}
                                    @endif
                                </td>
                                <td>{{ $cateData->client_designation }}</td>
                                
                                <td>
                                    <img style="width: 150px;" src="{{ asset($cateData->client_img) }}" alt="">
                                </td>
                                <td>
                                    <form action="{{ url('/testimonials/'.$cateData->id) }}" method="post">
                                        <a href="{{ url('/testimonials/'.$cateData->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
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