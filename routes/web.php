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

//dashboard
Route::get('/', 'Controller@dash')->name('dash.index');

//attendance
Route::get('/att', 'Controller@att')->name('attendance.index');

//activity
Route::get('/act', 'Controller@act')->name('activity.index');

//leaves
Route::get('/leaves', 'Controller@leaves')->name('leaves.index');


//data
Route::get('/satu', 'Controller@data1')->name('customer.index');
Route::get('/dua', 'Controller@data2')->name('employee.index');
Route::get('/tiga', 'Controller@data3')->name('customerSite.index');
Route::get('/addsatu', 'Controller@adddata1');
Route::get('/adddua', 'Controller@adddata2');
Route::get('/addtiga', 'Controller@adddata3');
