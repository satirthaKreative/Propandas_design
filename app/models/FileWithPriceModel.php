<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FileWithPriceModel extends Model
{
    //
    protected $table = 'filesize_actual_tbls';

    protected $fillable = [
    	'size_in_gb', 'size_in_kb', 'price_of_size', 'created_at', 'updated_at'
    ];
}
