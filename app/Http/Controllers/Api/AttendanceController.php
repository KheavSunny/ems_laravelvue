<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\StoreAttendanceRequest;
use App\Http\Resources\Attendance\AttendanceResource;
use App\Models\Attendance;
use App\Models\AttendanceRecord;
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
        $attendances = Attendance::orderBy('id')->get();
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

        $attendanceExist = Attendance::whereDate('date', Carbon::parse($data['date'])->toDateString())->where('employee_id', $data['employee_id'])->exists();
        // return new AttendanceResource($attendanceExist);
        // $attendance = '';
        if (!$attendanceExist) {

            $attendance = new Attendance();
            $attendance->employee_id = $data['employee_id'];
            $attendance->date = Carbon::parse($data['date'])->toDateString();
            $attendance->save();

            $attendance_record = new AttendanceRecord();
            $attendance_record->time = Carbon::parse($data['date'])->toTimeString();
            $attendance_record->note = $data['note'] ?? null;
            $attendance_record->save();

            $attendance->where('id', $attendance->id)->update(['t1' => $attendance_record->id]);

            return $this->show(Attendance::findOrFail($attendance->id));
        } else {
            return 'have';
        }
        // return new AttendanceResource($attendance->where('id', $attendance->id)->update(['t1' => $attendance_record->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
