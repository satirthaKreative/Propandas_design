<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    //
    protected $table = "notification_tbl";

    protected $fillable = [
    	'lawyer_des', 'lawyer_comment', 'billing_option', 'billing_rate', 'lawyer_id', 'project_id', 'client_id', 'active_status', 'unread_status', 'created_at', 'updated_at'
    ];
}
