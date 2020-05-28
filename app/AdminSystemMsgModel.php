<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSystemMsgModel extends Model
{
    //
    protected $table = 'system_msg_tbl';

    protected $fillable = [
    	'client_or_lawyer_id', 'client_or_lawyer_type', 'client_or_lawyer_name', 'project_name', 'administrator_msg', 'system_msg_status', 'created_at', 'updated_at'
    ];
}
