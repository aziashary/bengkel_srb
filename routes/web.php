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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');

// Route::group(['prefix' => 'kabeng'], function () { 
    // Route::get('/dashboard', 'HomeKabengController@index')->name('dashboard');

// });
Route::group(['prefix' => 'workorder'], function () {
    Route::get('/', ['as' => 'workorder.index', 'uses' => 'WorkOrderController@index']);
    Route::get('/create', ['as' => 'workorder.create', 'uses' => 'WorkOrderController@create']);
    // Route::post('/store', ['as' => 'jenis.store', 'uses' => 'JenisController@store']);
    // Route::get('/destroy/{id}', ['as' => 'jenis.destroy', 'uses' => 'JenisController@destroy']);
    // Route::get('/edit/{id}', ['as' => 'jenis.edit', 'uses' => 'JenisController@edit']);
    // Route::patch('/update/{id}', ['as' => 'jenis.update', 'uses' => 'JenisController@update']);
});