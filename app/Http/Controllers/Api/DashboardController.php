<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $users = User::count();
        $employees = Employee::count();

        return response([
            'users' => $users,
            'employees' => $employees

        ]);
    }
}
