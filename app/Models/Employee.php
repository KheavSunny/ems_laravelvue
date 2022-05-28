<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'firstname',
        'lastname',
        'middle_name',
        'department_id',
        'state_id',
        'city_id',
        'country_id',
        'birtdate',
        'date_hired',
        'zip_code',
        'phone',
        'address'
    ];
}
