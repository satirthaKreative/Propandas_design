@extends('layouts.backendLayouts.app')
@section('content')
<!-- category add -->
<section class="content-header">
    <h1>
        Legal Info
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Legal Info Update Form </li>
    </ol>
</section>
<section class="content">
    <div class="row">
    	<div class="col-md-6">

    	    <div class="box box-danger">
    	        <div class="box-header">
    	            <h3 class="box-title">Legal Info</h3>
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
                    @foreach($totalResult as $tot)
    	            <form action="{{ url('/how-it-works/'.$tot->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Video Iframe Links:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea type="text" required="required"  name="video_iframe_links" class="form-control" id="">{{ $tot->video_iframe_links }}</textarea>
                            </div><!-- /.input group -->
                            <small class="text-danger">* Enter only iframe links</small>
                        </div><!-- /.form group -->


                        <div class="form-group">
                            <label>Post Your Job Details1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="post_your_job_detail1" rows="5" >{{ $tot->post_your_job_detail1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        

                        <div class="form-group">
                            <label>Post Your Job Details2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="post_your_job_detail2" rows="5" >{{ $tot->post_your_job_detail2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Get Proposal1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="get_proposal1" rows="5">{{ $tot->get_proposal1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->


                        <div class="form-group">
                            <label>Get Proposal2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="get_proposal2" rows="5" >{{ $tot->get_proposal2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->



                        <div class="form-group">
                            <label>Hire Lawyer1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="hire_lawyer1" rows="5">{{ $tot->hire_lawyer1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        

                        <div class="form-group">
                            <label>Hire Lawyer2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="hire_lawyer2" rows="5">{{ $tot->hire_lawyer2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Register Yourself1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="register_yourself1" rows="5" >{{ $tot->register_yourself1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->


                        <div class="form-group">
                            <label>Register Yourself2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="register_yourself2" rows="5" >{{ $tot->register_yourself2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->



                        <div class="form-group">
                            <label>Search Job1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="search_job1" rows="5" >{{ $tot->search_job1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        

                        <div class="form-group">
                            <label>Search Job2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="search_job2" rows="5" >{{ $tot->search_job2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            <label>Get A Client1:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="get_a_client1" rows="5">{{ $tot->get_a_client1 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->


                        <div class="form-group">
                            <label>Get A Client2:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-info"></i>
                                </div>
                                <textarea  required="required" class="form-control legal-info-text"  name="get_a_client2" rows="5">{{ $tot->get_a_client2 }}</textarea>
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->


                        <div class="clearfix">
                            <button class="btn btn-success btn-sm float-right-btn text-white" type="submit">Update</button>
                        </div>   
                    </form>
                    @endforeach
    	        </div><!-- /.box-body -->

    	    </div><!-- /.box -->

    	</div><!-- /.col (left) -->
    </div>
</section>

@endsection