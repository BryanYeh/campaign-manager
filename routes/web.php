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

Route::get('/', function () {
    return view('welcome');
});

Route::get('supervisor/{id}/key/{key}','SupervisorController@index')->name('supervisor-view');
Route::post('supervisor/update','SupervisorController@save')->name('supervisor-update');

Route::get('admin','AdminController@index')->name('admin-view');
Route::get('admin/report', 'AdminController@report')->name('admin-reports');
