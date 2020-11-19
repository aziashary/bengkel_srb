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

// Auth::routes();

Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/dashboard/kabeng', 'HomeController@kabeng')->name('kabeng');
Route::get('/dashboard/kasir', 'HomeController@kasir')->name('kasir')->middleware('cekstatus');
Route::get('/dashboard/sparepart', 'HomeController@sparepart')->name('sparepart');
Route::get('/dashboard/management', 'HomeController@management')->name('management');
Route::get('/barang/barang', 'BarangController@showbarang')->name('showbarang');

// Route::group(['prefix' => 'kabeng'], function () { 
    Route::get('/dashboard', 'HomeKabengController@index')->name('dashboard');

// });
Route::group(['prefix' => 'workorder'], function () {
    Route::get('/', ['as' => 'workorder.index', 'uses' => 'WorkOrderController@index']);
    Route::get('/create', ['as' => 'workorder.create', 'uses' => 'WorkOrderController@create']);
    // Route::post('/store', ['as' => 'jenis.store', 'uses' => 'JenisController@store']);
    // Route::get('/destroy/{id}', ['as' => 'jenis.destroy', 'uses' => 'JenisController@destroy']);
    // Route::get('/edit/{id}', ['as' => 'jenis.edit', 'uses' => 'JenisController@edit']);
    // Route::patch('/update/{id}', ['as' => 'jenis.update', 'uses' => 'JenisController@update']);
});