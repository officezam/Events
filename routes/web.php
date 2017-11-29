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




Route::group(array('prefix' => 'backend'), function ()
{
	Auth::routes();
	Route::get('/', function () {
		if (Auth::user()) {return redirect('/backend/dashboard');}
		return view('auth.login');});

	Route::get('dashboard', function () { return view('backend.dashboard');});

	Route::post('save-employee', 'EmployeeController@saveEmployee')->name('save-employee');
	Route::get('add-employee', function(){return view('backend.user.addemployeeform');})->name('addemployee');
	Route::get('show-employee', 'EmployeeController@showEmployee')->name('showemployee');
	Route::get('delete-user/{user_id}', 'EmployeeController@deletUser')->name('delete-user-data');
	Route::get('Edit-User/{user_id}', 'EmployeeController@EditUser')->name('edit-user-data');

	Route::get('add-member', function(){return view('backend.Members.addemember');})->name('add-member-form');
	Route::post('save-member', 'MemberController@saveMember')->name('save-member');
	Route::get('show-member', 'MemberController@showMember')->name('showmember');
	Route::get('membership-card/{member_id}', 'MemberController@membershipCard')->name('membership-card');
	Route::get('delete-member/{member_id}', 'MemberController@deletMember')->name('delete-member-data');
	Route::get('send-verification/{member_id}', 'MemberController@sendVerification')->name('send-verification');

//	Route::group(array('middleware' => 'myAuth'), function () {
//	}
});



Route::post('receive-sms', 'SmsSendController@receiveSms');




Route::get('/', function () {
	if (Auth::user()) {return redirect('/backend/dashboard');}
	return view('auth.login');});


Route::get('verify/{email}/{token}' , 'MemberController@verifyMemberbyEmail')->name('sendEmailDone');














//Route::get('/', function () {return view('auth.login');});
//Route::get('/login', function () {return view('auth.login');});
//
//Route::get('/backend', function () { return view('backend.dashboard');});
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//Route::post('save-employee', 'EmployeeController@saveEmployee')->name('save-employee');
//Route::get('add-employee', function(){return view('backend.user.addemployeeform');})->name('addemployee');
//Route::get('show-employee', 'EmployeeController@showEmployee')->name('showemployee');
//Route::get('Delete-User/{user_id}', 'EmployeeController@deletUser')->name('delete-user-data');
//Route::get('Edit-User/{user_id}', 'EmployeeController@EditUser')->name('edit-user-data');
//
//Route::get('add-member', function(){return view('backend.Members.addemember');})->name('add-member-form');
//Route::post('save-member', 'MemberController@saveMember')->name('save-member');
//Route::get('show-member', 'MemberController@showMember')->name('showmember');
//Route::get('delete-member/{user_id}', 'MemberController@deletMember')->name('delete-member-data');
//
//
//


