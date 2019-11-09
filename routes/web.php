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
    return view('auth.myhome');
})->name('myhome');

Route::get('/aboutus', function () {
    return view('auth.aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('auth.contactus');
})->name('contactus');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('sadmin/home', 'Super_Admin_Controller@ShowSadminHome')->name('sadmin.home');
Route::get('admin/home', 'Admin_Controller@ShowAdminHome')->name('admin.home');
Route::get('user/home', 'User_Controller@ShowUserHome')->name('user.home');

Route::get('user-register-form', 'Admin_Controller@showRegistrationForm')->name('user.registerform');
Route::post('user-register', 'User\RegisterController@register')->name('user.registers');
Route::get('user-myprofile','User_Controller@MyProfile')->name('user-myprofile');
Route::get('user-editmyprofile','User_Controller@EditProPic')->name('user-editmyprofile');
Route::post('user-myprofile','User_Controller@Update_Avatar')->name('user-editmy_profile');

Route::get('admin-register', 'Super_Admin_Controller@showRegistrationForm')->name('admin.registerform');
Route::post('admin-register', 'Admin\RegisterController@register')->name('admin.registers');

Route::get('admin-emp-upgrade', 'Admin_Controller@Show_Emp_Upgrade')->name('admin.empup');
Route::post('/emp_upgrade', 'Admin_Controller@Emp_Upgrade')->name('admin.empup_done');

Route::get('adminmyprofile','Admin_Controller@MyProfile')->name('admin-myprofile');
Route::get('admin-editmyprofile','Admin_Controller@EditProPic')->name('admin-editmyprofile');
Route::post('admin-myprofile','Admin_Controller@Update_Avatar')->name('admin-editmy_profile');

//Route::get('admin-create-event','Admin_Controller@ShowCreateEvents')->name('admin-create-calander-event');

Route::get('sadmin-register', 'Super_admin\RegisterController@showRegistrationForm');
Route::post('sadmin-register', 'Super_admin\RegisterController@register')->name('sadmin.registers');

Route::get('sadmin-user-upgrade', 'Super_Admin_Controller@Show_User_Upgrade')->name('sadmin.userup');
Route::post('/user_upgrade', 'Super_Admin_Controller@User_Upgrade')->name('sadmin.userup_done');

Route::get('sadmin-myprofile','Super_Admin_Controller@MyProfile')->name('sadmin-myprofile');
Route::get('sadmin-editmyprofile','Super_Admin_Controller@EditProPic')->name('sadmin-editmyprofile');
Route::post('sadmin-myprofile','Super_Admin_Controller@Update_Avatar')->name('sadmin-myprofile_edit');;

Route::get('emp-register-form', 'User_Controller@showRegistrationForm')->name('emp.registerform');
Route::post('emp-register', 'Employee\RegisterController@register');

Route::get('emp-records', 'User_Controller@EmpRecords')->name('employee.records');
Route::get('/emp-profile/{id}', 'User_Controller@EmpProfiles')->name('emp.profiles');
//Route::delete('/deleteemp/{id}','User_Controller@DeleteEmployee');

Route::delete('/deleteemp','User_Controller@DeleteEmployee');

Route::get('/emp-basic-edit/{id}', 'User_Controller@showEditBasicForm')->name('emp.editbasic');
Route::post('/emp-basic-update/{id}', 'User_Controller@updatesBasics');
Route::get('/emp-finance-edit/{id}', 'User_Controller@showEditFinanceForm')->name('emp.editfinance');
Route::post('/emp-finance-update/{id}', 'User_Controller@updatesFinance');
Route::get('/emp-office-edit/{id}', 'User_Controller@showEditOfficeForm')->name('emp.editfinance');
Route::post('/emp-office-update/{id}', 'User_Controller@updatesOffice');
//Route::post('/canlogemp/{id}','User_Controller@CanLogEmp');

Route::post('/canlogemp','User_Controller@CanLogEmp');

Route::get('user-records', 'Admin_Controller@UserRecords')->name('user.records');
Route::get('/user-profile/{id}', 'Admin_Controller@UserProfiles')->name('user.profiles');
//Route::delete('/deleteuser/{id}','Admin_Controller@DeleteUser');

Route::delete('/deleteuser','Admin_Controller@DeleteUser');

Route::get('/user-basic-edit/{id}', 'Admin_Controller@showEditBasicForm')->name('user.editbasic');
Route::post('/user-basic-update/{id}', 'Admin_Controller@updatesBasics');
Route::get('/user-finance-edit/{id}', 'Admin_Controller@showEditFinanceForm')->name('user.editfinance');
Route::post('/user-finance-update/{id}', 'Admin_Controller@updatesFinance');
Route::get('/user-office-edit/{id}', 'Admin_Controller@showEditOfficeForm')->name('user.editfinance');
Route::post('/user-office-update/{id}', 'Admin_Controller@updatesOffice');
//Route::post('/canloguser/{id}','Admin_Controller@CanLogUser');

Route::post('/canloguser','Admin_Controller@CanLogUser');

Route::get('admin-records', 'Super_Admin_Controller@AdminRecords')->name('admin.records');
Route::get('/admin-profile/{id}', 'Super_Admin_Controller@AdminProfiles')->name('admin.profiles');
//Route::delete('/deleteadmin/{id}','Super_Admin_Controller@DeleteAdmin');

Route::delete('/deleteadmin','Super_Admin_Controller@DeleteAdmin');

Route::get('/admin-basic-edit/{id}', 'Super_Admin_Controller@showEditBasicForm')->name('admin.editbasic');
Route::post('/admin-basic-update/{id}', 'Super_Admin_Controller@updatesBasics');
Route::get('/admin-finance-edit/{id}', 'Super_Admin_Controller@showEditFinanceForm')->name('admin.editfinance');
Route::post('/admin-finance-update/{id}', 'Super_Admin_Controller@updatesFinance');
Route::get('/admin-office-edit/{id}', 'Super_Admin_Controller@showEditOfficeForm')->name('admin.editfinance');
Route::post('/admin-office-update/{id}', 'Super_Admin_Controller@updatesOffice');
//Route::post('/canlogadmin/{id}','Super_Admin_Controller@CanLogAdmin');

Route::post('/canlogadmin','Super_Admin_Controller@CanLogAdmin');

Route::resource('/events','Calender\EventController');
Route::get('/edit_events/{id}', 'Calender\EventController@edit')->name('event.edit');
Route::delete('/deleteevent','Calender\EventController@destroy');
Route::get('/displayevents','Calender\EventController@show');
Route::get('/edit_emps/{role}', 'Calender\EventController@showList')->name('event.showlist');