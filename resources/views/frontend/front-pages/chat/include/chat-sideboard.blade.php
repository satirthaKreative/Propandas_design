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
@guest
      <script>
         window.location.href="/login";
      </script>
@else
@if(Auth::user()->is_lawyer == 0)
<ul>
   <li <?php if($page == 'dashboard'){ ?> class="active" <?php } ?>><a href="/dashboard">Dashboard</a></li>
   <li <?php if($page == 'client-job-post' || $page == 'related-lawyers'){ ?> class="active" <?php } ?>><a href="/client-job-post">Post Your Job</a></li>
   <li <?php if($page == 'notification'){ ?> class="active" <?php } ?>><a href="/notification" id="noti-fication-test">Notification <span class="unread-notify-count-class"></span></a></li>
   <li <?php if($page == 'my-job' || $page == 'my-job-full-view' || $page == 'my-job-full-view' || $page == 'all-proposal' || $page == 'proposal-view' || $page == 'my-current-job'){ ?> class="active" <?php } ?>><a href="/my-job">My Jobs </a></li>
   <li <?php if($page == 'chat' ){ ?> class="active" <?php } ?>><a href="/chat">Chat </a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()">Messages</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()">Documents</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()">Invoices</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()">Transactions</a></li>
   <li  <?php if($page == 'system-message' || $page == 'current-system-message-details'){ ?> class="active" <?php } ?>><a href="/system-message">System Messages <span class="unread-system-msg-count-class"></span></a></li>
</ul>
@elseif(Auth::user()->is_lawyer == 1)
<ul>
   <li <?php if($page == 'dashboard' || $page == 'profile-details'){ ?> class="active" <?php } ?>><a href="/dashboard">Dashboard</a></li>
   <li <?php if($page == 'posted-jobs' || $page == 'job-full-view' || $page == 'apply-job'){ ?> class="active" <?php } ?>><a href="/posted-jobs">Posted Jobs</a></li>
   <li <?php if($page == 'lawyer-notification' ){ ?> class="active" <?php } ?>><a href="/lawyer-notification">Notification <span class="lawyer-notify-class"></span></a></li>
   <li <?php if($page == 'chat' ){ ?> class="active" <?php } ?>><a href="/chat">Chat </a></li>
   <li ><a href="javascript:void(0)" onclick="coming_soon_modal()">Invoices</a></li>
   <li><a href="javascript:void(0)" onclick="coming_soon_modal()">Income Report</a></li>
   <li  <?php if($page == 'system-message' || $page == 'current-system-message-details'){ ?> class="active" <?php } ?>><a href="/system-message">System Messages <span class="unread-system-msg-count-class"></span></a></li>
</ul>
@endif
@endguest