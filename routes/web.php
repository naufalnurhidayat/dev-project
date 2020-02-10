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

// Master

// Home
Route::get('/admin', 'Admin\HomeController@index');

// Karyawan
Route::get('/karyawan', 'Admin\KaryawanController@index');
Route::get('/createkaryawan', 'Admin\KaryawanController@create');
Route::get('/detailkaryawan/{karyawan}', 'Admin\KaryawanController@show');
Route::post('/karyawan', 'Admin\KaryawanController@store');
Route::delete('/hapuskaryawan/{karyawan}', 'Admin\KaryawanController@destroy');
Route::get('/ubahkaryawan/{karyawan}', 'Admin\KaryawanController@edit');
Route::patch('/karyawan/{karyawan}', 'Admin\KaryawanController@update');

// Role
Route::get('/role', 'Admin\RoleController@index');
Route::get('/createrole', 'Admin\RoleController@create');
Route::post('/createrole', 'Admin\RoleController@store');
Route::delete('/hapusrole/{role}', 'Admin\RoleController@destroy');
Route::get('/ubahrole/{role}', 'Admin\RoleController@edit');
Route::patch('/ubahrole/{role}', 'Admin\RoleController@update');

// Pendidikan
Route::get('/pendidikan', 'Admin\pendidikanController@index');
Route::get('/ubah/{id}', 'Admin\pendidikanController@edit');
Route::delete('/hapus/{id}', 'Admin\pendidikanController@destroy');
Route::get('/tambahPendidikan', 'Admin\pendidikanController@create');
Route::post('/store', 'Admin\pendidikanController@store');
Route::post('/apdet/{id}', 'Admin\pendidikanController@update');

// Agama


// -------------------------------------------
// User

Route::get('/', 'Home@index');
Route::get('/login', 'Login\LoginController@index');

// -------------------------------------------
// Absen

Route::get('/absen', 'Absen@index');
Route::get('/tampilabsen', 'Absen@show');
Route::get('/checkabsen', 'Absen@create');
Route::get('/izinabsen', 'Absen@izinAbsen');

// -------------------------------------------
// Cuti

Route::get('/cuti', 'CutiController@index');
Route::get('/cuti/create', 'CutiController@create');


//--------------------------------------------
//Invetaris

Route::get('/invetaris', 'Invetaris@index');
Route::get('/pinjam', 'pinjamController@index');
Route::get('/barang', 'barangController@index');
Route::get('/show/{id_barang}', 'barangController@show');

