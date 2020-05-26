<?php 
	$link = $_SERVER['REQUEST_URI']; // PHP_SELF
	$link_array = explode('/',$link);
	$segment_count = count($link_array);
	if($segment_count == 2){
    	$page = end($link_array);
	}else{
		$page = $link_array[1];
		$get_arg_id = base64_decode(end($link_array));
	}
?>
<ul>
   <li <?php if($page == 'dashboard'){ ?> class="active" <?php } ?>><a href="/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
   <li <?php if($page == 'posted-jobs' || $page == 'job-full-view' || $page == 'apply-job'){ ?> class="active" <?php } ?>><a href="/posted-jobs"><i class="fa fa-briefcase" aria-hidden="true"></i>Posted Jobs</a></li>
   <li ><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-exchange" aria-hidden="true"></i>Income Report</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-comment" aria-hidden="true"></i>System Messages</a></li>
</ul>