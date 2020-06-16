<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class languageModel extends Model
{
    //

    protected $table = 'languages';

    protected $fillable = [
    	 'name', 'iso_639-1'
    ];
}
