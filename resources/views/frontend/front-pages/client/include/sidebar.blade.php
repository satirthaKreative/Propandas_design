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
   <li <?php if($page == 'client-job-post' || $page == 'related-lawyers'){ ?> class="active" <?php } ?>><a href="/client-job-post"><i class="fa fa-tasks" aria-hidden="true"></i>Post Your Job</a></li>
   <li <?php if($page == 'notification'){ ?> class="active" <?php } ?>><a href="/notification" id="noti-fication-test"><i class="fa fa-bell" aria-hidden="true"></i>Notification <span class="unread-notify-count-class"></span></a></li>
   <li <?php if($page == 'my-job' || $page == 'my-job-full-view' || $page == 'my-job-full-view' || $page == 'all-proposal' || $page == 'proposal-view' || $page == 'my-current-job'){ ?> class="active" <?php } ?>><a href="/my-job"><i class="fa fa-briefcase" aria-hidden="true"></i>My Jobs </a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-comments" aria-hidden="true"></i>Messages</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-file-text" aria-hidden="true"></i>Documents</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-file" aria-hidden="true"></i>Invoices</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()"><i class="fa fa-exchange" aria-hidden="true"></i>Transactions</a></li>
   <li  <?php if($page == 'system-message' || $page == 'current-system-message-details'){ ?> class="active" <?php } ?>><a href="/system-message"><i class="fa fa-comment" aria-hidden="true"></i>System Messages <span class="unread-system-msg-count-class"></span></a></li>
</ul>