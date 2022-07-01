<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Http\Requests\Attendance\StorePermissionAbsentRequest;
use App\Http\Requests\Attendance\UpdateAttendanceRequest;
use App\Http\Requests\AttendanceRecord\UpdateAttendanceRecordRequest;
use App\Http\Resources\Attendance\AttendanceResource;
use App\Models\Attendance;
use App\Models\AttendanceRecord;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::orderBy('date', 'desc')->orderBy('id')->paginate(10);
        return AttendanceResource::collection($attendances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        $data = $request->validated();

        $time = Carbon::parse($data['date'])->toTimeString();

        $results = [];

        foreach (request()->employee_id as $key => $value) {

            // return $key;

            // $employee = Employee::whereId($data['employee_id'])->first();

            // $time15minutes = date('H:i:s', strtotime('+15 minutes', strtotime($employee->time_work)));

            // $time4hours = date('H:i:s', strtotime('+4 hours', strtotime($employee->time_work)));

            // if (!request()->status) {
            //     if ($time > $time15minutes && $time <= $time4hours) {
            //         $data['status'] = 'late';
            //     } elseif ($time > '13:15:00') {
            //         $data['status'] = 'late';
            //     } else {
            //         $data['status'] = 'present';
            //     }
            // }

            // return $this->createAttendance($employee->id, $data['date'], $data['status'], $data['note'] ?? '');
            $employee = Employee::whereId($value)->first();

            $time15minutes = date('H:i:s', strtotime('+15 minutes', strtotime($employee->time_work)));

            $time4hours = date('H:i:s', strtotime('+4 hours', strtotime($employee->time_work)));

            if (!request()->status) {
                if ($time > $time15minutes && $time <= $time4hours) {
                    $data['status'] = 'late';
                } elseif ($time > '13:15:00') {
                    $data['status'] = 'late';
                } else {
                    $data['status'] = 'present';
                }
            }

            // $results[] = $employee->id;

            $results[] = $this->createAttendance($employee->id, $data['date'], $data['status'], $data['note'] ?? '');
        }

        return $results;
    }

    public function store_permission_absent(StorePermissionAbsentRequest $request)
    {
        $data = $request->validated();
        $employee = Employee::whereId($data['employee_id'])->get();
        $date_from = strtotime($data['date_from']);
        $date_to = strtotime($data['date_to']);

        if ($data['half_or_full'] == 2) {
            for ($i = 1; $i <= 2; $i++) {
                for ($current = $date_from; $current <= $date_to; $current += (86400)) {
                    $date = date('Y-m-d', $current);
                    $this->createAttendance($employee->id, $date, $data['status'], $data['note'] ?? '');
                }
            }
        } else {
            for ($i = 1; $i <= 4; $i++) {
                for ($current = $date_from; $current <= $date_to; $current += (86400)) {
                    $date = date('Y-m-d', $current);
                    $this->createAttendance($employee->id, $date, $data['status'], $data['note'] ?? '');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = Attendance::whereId($id)->first();
        return new AttendanceResource($attendance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $data = $request->validated();

        $attendance->update($data);

        return $this->show($attendance->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::whereId($id)->first();
        if ($attendance) {
            $attendance->delete();
            return response(['message' => 'Attendance ' . $attendance->id . ' has been deleted']);
        } else {
            return response(['message' => 'No data founded!!']);
        }
    }

    private function createAttendance($employee_id, $date, $status, $note)
    {
        $getDate = Carbon::parse($date)->toDateString();
        $attendance = Attendance::whereDate('date', $getDate)->where('employee_id', $employee_id)->first();

        if (!$attendance) {

            $attendance = new Attendance();
            $attendance->employee_id = $employee_id;
            $attendance->date = $getDate;
            $attendance->save();

            $this->column($attendance, $date, $status, $note ?? '', 't1');

            return $this->show($attendance->id);
        } else {
            if ($attendance->t1 == null) {
                $this->column($attendance, $date, $status, $note ?? '', 't1');
            } else if ($attendance->t2 == null) {
                $this->column($attendance, $date, $status = 'break', $note ?? '', 't2');
            } elseif ($attendance->t3 == null) {
                $this->column($attendance, $date, $status, $note ?? '', 't3');
            } elseif ($attendance->t4 == null) {
                $this->column($attendance, $date, $status = 'break', $note ?? '', 't4');
            } elseif ($attendance->t5 == null) {
                $this->column($attendance, $date, $status = 'overtime', $note ?? '', 't5');
            } elseif ($attendance->t6 == null) {
                $this->column($attendance, $date, $status = 'overtime', $note ?? '', 't6');
            }

            return $this->show($attendance->id);
        }
    }

    private function column($constraints, $time, $status, $note, $column)
    {

        $attendance_record = new AttendanceRecord();
        $attendance_record->time = Carbon::parse($time)->toTimeString();
        $attendance_record->note = $note;
        $attendance_record->status = $status;
        $attendance_record->save();
        Attendance::where('id', $constraints->id)->update([$column => $attendance_record->id]);
    }
}
