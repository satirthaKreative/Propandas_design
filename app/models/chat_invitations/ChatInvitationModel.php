<?php

namespace App\Models\chat_invitations;

use Illuminate\Database\Eloquent\Model;

class ChatInvitationModel extends Model
{
    //
    protected $table = 'chat_invitation_tbls';

    protected $fillable = [
    	'sender_id', 'receiver_id', 'active_or_inActive', 'created_at', 'updated_at'
    ];
}
