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
//login
// Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'LoginController@register')->name('register');
// Route::post('login', 'LoginController@login');
Route::post('register', 'LoginController@regis');
Route::get('login', 'LoginController@getLogin')->name('login')->middleware('guest');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');

//homepage
Route::get('dashboard', 'HomepageController@homepage')->name('index');
Route::get('time', 'HomepageController@time');
Route::get('user', 'HomepageController@user')->name('user')->middleware('auth:user'); 

//data tamu
Route::get('tamu', 'TamuController@index')->name('datatamu');
Route::get('tamu/add', 'TamuController@add')->name('addformtamu')->middleware('auth:admin');
Route::post('tamu', 'TamuController@insertdata')->middleware('auth:admin');
Route::get('tamu/edit/{id}','TamuController@editdata')->middleware('auth:admin');
Route::post('tamu/update','TamuController@update')->middleware('auth:admin');
Route::get('tamu/hapus/{id}','TamuController@delete')->middleware('auth:admin');

//data kamar
Route::get('kamar', 'KamarController@index')->name('datakamar');
Route::get('kamar/add', 'KamarController@index')->name('addformkamar');
Route::post('kamar', 'KamarController@insertdata');
Route::get('kamar/edit/{id}','KamarController@editdata');
Route::post('kamar/update','KamarController@update');
Route::get('kamar/hapus/{id}','KamarController@delete');

//transaksi
Route::get('transaksi', 'TransaksiController@index')->name('datatrans');
Route::get('transaksi/add', 'TransaksiController@add')->name('addformtrans');
Route::post('transaksi', 'TransaksiController@insertdata');
Route::get('transaksi/detail/{id}', 'TransaksiController@detail')->name('detailtrans');
Route::get('transaksi/edit/{id}','TransaksiController@editdata');
Route::post('transaksi/update','TransaksiController@update');
Route::get('transaksi/hapus/{id}','TransaksiController@delete');
Route::get('transaksi/bayar/{id}','TransaksiController@bayar');
Route::post('transaksi/bayar/{id}','TransaksiController@getbayar');

//report
Route::get('pages/report', 'ReportController@index')->name('datareport')->middleware('auth:admin');
Route::get('/pages/cetak_pdf', 'ReportController@cetak_pdf');