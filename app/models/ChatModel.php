<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    //
    protected $table = 'chat_tbl';

    protected $fillable = [
    	'senderID', 'clientID', 'projectID', 'projectNameID', 'msg_type', 'msg_content', 'size_of_file', 'parenID', 'chatting_visible_ids', 'status', 'activeStatus', 'created_at', 'updated_at'
    ];
}
