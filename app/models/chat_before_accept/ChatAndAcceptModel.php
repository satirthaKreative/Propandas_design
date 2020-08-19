<?php

namespace App\models\chat_before_accept;

use Illuminate\Database\Eloquent\Model;


class ChatAndAcceptModel extends Model
{
    //
    protected $table = "job_chat_before_accept_tbls";

    protected $fillable = [
    	'client_id', 'lawyer_id', 'project_id', 'project_name', 'total_users_ids', 'status'
    ];
}
