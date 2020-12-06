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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// Route::get('/dashboard/kabeng', 'HomeController@kabeng')->name('kabeng');
// Route::get('/dashboard/kasir', 'HomeController@kasir')->name('kasir')->middleware('cekstatus');
// Route::get('/dashboard/sparepart', 'HomeController@sparepart')->name('sparepart');
// Route::get('/dashboard/management', 'HomeController@management')->name('management');
Route::group(['middleware' => 'isBarang'], function () {
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

    Route::group(['prefix' => 'stokkeluar'], function () {
        Route::get('/', ['as' => 'stokkeluar.index', 'uses' => 'StokKeluarController@index']);
    });
});

Route::group(['middleware' => 'isTransaksi'], function () {
    Route::group(['prefix' => 'workorder'], function () {
        Route::get('/', ['as' => 'workorder.index', 'uses' => 'WorkOrderController@index']);
        Route::get('/create', ['as' => 'workorder.create', 'uses' => 'WorkOrderController@create']);
        Route::post('/storeCart', ['as' => 'workorder.storeCart', 'uses' => 'WorkOrderController@storeCart']);
        Route::get('/viewBarang/{kode_barang}', ['as' => 'workorder.viewBarang', 'uses' => 'WorkOrderController@viewBarang']);
        Route::get('/viewCart', ['as' => 'workorder.viewCart', 'uses' => 'WorkOrderController@viewCart']);
        Route::delete('/deleteCart/{id}', ['uses' => 'WorkOrderController@deleteCart']);
        Route::get('/diskon', ['uses' => 'WorkOrderController@diskon']);
        Route::post('/store', ['uses' => 'WorkOrderController@store']);
        Route::get('/detail/{id_workorder}', ['as' => 'workorder.detail', 'uses' => 'WorkOrderController@detail']);
        // Route::post('/store', ['as' => 'jenis.store', 'uses' => 'JenisController@store']);
        // Route::get('/destroy/{id}', ['as' => 'jenis.destroy', 'uses' => 'JenisController@destroy']);
        // Route::get('/edit/{id}', ['as' => 'jenis.edit', 'uses' => 'JenisController@edit']);
        // Route::patch('/update/{id}', ['as' => 'jenis.update', 'uses' => 'JenisController@update']);
    });

    Route::group(['prefix' => 'invoice'], function () {
        Route::get('/', ['as' => 'invoice.index', 'uses' => 'InvoiceController@index']);
        Route::get('/select', ['as' => 'invoice.select', 'uses' => 'InvoiceController@select']);
        Route::get('/create/{id_workorder}', ['as' => 'invoice.create', 'uses' => 'InvoiceController@create']);
        Route::post('/storeCart', ['as' => 'invoice.storeCart', 'uses' => 'InvoiceController@storeCart']);
        Route::get('/viewBarang/{kode_barang}', ['as' => 'invoice.viewBarang', 'uses' => 'InvoiceController@viewBarang']);
        Route::get('/viewCart', ['as' => 'invoice.viewCart', 'uses' => 'InvoiceController@viewCart']);
        Route::delete('/deleteCart/{id}', ['uses' => 'InvoiceController@deleteCart']);
        Route::get('/diskon', ['uses' => 'InvoiceController@diskon']);
        Route::post('/store', ['uses' => 'InvoiceController@store']);
        Route::get('/detail/{id_invoice}', ['as' => 'invoice.detail', 'uses' => 'InvoiceController@detail']);
    });
});
