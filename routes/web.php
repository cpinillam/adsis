<?php

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
    return view('auth/login');
});
Route::get('register', 'Auth\RegisterController@showRegistrationForm');

Auth::routes();

Route::get ('/home', 'DashboardController@getAllEvents');
Route::get('/tutor', 'DashboardController@tutorView');

Route::resource ('evaluation', 'EvaluationController');
Route::get ('evaluationsByUser', 'EvaluationController@getEvaluationsByUser');
Route::get('avgEvaluationsByUser', 'EvaluationController@avgEvaluationsByUser');

Route::resource('/user', 'UserController');
Route::resource('attendance', 'AttendanceController');
Route::resource('courseCatalog', 'CourseCatalogController');
Route::resource('course', 'CourseController');

Route::get('filter', 'AttendanceController@getFilters');
Route::post('filter', 'AttendanceController@applyFilters');
Route::get('attendanceIndicators', 'AttendanceController@getUserAttendanceIndicators');
