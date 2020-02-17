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
//LEAVES
Route::get('/izin',"IzinController@izin")->name('izin.index');
Route::post('/izin/save',"IzinController@izinPost")->name('izin.store');
//
Route::get('/home',function(){
    return view('employeeAtt2');
})->name('home.index');
Route::get('/time','EmployeeController@time');
Route::get('/cek/{nip}','EmployeeController@cek');
Route::post('/inout','EmployeeController@inout')->name('inout.store');
Route::post('/inout2','EmployeeController@inout2')->name('inout2.store');
//login / Logout
Route::get('/', 'LoginController@login')->name('login.index');
Route::post('/login', 'LoginController@validate')->name('login.store');
Route::get('/logout','LoginController@logout')->name('logout.destroy');
//dashboard
Route::get('/dashboard', 'Controller@dash')->name('dash.index');

//attendance
Route::get('/att', 'PresenceController@attendance')->name('attendance.index');
Route::get('/att/export/{first}/{end}', 'PresenceController@attendanceExport')->name('attendance.export');
Route::post('/att/search','PresenceController@Searchattendance')->name('attendanceSearch.store');
Route::get('/att/detail/emp/{id}/{N}/{X}','PresenceController@DetailEMP')->name('attendance.detail');
//activity
Route::get('/act', 'PresenceController@activity')->name('activity.index');
Route::post('/act/search','PresenceController@Searchactivity')->name('activitySearch.store');
Route::get('/act/export/{first}/{end}', 'PresenceController@activityExport')->name('activity.export');
Route::get('/act/detail/emp/{id}/{N}/{X}','PresenceController@DetailEMPAct')->name('activity.detail');
//leaves
Route::get('/leaves', 'LeavesController@leaves')->name('leaves.index');
Route::post('/leaves/search','LeavesController@Searchleaves')->name('leavesSearch.store');

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

//Customer
Route::get('/customer','CustomerController@CustomerIndex')->name('customer.index');
Route::get('/customer/edit/{id}','CustomerController@CustomerEdit')->name('customerEdit.show');
Route::post('/customer/store','CustomerController@CustomerStore')->name('customer.store');
Route::get('/customer/destroy/{id}','CustomerController@CustomerDestroy')->name('customer.destroy');
//Customer Site
Route::get('/customer_site','CustomerController@CustomerSiteIndex')->name('customerSite.index');
Route::get('/customer_site/edit/{id}','CustomerController@CustomerSiteEdit')->name('customerSiteEdit.show');
Route::post('/customer_site/store','CustomerController@CustomerSiteStore')->name('customerSite.store');
Route::get('/customer_site/destroy/{id}','CustomerController@CustomerSiteDestroy')->name('customerSite.destroy');

//Employee
Route::get('/employee', 'EmployeeController@employee')->name('employee.index');
Route::get('/employee/destroy/{id}', 'EmployeeController@employeeDestroy')->name('employee.destroy');
Route::get('/employee/edit/{id}', 'EmployeeController@employeeEdit')->name('employee.show');
Route::get('/employee/resetpass/{id}', 'EmployeeController@employeeReset')->name('employee.reset');
Route::post('/employe/store/{type}','EmployeeController@employeeStore')->name('employee.store');
Route::get('/employee_add', 'EmployeeController@employeeAdd')->name('employeeAdd.index');
//finger
Route::get('/finger-emp','EmployeeController@finger')->name('finger.index');
Route::get('/finger-emp/{id}','EmployeeController@NIP')->name('finger.nip');

//setting
Route::get('/setting', 'Controller@setting')->name('setting.index');