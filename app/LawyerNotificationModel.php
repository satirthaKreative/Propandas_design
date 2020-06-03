<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawyerNotificationModel extends Model
{
    //
    protected $table = 'lawyer_notify_tbls';

    protected $fillable = [
    	'lawyer_id', 'client_id', 'project_id', 'project_name', 'unread_status', 'active_status', 'status', 'notify_type', 'created_at', 'updated_at'
    ];
}
