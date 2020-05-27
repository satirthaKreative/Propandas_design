<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLegalinfoModel extends Model
{
    //

    protected $table = 'legalinfo';


    protected $fillable = [
    	'address_one', 'google_link1', 'address_two', 'google_link2', 'email_address', 'phone_number', 'legal_heading', 'heading_details', 'copyright', 'external_links', 'created_at', 'updated_at'
    ];
}
