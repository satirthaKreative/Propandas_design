<?php
namespace App;
namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;

class adminProfilePageModel extends Model
{
    //
    protected $fillable = [
    	 `name`, `email`, `password`
    ];
}
