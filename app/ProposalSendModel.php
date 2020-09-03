<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalSendModel extends Model
{
    //

    protected $table = 'proposal_tbl';

    protected $fillable = [
    	 'lawyer_des', 'lawyer_comment', 'billing_option', 'billing_rate', 'lawyer_id', 'project_id', 'client_id', 'active_status', 'created_at', 'updated_at', 'propoal_act'
    ];
}
