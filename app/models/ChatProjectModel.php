<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChatProjectModel extends Model
{
    //

    protected $table = 'job_accept_tbls';

    protected $fillable = [
    	'client_id', 'lawyer_id', 'project_id', 'project_name', 'budget_of_project', 'days_of_project', 'status', 'work_status', 'project_start_date', 'project_close_date', 'created_at', 'updated_at', 'total_users_ids'
    ];
}
