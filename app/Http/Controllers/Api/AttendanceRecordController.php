<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRecord\StoreAttendanceRecordRequest;
use App\Http\Requests\AttendanceRecord\UpdateAttendanceRecordRequest;
use App\Http\Resources\Attendance\AttendanceRecordResource;
use App\Http\Resources\Attendance\AttendanceResource;
use App\Models\Attendance;
use App\Models\AttendanceRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance_records = AttendanceRecord::orderBy('id', 'desc')->paginate(10);

        return AttendanceRecordResource::collection($attendance_records);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance_record = AttendanceRecord::whereId($id)->first();

        if ($attendance_record) {
            return new AttendanceRecordResource($attendance_record);
        } else {
            return response(['message' => 'Data not founded']);
        }
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
    public function update(UpdateAttendanceRecordRequest $request, AttendanceRecord $attendance_record)
    {
        $data = $request->validated();
        $attendance_record->update($data);

        $t5 = DB::table('attendances')->where('t5', $attendance_record->id);
        $t6 = DB::table('attendances')->where('t6', $attendance_record->id);
        if ($t5->exists()) {
            $t5->update(['t5' => $attendance_record->id]);
        } elseif ($t6->exists()) {
            $t6->update(['t6' => $attendance_record->id]);
        }

        return new AttendanceRecordResource($attendance_record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance_record = AttendanceRecord::whereId($id)->first();

        if ($attendance_record) {
            $attendance_record->delete();

            return response(['message' => 'Attendance Record ' . $attendance_record->id . ' has been deleted!!!']);
        } else {
            return response(['message' => 'Data not found!!!']);
        }
    }
}
