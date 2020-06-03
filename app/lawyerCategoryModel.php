<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lawyerCategoryModel extends Model
{
    //
    protected $table = 'lawyer_category_models';

    protected $fillable = [
    	'category_id', 'user_id', 'created_at', 'updated_at'
    ];
}
