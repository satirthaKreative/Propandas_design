<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactQueryModel extends Model
{
    //
    protected $table = 'contactquery';

    protected $fillable = [
    	 'name', 'email', 'regarding', 'subject', 'your_msg', 'created_at', 'updated_at'
    ];
}
