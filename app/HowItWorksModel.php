<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorksModel extends Model
{
    //

    protected $table = 'how_its_works_tbl';

    protected $fillable = [
    	'video_iframe_links', 'post_your_job_detail1', 'post_your_job_detail2', 'get_proposal1', 'get_proposal2', 'hire_lawyer1', 'hire_lawyer2', 'register_yourself1', 'register_yourself2', 'search_job1', 'search_job2', 'get_a_client1', 'get_a_client2', 'created_at', 'updated_at'
    ];
}
