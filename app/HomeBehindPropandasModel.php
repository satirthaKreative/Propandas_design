<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBehindPropandasModel extends Model
{
    //
    protected $table = "behind_propandas_tbl";

    protected $fillable = [
    	'behind_propandas_images','owner_name','designation','behind_propandas_pdetails'
    ];
}
