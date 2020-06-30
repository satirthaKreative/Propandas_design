<?php

namespace App\models\reviews;

use Illuminate\Database\Eloquent\Model;

class CtoLmodel extends Model
{
    //
    protected $table = "clienttolawyerreview_tbls";

    protected $fillable = [
    	'reviewer_id', 'review_id', 'review_title', 'review_details', 'review_service_count', 'review_value_count', 'review_time_count', 'status', 'created_at', 'updated_at'
    ];
}
