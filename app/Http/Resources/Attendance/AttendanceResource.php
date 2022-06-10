<?php

namespace App\Http\Resources\Attendance;

use App\Models\AttendanceRecord;
use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'employee' => Employee::whereId($this->employee_id)->first(),
            't1' => AttendanceRecord::whereId($this->t1)->first(['id', 'time', 'note']),
            't2' => AttendanceRecord::whereId($this->t2)->first(['id', 'time', 'note']),
            't3' => AttendanceRecord::whereId($this->t3)->first(['id', 'time', 'note']),
            't4' => AttendanceRecord::whereId($this->t4)->first(['id', 'time', 'note']),
            't5' => AttendanceRecord::whereId($this->t5)->first(['id', 'time', 'note']),
            't6' => AttendanceRecord::whereId($this->t6)->first(['id', 'time', 'note']),
            'total' => $this->t,
            'overtime' => $this->overtime,
        ];
    }
}
