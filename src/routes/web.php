<?php

Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers'], function () {
    Route::get('/', function () {
        return redirect('signin');
    });
    Route::get('signin', 'SigninController@index')->name('signin');
    Route::post('signin', 'SigninController@signin');
    Route::get('signup/{id}/{token}', 'SignupController@index');
    Route::put('signup', 'SignupController@signup')->name('signup');
});
Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers', 'middleware' => ['packageauth', 'web']], function () {

    Route::resource('user', 'UserController');
    Route::get('apply', 'LeaveController@index')->name('leave');
    Route::post('leave', 'LeaveController@send');
    Route::get('signout', 'SigninController@signout')->name('signout');
    Route::get('searchuser', 'UserController@searchUser');
    Route::get('getuser', 'UserController@getUser');
    Route::get('searchuserpage', 'UserController@searchUserPage');
});
