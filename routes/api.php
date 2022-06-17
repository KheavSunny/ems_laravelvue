<?php

use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AttendanceRecordController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\StateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function () {
        return request()->user();
    });
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('employees', EmployeeController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('attendance-records', AttendanceRecordController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('payments', PaymentController::class);
    Route::get('/payments/{id}/paid', [PaymentController::class, 'paid']);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
