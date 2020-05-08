<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLegalinfoModel extends Model
{
    //

    protected $table = 'legalinfo';


    protected $fillable = [
    	'address_one', 'address_two', 'email_address', 'phone_number', 'legal_heading', 'heading_details', 'copyright', 'external_links', 'created_at', 'updated_at'
    ];
}
