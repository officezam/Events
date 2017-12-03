<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});



Route::group(array('prefix' => 'backend'), function ()
{
	Auth::routes();

	Route::group(['middleware' => 'auth' ], function ($router)
	{
		Route::get( '/', function () {return redirect( '/backend/dashboard' );} );

		Route::get( 'dashboard', function () {return view( 'backend.dashboard' );} );

		Route::post( 'save-employee', 'EmployeeController@saveEmployee' )->name( 'save-employee' );
		Route::get( 'add-employee', function () {return view( 'backend.user.addemployeeform' );})->name( 'addemployee' );
		Route::get( 'show-employee', 'EmployeeController@showEmployee' )->name( 'showemployee' );
		Route::get( 'delete-user/{user_id}', 'EmployeeController@deletUser' )->name( 'delete-user-data' );
		Route::get( 'Edit-User/{user_id}', 'EmployeeController@EditUser' )->name( 'edit-user-data' );

		Route::get( 'add-member', function () {return view( 'backend.Members.addemember' );})->name( 'add-member-form' );
		Route::post( 'save-member', 'MemberController@saveMember' )->name( 'save-member' );
		Route::get( 'show-member', 'MemberController@showMember' )->name( 'showmember' );
		Route::get( 'membership-card/{member_id}', 'MemberController@membershipCard' )->name( 'membership-card' );
		Route::get( 'delete-member/{member_id}', 'MemberController@deletMember' )->name( 'delete-member-data' );
		Route::get( 'send-verification/{member_id}', 'MemberController@sendVerification' )->name( 'send-verification' );

	});
});



Route::post('receive-sms', 'SmsSendController@receiveSms');




Route::get('/', function () {
	if (Auth::user()) {return redirect('/backend/dashboard');}
	return view('auth.login');});


Route::get('verify/{email}/{token}' , 'MemberController@verifyMemberbyEmail')->name('sendEmailDone');

