<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawyerCountryModel extends Model
{
    //

    protected $table  = 'lawyer_country_tbls';

    protected $fillable = [
    	'country_name','status','created_at','updated_at'
    ];
}
