<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ustad','UstadController');
Route::resource('santri','SantriController');
Route::resource('wali','WaliController');