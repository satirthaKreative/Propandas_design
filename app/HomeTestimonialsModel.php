<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeTestimonialsModel extends Model
{
    //

    protected $table = "testimonials_tbl";

    protected $fillable = [
    	'client_img', 'client_comment', 'client_name', 'client_designation', 'created_at', 'updated_at'
    ];
}
