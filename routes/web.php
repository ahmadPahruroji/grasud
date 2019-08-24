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
	return redirect('login');
});
// fungsi Hak Akses //
Route::get('check',function(){
	switch (Auth::user()->role_id) {
		case '1':
		return redirect('/home?login=true');
		break;
		case '2':
		return redirect('/homemember?login=true');
		break;
		case '3':
		return redirect('/homecoordinator');
		break;
		
		default:
			# code...
		break;
	}
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::resources([
// 	'users'=>'UserController',
// 	'biodatas'=>'BiodataController',
// 	'categories'=>'CategoryController',
// 	'complaints'=>'ComplaintController',
// 	'coordinators'=>'CoordinatorController',
// 	'countributions'=>'CountributionController',
// 	'events'=>'EventController',
// 	'members'=>'MemberController',
// 	'officers'=>'OfficerController',
// 	'spendings'=>'SpendingController',
// 	'proofs'=>'ProofController',
// 	'reports'=>'ReportController',
// ]);
// Route::get('/export', 'ReportController@export');
// Route::post('events/publish/{id}', 'EventController@publish')->name('events.publish');
// Route::post('complaints/status/{id}', 'ComplaintController@status')->name('complaints.status');
// Route::post('countributions/status/{id}', 'CountributionController@status')->name('countributions.status');

Route::group(['middleware'=>'auth'],function(){

	Route::group(['middleware'=>'role:1'],function(){

		Route::get('/home', 'HomeController@index')->name('home');
		Route::resources([
			'users'=>'UserController',
			'biodatas'=>'BiodataController',
			'categories'=>'CategoryController',
			'complaints'=>'ComplaintController',
			'coordinators'=>'CoordinatorController',
			'countributions'=>'CountributionController',
			'events'=>'EventController',
			'members'=>'MemberController',
			'officers'=>'OfficerController',
			'spendings'=>'SpendingController',
			'proofs'=>'ProofController',
			'profiles'=>'ProfileController',
			'reports'=>'ReportController',
		]);
		Route::get('/export', 'ReportController@export');
		Route::get('/iuran', 'ReportController@iuran');
		Route::post('/export/show', 'ReportController@show')->name('/export.show');
		Route::post('/export/tampil', 'ReportController@tampil')->name('/export.tampil');
		Route::post('/iuran/bulanan', 'ReportController@bulanan')->name('/iuran.bulanan');
		// Route::post('/homeuser/show','User\HomeUserController@show')->name('/homeuser.show');
		Route::post('events/publish/{id}', 'EventController@publish')->name('events.publish');
		Route::post('complaints/status/{id}', 'ComplaintController@status')->name('complaints.status');
		Route::post('countributions/status/{id}', 'CountributionController@status')->name('countributions.status');
		// 
		
		Route::post('/countributions/import_excel', 'CountributionController@import_excel');
	});


	Route::group(['middleware'=>'role:2'],function(){
		Route::get('/homemember', 'Member\HomeMemberController@index')->name('homemember');
		Route::resources([
			'memberusers'=>'Member\UserController',
			'countributionusers'=>'Member\CountributionController',
			'eventusers'=>'Member\EventController',
			'proofusers'=>'Member\ProofController',
			'profileusers'=>'Member\UsersController',
			'complaintusers'=>'Member\ComplaintController',
			'spendingusers'=>'Member\SpendingController',
		]);
		Route::get('/proofusers/file/{id}', 'Member\ProofController@show')->name('downloadfile');
		Route::post('complaintusers/status/{id}', 'ComplaintController@status')->name('complaintusers.status');
	});

	Route::group(['middleware'=>'role:3'],function(){
		Route::get('/homecoordinator', 'Coordinator\HomeCoordinatorController@index')->name('homecoordinator');
		Route::resources([
			'coordinatoruser'=>'Coordinator\UserController',
			'countributionuser'=>'Coordinator\CountributionController',
			'complaintuser'=>'Coordinator\ComplaintController',
		]);
		Route::post('countributionuser/status/{id}', 'Coordinator\CountributionController@status')->name('countributionuser.status');
		Route::post('complaintuser/status/{id}', 'Coordinator\ComplaintController@status')->name('complaintuser.status');
	});
});