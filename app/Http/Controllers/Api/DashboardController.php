<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $users = User::count();
        $employees = Employee::count();
        $employee_lists = EmployeeResource::collection(Employee::latest()->take(5)->get());

        return response([
            'users' => $users,
            'employees' => $employees,
            'employee_lists' => $employee_lists

        ]);
    }
}
