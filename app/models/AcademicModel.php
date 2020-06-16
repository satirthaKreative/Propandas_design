<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AcademicModel extends Model
{
    //
    protected $table = 'academic_models';

    protected $fillable = [
    	'heading', 'academic_details', 'association_certification', 'address_proof', 'identity_proof', 'law_school_attendance', 'other_services', 'hourly_rate', 'work_like', 'law_country', 'languages', 'bank_fname', 'bank_lname', 'bank_bic', 'bank_iban', 'user_id', 'active_status', 'status', 'created_at', 'updated_at'
	];
}
