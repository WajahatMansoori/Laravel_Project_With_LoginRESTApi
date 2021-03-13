<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');    
});

Route::get('/Index','HomeController@Index');
Route::get('/AboutUs','HomeController@AboutUs');
Route::get('/ContactUs','HomeController@ContactUs');
#Route::get('/Login','LoginController@Login');
Route::get('/ArrayPage','HomeController@GetArray');
Route::get('/MyForm','HomeController@MyForm');
Route::post('/data','HomeController@GetData');

Route::get('/BladeForm','HomeController@BladeForm');
Route::post('/FormData','HomeController@GetBladeForm');
Route::get('/EmployeeData','HomeController@EmployeeMethod');

Route::resource('student','StudentController');
Route::get('/worker','WorkerController@create');
Route::post('/addimage','WorkerController@store')->name('addimage');
Route::get('/workerview','WorkerController@Index');
Route::get('/editForm/{id}','WorkerController@edit');
Route::put('/updateform/{id}','WorkerController@update');
Route::get('/deleteForm/{id}','WorkerController@destroy');
Route::get('/detail/{id}','WorkerController@show');
Route::post('/submit', function (){
    return 'Submitted successfully';
});
