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

Route::get('/', 'VersusController@index')->name('home');
Route::get('/classement', 'VersusController@ladder')->name('ladder');
Route::get('/stats/{studentId}', 'VersusController@stats')->name('stats');
Route::get('/all_check', 'VersusController@allCheck')->name('check');
