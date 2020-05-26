<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country_model extends Model
{
    //
    protected $table = 'country_list';

    protected $fillable = [
    	'iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode', 'created_at', 'updated_at'
    ];
}
