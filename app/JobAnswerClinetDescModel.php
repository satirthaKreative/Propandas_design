<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAnswerClinetDescModel extends Model
{
    //
    protected $table = 'jobanswerclinetdesc';
    
    protected $fillable = [
    	 'client_id', 'category_id', 'quesAnsDescrip', 'phone_number', 'status', 'projectId'
    ];
}
