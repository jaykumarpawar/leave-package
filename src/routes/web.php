<?php

Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers'], function () {
    Route::get('/', function () {
        return redirect('signin');
    });
    Route::get('signin', 'SigninController@index')->name('signin');
    Route::post('signin', 'SigninController@signin');
    Route::get('signup', 'SignupController@index')->name('signup');
    Route::post('signup', 'SignupController@signup');
});
Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers', 'middleware' => ['packageauth', 'web']], function () {

    Route::get('leave', 'LeaveController@index')->name('leave');
    Route::post('leave', 'LeaveController@send');
    Route::get('signout', 'SigninController@signout')->name('signout');
});
