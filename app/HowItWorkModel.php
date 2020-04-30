<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorkModel extends Model
{
    //
    protected $table = "howitwork_tbl";

    protected $fillable = [
    	'heading_title', 'descriptions', 'year_count', 'year_text', 'contact_no', 'contact_text', 'howit_images'
    ];
}
