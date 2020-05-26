<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawyerCitiesModel extends Model
{
    //

    protected $table  = 'lawyer_cities_tbls';

    protected $fillable = [
    	'city_name','country_id','status','created_at','updated_at'
    ];
}
