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

Route::group(['middlewareGroups' => ['web']], function () {

	Route::get('image/{path}', ['as' => 'image', 'uses' => 'Backend\DashboardController@getReponseImage'])->where('path', '(.*?)');
	
	Route::group(['namespace' => 'Auth'], function () {
		Route::group(['namespace' => 'Backend'], function () {
			Route::get('login', 'AuthController@getLogin');
            Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
            Route::get('logout', 'AuthController@logout');
		});

	});

	Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
		Route::group(['prefix' => 'v1'], function () { 
			Route::get('user/list', ['as'=>'api.user.list', 'uses'=>'UserController@list']);
		});
	});

	Route::group(['prefix' => '/', 'namespace' => 'Backend','middleware' => ['auth']], function () {
		Route::get('/', 'DashboardController@index');

		Route::get('user/data/role/{role}', ['as'=>'user.data.role', 'uses'=>'UserController@getDataWithRole']);
		Route::get('user/role/{role}', ['as'=>'user.role', 'uses'=>'UserController@role']);
		Route::get('user/data', ['as'=>'user.data', 'uses'=>'UserController@getData']);
		Route::resource('user', 'UserController');
	});
});

