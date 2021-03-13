<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/employeecreate',[EmployeeController::class,'create']);
Route::get('/employeeview',[EmployeeController::class,'index']);
Route::get('/employeeDetails/{id}',[EmployeeController::class,'show']);
Route::post('/employeeupdate/{id}',[EmployeeController::class,'update']);
Route::get('/employeedelete/{id}',[EmployeeController::class,'destroy']);

//login controller
Route::post('/registration',[LoginController::class,'Registered']);
Route::post('/testlogin',[LoginController::class,'CheckLogin']);
Route::post('/AddEmp',[LoginController::class,'AddStudent']);
Route::post('/updateStudent/{id}',[LoginController::class,'UpdateStudent']);
Route::get('/DeleteStudent/{id}',[LoginController::class,'DeleteStudent']);
Route::get('/ShowStudent/{id}',[LoginController::class,'ShowStudent']);
Route::post('/AdminLogout',[LoginController::class,'Logout']);
Route::post('/PasswordForget',[LoginController::class,'ForgetPassword']);

//company controller api
Route::post('/companyRegistered',[CompanyController::class,'GetRegistered']);
Route::post('/companylogin',[CompanyController::class,'GetLogin']);
Route::post('/companyadd',[CompanyController::class,'AddCompanyRecord']);
Route::post('/companylogout',[CompanyController::class,'Logout']);
