<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CareerModel extends Model
{
    //
    protected $table = "career_tbl";

    protected $fillable = [
    	'fname', 'lname', 'email', 'phn_num', 'msg', 'status', 'created_at', 'updated_at'
    ];
}
