<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LawSchoolsAttendedModel extends Model
{
    //
    protected $table = 'law_schools_attended_tbls';

    protected $fillable = [
    	'attendance_school_law'
    ];
}
