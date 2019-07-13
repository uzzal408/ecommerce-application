<?php

Route::group(['prefix' => 'admin'], function(){

    Route::get('login','Admin\AdminController@showLoginForm')->name('admin.login');
    Route::post('login','Admin\AdminController@login')->name('admin.login.post');
    Route::get('logout','Admin\AdminController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

    });
});


