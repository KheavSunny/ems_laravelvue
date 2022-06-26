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
        'middlename',
        'department_id',
        'state_id',
        'city_id',
        'country_id',
        'birthdate',
        'date_hired',
        'zip_code',
        'phone',
        'address',
        'salary',
        'time_work'
    ];
}
