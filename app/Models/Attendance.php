<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        't1',
        't2',
        't3',
        't4',
        't5',
        't6',
        't',
        'overtime',
    ];
}
