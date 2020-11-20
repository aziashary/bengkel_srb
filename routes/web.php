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
// Route::get('/dashboard/kasir', 'HomeController@kasir')->name('kasir')->middleware('cekstatus');
// Route::get('/dashboard/sparepart', 'HomeController@sparepart')->name('sparepart');
// Route::get('/dashboard/management', 'HomeController@management')->name('management');

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', ['as' => 'barang.index', 'uses' => 'BarangController@index']);
    Route::get('/create', ['as' => 'barang.create', 'uses' => 'BarangController@create']);
    Route::get('/edit/{kode_barang}', ['uses' => 'BarangController@edit']);
    Route::patch('/update/{kode_barang}', ['uses' => 'BarangController@update']);
    Route::post('/store', ['uses' => 'BarangController@store']);
    Route::get('/delete/{kode_barang}', ['uses' => 'BarangController@delete']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', ['as' => 'kategori.index', 'uses' => 'KategoriController@index']);
    Route::get('/create', ['as' => 'kategori.create', 'uses' => 'KategoriController@create']);
    Route::get('/edit/{id_kategori}', ['uses' => 'KategoriController@edit']);
    Route::patch('/update/{id_kategori}', ['uses' => 'KategoriController@update']);
    Route::post('/store', ['uses' => 'KategoriController@store']);
    Route::get('/delete/{id_kategori}', ['uses' => 'KategoriController@delete']);
});

Route::group(['prefix' => 'stokmasuk'], function () {
    Route::get('/', ['as' => 'stokmasuk.index', 'uses' => 'StokMasukController@index']);
    Route::get('/create', ['as' => 'stokmasuk.create', 'uses' => 'StokMasukController@create']);
    Route::get('/edit/{id_stokmasuk}', ['uses' => 'StokMasukController@edit']);
    Route::patch('/update/{id_stokmasuk}', ['uses' => 'StokMasukController@update']);
    Route::post('/store', ['uses' => 'StokMasukController@store']);
    Route::get('/delete/{id_stokmasuk}', ['uses' => 'StokMasukController@delete']);
});

Route::group(['prefix' => 'workorder'], function () {
    Route::get('/', ['as' => 'workorder.index', 'uses' => 'WorkOrderController@index']);
    Route::get('/create', ['as' => 'workorder.create', 'uses' => 'WorkOrderController@create']);
    // Route::post('/store', ['as' => 'jenis.store', 'uses' => 'JenisController@store']);
    // Route::get('/destroy/{id}', ['as' => 'jenis.destroy', 'uses' => 'JenisController@destroy']);
    // Route::get('/edit/{id}', ['as' => 'jenis.edit', 'uses' => 'JenisController@edit']);
    // Route::patch('/update/{id}', ['as' => 'jenis.update', 'uses' => 'JenisController@update']);
});