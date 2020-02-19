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

// Home
Route::get('/admin', 'Admin\HomeController@index');

// Master
Route::get('/barang/index', 'databoxController@index');
Route::get('/admin/create', 'databoxController@create');
Route::post('/barang/store', 'databoxController@store');
Route::post('/admin/barang/update', 'databoxController@update');
Route::get('/admin/barang/edit/{id_barang}', 'databoxController@edit');
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
Route::get('/admin/pendidikan', 'Admin\pendidikanController@index');
Route::get('/ubah/{id}', 'Admin\pendidikanController@edit');
Route::delete('/hapus/{id}', 'Admin\pendidikanController@destroy');
Route::get('/tambahPendidikan', 'Admin\pendidikanController@create');
Route::post('/store', 'Admin\pendidikanController@store');
Route::post('/apdet/{id}', 'Admin\pendidikanController@update');

// Agama
Route::get('/admin/agama', 'Admin\agamaController@index');
Route::get('/admin/agama/create', 'Admin\agamaController@create');
Route::post('/admin/agama', 'Admin\agamaController@store');
Route::delete('/admin/agama/{agama}', 'Admin\agamaController@destroy');
Route::get('/admin/agama/edit/{agama}', 'Admin\agamaController@edit');
Route::patch('/admin/agama/{agama}', 'Admin\agamaController@update');

// Jencut
Route::get('/admin/jeniscuti', 'Admin\JenisCutiController@index');
Route::get('/admin/jeniscuti/create', 'Admin\JenisCutiController@create');
Route::post('/admin/jeniscuti', 'Admin\JenisCutiController@store');
Route::delete('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@destroy');
Route::get('/admin/jeniscuti/edit/{jenis_cuti}', 'Admin\JenisCutiController@edit');
Route::patch('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@update');

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
Route::post('/cuti', 'CutiController@store');


//--------------------------------------------
//Invetaris

Route::get('/invetaris', 'Invetaris@index');
Route::get('/pinjam/create/{id_barang}', 'pinjamController@create');
Route::get('/barang', 'barangController@index');
Route::get('/show/{id_barang}', 'barangController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');