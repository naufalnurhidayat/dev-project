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

// -------------------------------------------
// Admin
Route::get('/admin', 'Admin\HomeController@index');
Route::get('/karyawan', 'Admin\KaryawanController@index');
Route::get('/createkaryawan', 'Admin\KaryawanController@create');
Route::get('/detailkaryawan/{karyawan}', 'Admin\KaryawanController@show');
Route::get('/pendidikan', 'Admin\pendidikanController@index');
Route::get('/ubah/{id}', 'Admin\pendidikanController@edit');
Route::get('/hapus/{id}', 'Admin\pendidikanController@destroy');
Route::get('/tambahPendidikan', 'Admin\pendidikanController@create');
Route::post('/store', 'Admin\pendidikanController@store');
Route::post('/apdet/{id}', 'Admin\pendidikanController@update');


// -------------------------------------------
// User

Route::get('/', 'Home@index');
Route::get('/login', 'CreateKaryawan@login');

// -------------------------------------------
// Absen

Route::get('/absen', 'Absen@index');
Route::get('/tampilabsen', 'Absen@show');
Route::get('/checkabsen', 'Absen@create');
Route::get('/izinabsen', 'Absen@izinAbsen');

//--------------------------------------------
//Invetaris

Route::get('/invetaris', 'Invetaris@index');
Route::get('/pinjam', 'pinjamController@index');
Route::get('/barang', 'barangController@index');
Route::get('/show/{id_barang}', 'barangController@show');
