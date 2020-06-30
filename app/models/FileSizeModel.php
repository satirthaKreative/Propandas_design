<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FileSizeModel extends Model
{
    //
    protected $table = 'filesize_tbls';

    protected $fillable = [
    	'file_size', 'project_id', 'project_name', 'user_main_id', 'created_at', 'updated_at'
    ];
}
