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
            // 't1' => AttendanceRecord::whereId($this->t1)->first(['id', 'time', 'note']),
            't1' => $this->attendance_record($this->t1, $this->employee_id),
            't2' => $this->attendance_record($this->t2, $this->employee_id),
            't3' => $this->attendance_record($this->t3, $this->employee_id),
            't4' => $this->attendance_record($this->t4, $this->employee_id),
            't5' => $this->attendance_record($this->t5, $this->employee_id),
            't6' => $this->attendance_record($this->t6, $this->employee_id),
            'total' => $this->t,
            'overtime' => $this->overtime,
        ];
    }

    private function attendance_record($id, $employee_id)
    {
        $employeeTime = Employee::whereId($employee_id)->first('time_work');
        $attendance_record = AttendanceRecord::whereId($id)->first();

        return $attendance_record;
    }
}
