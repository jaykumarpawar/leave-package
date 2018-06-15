<?php

Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers'], function () {
    Route::get('/', function () {
        return redirect('signin');
    });
    Route::get('signin', 'SigninController@index')->name('signin');
    Route::post('signin', 'SigninController@signin');
    Route::get('signup/{id}/{token}', 'SignupController@index');
    Route::post('signup', 'SignupController@signup')->name('signup');
});
Route::group(['namespace' => 'Crazyboy\Leave\Http\Controllers', 'middleware' => ['packageauth', 'web']], function () {

    Route::resource('user', 'UserController');
    Route::get('applyleave', 'LeaveController@index')->name('applyleave');
    Route::get('viewleave/{id}', 'LeaveController@view')->name('viewleave');
    Route::get('listleave', 'LeaveController@list')->name('listleave');
    Route::post('sendleave', 'LeaveController@send')->name('sendleave');
    Route::post('updateleave', 'LeaveController@update')->name('updateleave');
    Route::get('signout', 'SigninController@signout')->name('signout');
    Route::get('searchuser', 'UserController@searchUser');
    Route::get('getuser', 'UserController@getUser');
    Route::get('searchuserpage', 'UserController@searchUserPage');
});
