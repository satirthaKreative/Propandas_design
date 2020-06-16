<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChatJobQAModel extends Model
{
    //
	protected $table = 'jobanswerclinetdesc';

    protected $fillable = [
    	'client_id', 'category_id', 'quesAnsDescrip', 'phone_number', 'status', 'created_at', 'updated_at', 'projectId', 'active_status', 'project_status'
    ];
    
}
