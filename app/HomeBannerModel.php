<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBannerModel extends Model
{
    //

    protected $table = "banner_table";

    protected $fillable = [
    	'top_banner_title', 'main_banner_title', 'title_description', 'banner_images', 'created_at', 'updated_at'
    ];
}
