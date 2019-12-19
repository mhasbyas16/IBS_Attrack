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
//login / Logout
Route::get('/', 'LoginController@login')->name('login.index');
Route::post('/login', 'LoginController@validate')->name('login.store');
Route::get('/logout','LoginController@logout')->name('logout.destroy');
//dashboard
Route::get('/dashboard', 'Controller@dash')->name('dash.index');

//attendance
Route::get('/att', 'PresenceController@attendance')->name('attendance.index');

//activity
Route::get('/act', 'Controller@act')->name('activity.index');

//leaves
Route::get('/leaves', 'Controller@leaves')->name('leaves.index');

//Departement
//deptgrup
Route::get('/dept_group','DepartementController@DeptGroupIndex')->name('DeptGroup.index');
Route::post('/dept_grup/store','DepartementController@DeptGroupStore')->name('DeptGroup.store');
Route::get('/dept_grup/destroy/{id}','DepartementController@DeptGroupDestroy')->name('DeptGroup.destroy');
//dept
Route::get('/dept','DepartementController@DeptIndex')->name('Dept.index');
Route::post('/dept/store','DepartementController@DeptStore')->name('Dept.store');
Route::get('/dept/destroy/{id}','DepartementController@DeptDestroy')->name('Dept.destroy');
//job
Route::get('/job_type','DepartementController@JobTypeIndex')->name('JobType.index');
Route::get('/job_type/cmbx/{id}','DepartementController@JobTypecmbx')->name('JobType.show');
Route::post('/job_type/store','DepartementController@JobTypeStore')->name('JobType.store');
Route::get('/job_type/destroy/{id}','DepartementController@JobTypeDestroy')->name('JobType.destroy');
//data
Route::get('/satu', 'Controller@data1')->name('employee.index');
Route::get('/dua', 'Controller@data2')->name('customer.index');
Route::get('/tiga', 'Controller@data3')->name('customerSite.index');
//Route::get('/addsatu', 'Controller@adddata1');
//Route::get('/adddua', 'Controller@adddata2');
//Route::get('/addtiga', 'Controller@adddata3');
