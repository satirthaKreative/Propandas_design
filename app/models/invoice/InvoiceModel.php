<?php

namespace App\models\invoice;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    // invoice table 

    protected $table = 'invoice_tbls';

    protected $fillable = [
    	'invoice_id', 'project_id', 'project_name', 'client_id', 'lawyer_id', 'sent_date', 'due_date', 'pay_amount', 'pay_check', 'active_check', 'accept_check', 'active_status', 'created_at', 'updated_at', 'raise_description'
    ];
}
