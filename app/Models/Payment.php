<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'ref_no',
        'date_from',
        'date_to',
        'status',
        'loan_repay',
        'date_paid',
    ];
}
