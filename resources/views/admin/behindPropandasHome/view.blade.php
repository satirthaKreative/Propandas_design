@extends('layouts.backendLayouts.app')
@section('content')
<!-- Category Options Table -->
<section class="content-header">
    <h1>
        Behind Propandas View
        <small>preview of Behind Propandas table</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript: ;"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript: ;">Tables</a></li>
        <li class="active">Behind Propandas View</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    	    <div class="box">
    	        <div class="box-header">
    	            <h3 class="box-title">Behind Propandas Table</h3> <span class="float-right-btn"><a href="{{ url('/behindpropandasAdd') }}" class="btn btn-sm btn-success text-white">Add Behind Propandas</a></span>
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
    	                    <th >Owner Image</th>
                            <th >Owner Name</th>
                            <th >Owner Designation</th>
                            <th class="w20">Behind Propandas Details</th>
    	                    <th>Action</th>
    	                    <!-- <th style="width: 40px">Label</th> -->
    	                </tr>
                        @if(count($totalResult)>0)
                        @php $i=0 @endphp
                            @foreach($totalResult as $cateData)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <img style="width: 150px;" src="{{ asset($cateData->behind_propandas_images) }}" alt="">
                                </td>
                                <td>{{ $cateData->owner_name }}</td>
                                <td>{{ $cateData->designation }}</td>
                                <td>
                                    @if(strlen($cateData->behind_propandas_pdetails)>100)
                                        {{ substr($cateData->behind_propandas_pdetails,0,100)."..." }}
                                        @else
                                            {{ $cateData->behind_propandas_pdetails }}
                                    @endif
                                </td>
                                
                                
                                <td>
                                    <form action="{{ url('/behindpropandas/'.$cateData->id) }}" method="post">
                                        <a href="{{ url('/behindpropandas/'.$cateData->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> 
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

            <div class="col-md-6 col-xs-12 col-sm-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Behind Propandas Heading Table</h3> 
                        <span class="float-right-btn">
                            @if(count($totalResultHeading)>0)
                                @foreach($totalResultHeading as $cateDataHeading)
                                    <a href="{{ url('/behindpropandasheading/'.$cateDataHeading->id) }}" class="btn btn-sm btn-success text-white">Update Heading Of Behind Propandas</a>
                                @endforeach
                                @else
                                <a href="{{ url('/behindpropandasheadingAdd') }}" class="btn btn-sm btn-success text-white">Add Heading Of Behind Propandas</a>
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
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Behind Propandas Heading Details</th>
                                <!-- <th style="width: 40px">Label</th> -->
                            </tr>
                            @if(count($totalResultHeading)>0)
                            @php $i=0 @endphp
                                @foreach($totalResultHeading as $cateDataHeading)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $cateDataHeading->heading_name }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="2" class="text-warning"><center><i class="fa fa-times"></i> No data in table yet!</center></td>
                                </tr>
                            @endif
                        </table>
                    </div><!-- /.box-body -->
                    
                </div><!-- /.box -->

            </div><!-- /.col -->
    </div>
</section>
@endsection