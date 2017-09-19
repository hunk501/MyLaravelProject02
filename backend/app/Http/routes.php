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

/*
Route::get('/', 'HomeController@index');

*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/', 'Login@index');
Route::get('/home', function(){
    return redirect('account');
});
Route::get('login', 'Login@index');

Route::resource('account', 'Account');

Route::resource('policy', 'Policy');

Route::resource('sample', 'Sample');

Route::resource('pr', 'PolicyReceipt');
Route::resource('ir', 'IRRequest');
Route::resource('ledger', 'Ledger');
Route::resource('cm', 'ClaimsMonitoring');
Route::resource('policy_ledger', 'PolicyLedger');
Route::resource('policy_daily_transaction', 'PolicyDailyTransaction');

Route::get('pr_bounce', 'PolicyReceipt@getBounceCheque');
Route::get('pr/addnewcheck/{pr_account_id}', 'PolicyReceipt@addNewCheck');
Route::post('pr/validate_new_check/{pr_account_id}', 'PolicyReceipt@validateNewCheck');
Route::post('policy/search', 'Policy@search');
Route::post('policy_ledger/search', 'PolicyLedger@search');
Route::post('updateBounce', 'PolicyReceipt@updateBounce');
Route::get('policy_ledger/report/print', 'PolicyLedger@report');
Route::post('pr/login/validate', 'PolicyReceipt@login');
Route::get('reportThis', function(){
	echo"vsdvs";
});
/*
Route::resource('userlogin', 'UserLogin');

*/
Route::get('success', function(){
	return view("common.body1");
});


Route::get('returnJson', function(){
	$data = array(
		'date' => '09/19/2017',
		'status' => 1,
		'allow' => true
	);
	echo json_encode($data);
});


