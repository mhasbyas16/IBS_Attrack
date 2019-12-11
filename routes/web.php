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
Route::get('/', 'Controller@dash');

//attendance
Route::get('/att', 'Controller@att');

//activity
Route::get('/act', 'Controller@act');

//leaves
Route::get('/leaves', 'Controller@leaves');


//data
Route::get('/satu', 'Controller@data1');
Route::get('/dua', 'Controller@data2');
Route::get('/tiga', 'Controller@data3');
Route::get('/addsatu', 'Controller@adddata1');
Route::get('/adddua', 'Controller@adddata2');
Route::get('/addtiga', 'Controller@adddata3');
