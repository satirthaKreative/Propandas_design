<?php

namespace App\Models\legalDocx;

use Illuminate\Database\Eloquent\Model;

class LegalDocumentModel extends Model
{
    //
    protected $table = 'legal_document_tbls';

    protected $fillable = [
    	 'category_id', 'agreement_title', 'agreement_short_desc', 'agreement_full_desc', 'agreement_category_desc', 'legal_cate_type', 'agreement_file_upload', 'agreement_full_details', 'created_at', 'updated_at'
    ];
}
