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
   <li <?php if($page == 'dashboard' || $page == 'profile-details'){ ?> class="active" <?php } ?>><a href="/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
   <li <?php if($page == 'posted-jobs' || $page == 'job-full-view' || $page == 'apply-job'){ ?> class="active" <?php } ?>><a href="/posted-jobs"><i class="fa fa-briefcase" aria-hidden="true"></i>Posted Jobs</a></li>
   <li <?php if($page == 'lawyer-notification' ){ ?> class="active" <?php } ?>><a href="/lawyer-notification"><i class="fa fa-bell" aria-hidden="true"></i>Notification <span class="lawyer-notify-class"></span></a></li>

   <li <?php if($page == 'project-status' ){ ?> class="active" <?php } ?>><a href="/project-status"><i class="fa fa-area-chart" aria-hidden="true"></i>Project Status</a></li>

   <li <?php if($page == 'chat' ){ ?> class="active" <?php } ?>><a href="/chat"><i class="fa fa-comments" aria-hidden="true"></i>Chat </a></li>
   <li <?php if($page == 'chat-invites' ){ ?> class="active" <?php } ?>><a href="/chat-invites"><i class="fa fa-comments" aria-hidden="true"></i>Chat Invitation</a></li>
   <li <?php if($page == 'lawyer-invoice' ){ ?> class="active" <?php } ?>><a href="/lawyer-invoice"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-exchange" aria-hidden="true"></i>Income Report</a></li>
   <li  <?php if($page == 'system-message' || $page == 'current-system-message-details'){ ?> class="active" <?php } ?>><a href="/system-message"><i class="fa fa-comment" aria-hidden="true"></i>System Messages <span class="unread-system-msg-count-class"></span></a></li>
</ul>