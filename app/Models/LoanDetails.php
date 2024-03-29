<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employee_id',
        'amount',
        'repay',
        'remain',
    ];
}
