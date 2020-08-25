<?php

namespace App\Models\Icons;

use Illuminate\Database\Eloquent\Model;

class CategoryIconModel extends Model
{
    //
    protected $table = 'category_icon_tbls';

    protected $fillable = [
    	'category_id', 'category_icons', 'created_at', 'updated_at'
    ];
}
