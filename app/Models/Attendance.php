<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public function getT1()
    {
        return $this->hasOne(AttendanceRecord::class, 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($attendance) {
            $attendance->getT1()->delete();
        });
    }
}
