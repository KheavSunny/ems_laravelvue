<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;
use Illuminate\Auth\Events\Validated;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->paginate(5);

        return EmployeeResource::collection($employees);
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
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();

        if ($data['time_work'] == 'office') {
            $data['time_work'] = '08:00:00';
        } elseif ($data['time_work'] == 'industry') {
            $data['time_work'] = '07:00:00';
        }

        $employee = Employee::create($data);

        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::whereId($id)->first();

        if ($employee) {
            return new EmployeeResource($employee);
        } else {
            return response(['message' => 'Data not found !!!!']);
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
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $data = $request->validated();

        $employee = Employee::whereId($id)->first();

        if ($employee) {
            $employee->update($data);
            return new EmployeeResource($employee);
        } else {
            return response(['message' => 'Data not found !!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::whereId($id)->first();

        if ($employee) {
            $employee->delete();
            return response(['message' => 'Employee ' . $employee->firstname . ' ' . $employee->lastname . ' has been deleted.']);
        } else {
            return response(['message' => 'Data not found !!!!']);
        }
    }
}
