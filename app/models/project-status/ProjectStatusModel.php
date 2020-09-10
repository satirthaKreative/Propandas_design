<?php

namespace App\models\project-status;

use Illuminate\Database\Eloquent\Model;

class ProjectStatusModel extends Model
{
    //

    protected $table = "project_status_tbls";

    protected $fillable = [
    	'project_name', 'project_id', 'client_id', 'lawyer_id', 'project_status', 'active_status', 'created_at', 'updated_at'
    ];
}