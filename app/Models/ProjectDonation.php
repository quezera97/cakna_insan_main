<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'donation_amount',
        'billTo',
        'billEmail',
        'billPhone',
        'billpaymentInvoiceNo',
        'billPaymentDate',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
