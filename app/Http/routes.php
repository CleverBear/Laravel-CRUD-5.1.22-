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


/**
 *  Display the Home page.
*/
Route::get('/', 				'Home\HomeController@showHome');
Route::get('home', 				'Home\HomeController@showHome');

/**
 *  Show the form for SignUp User.
*/
Route::get('signup', 			'Auth\AuthController@getSignup');

/**
 *  Store a newly created SignUp User.
*/
Route::post('signup', 			'Auth\AuthController@postSignup');

/**
 *  Show the form for Login User,Admin and Employee.
*/
Route::get('login', 			'Auth\AuthController@getLogin');

/**
 *  Display the specified resource of Login.
*/
Route::post('login', 			'Auth\AuthController@postLogin');

/**
 *  Logout User,Admin and Employee.
*/
Route::get('logout', 			'Auth\AuthController@getLogout');

/**
 *  Show the form for Forgot password of User,Admin and Employee.
*/
Route::get('password', 	'Auth\AuthController@getforgotPassword');



/** 
 *  Display the DashBoard User View.
*/
Route::get('dashboard', 		'User\DashboardController@showDashboard');

/**
 *  Display the Price View.
*/
Route::get('price', 			'User\PriceController@showPrice');

/**
 *  Show the form for Tax Service.
*/
Route::get('taxservice', 		'User\TaxServiceController@getTaxservice');

/**
 *  Store a newly created Tax Service.
 */
Route::post('taxservice', 		'User\TaxServiceController@postTaxservice');

/**
 *  Show the edit form for Tax Service.
*/
Route::get('edit/taxservice/{id}', 		'User\TaxServiceController@edit');

/**
 *  Show the edit form for Tax Service.
*/
Route::post('edit/taxservice/{id}', 		'User\TaxServiceController@update');

/**
 *  Delete Tax Service.
*/
Route::get('delete/taxservice/{id}', 		'User\TaxServiceController@destroy');

/**
 *  Show the form for Tax Progress.
*/
Route::get('progress', 			'User\TaxServiceController@getProgress');


/**
 * Show the upload form
 */
Route::get('upload', 			'User\UploadController@index');

/**
 * Store the upload data
 */
Route::post('upload', 			'User\UploadController@store');

/**
 *	Edit the upload data
 */
Route::get('edit/upload/{id}', 			'User\UploadController@edit');

/**
 *	Update the upload data
 */
Route::post('update/upload/{id}', 			'User\UploadController@update');

/**
 *	Delete the upload data
 */
Route::get('delete/upload/{id}', 			'User\UploadController@destroy');


Route::get('download/{id}',						'User\UploadController@download');




/**
 *	Admin panel
 *
 *	Show the user data in admin panel
 */
Route::get('admin/user', 					'Admin\AdminController@userindex');

Route::get('admin/application', 			'Admin\AdminController@applicationindex');

Route::get('admin/view/application/{id}', 	'Admin\AdminController@viewApplication');


Route::group(['middleware' => ['auth','admin']], function () {

	Route::get('admin/admin', 					'Admin\AdminController@adminindex');

	Route::post('create/employee', 				'Admin\AdminController@createEmployee');

	Route::get('delete/employee/{id}', 			'Admin\AdminController@deleteEmployee');

	Route::get('edit/employee/{id}', 			'Admin\AdminController@getEditEmployee');

	Route::post('edit/employee/{id}', 			'Admin\AdminController@postEditEmployee');
});

Route::get('search/application', 			'Admin\AdminController@search');

Route::get('search/user', 					'Admin\AdminController@usersearch');


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('add/signature/{token}', 'Signature\SignatureController@getSignature');
Route::post('add/signature/{token}', 'Signature\SignatureController@postSignature');

Route::get('view/signature/{token}', 'Signature\SignatureController@viewSignature');