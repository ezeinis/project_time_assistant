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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/','PagesController@index');

    Route::get('/index','PagesController@index');

    Route::post('/project/create','ProjectController@create');

    Route::get('/project/add_hours','ProjectController@add_hours');

    Route::get('/project/get_work_instance_view','ProjectController@get_work_instance');

    Route::get('/work_instance/delete','ProjectController@delete_work_instance');

    Route::get('/work_instance/edit','ProjectController@edit_work_instance');
});

Route::auth();

