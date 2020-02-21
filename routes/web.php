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
// Route::group(['middleware' => 'auth'], function () {
  // Home
Route::get('/admin', 'Admin\HomeController@index');
  // Master
    //inventaris
    Route::get('/barang/index', 'databoxController@index');
    Route::get('/admin/create', 'databoxController@create');
    Route::post('/barang/store', 'databoxController@store');
    Route::patch('/admin/barang/update/{id_barang}', 'databoxController@update');
    Route::get('/admin/barang/edit/{id_barang}', 'databoxController@edit');
    Route::delete('/admin/destroy/{id_barang}', 'databoxController@destroy');
    Route::get('/kategori/index', 'KategoriController@index');
    Route::get('/kategori/create', 'KategoriController@create');
    Route::post('/kategori/store', 'KategoriController@store');
    Route::get('/kategori/edit/{id_kategori}', 'KategoriController@edit');
    Route::patch('/kategori/update/{id_kategori}', 'KategoriController@update');
    Route::delete('/kategori/destroy/{id_kategori}', 'KategoriController@destroy');
    //Admin Invetaris
    Route::get('/admin/pinjam', 'pinjamController@index');
    // Karyawan
    Route::get('/karyawan', 'Admin\KaryawanController@index');
    Route::get('/createkaryawan', 'Admin\KaryawanController@create');
    Route::get('/detailkaryawan/{karyawan}', 'Admin\KaryawanController@show');
    Route::post('/karyawan', 'Admin\KaryawanController@store');
    Route::delete('/hapuskaryawan/{karyawan}', 'Admin\KaryawanController@destroy');
    Route::get('/ubahkaryawan/{karyawan}', 'Admin\KaryawanController@edit');
    Route::patch('/karyawan/{karyawan}', 'Admin\KaryawanController@update');

    //Role
    Route::get('/role', 'Admin\RoleController@index');
    Route::get('/createrole', 'Admin\RoleController@create');
    Route::post('/createrole', 'Admin\RoleController@store');
    Route::delete('/hapusrole/{role}', 'Admin\RoleController@destroy');
    Route::get('/ubahrole/{role}', 'Admin\RoleController@edit');
    Route::patch('/ubahrole/{role}', 'Admin\RoleController@update');

    //Pendidikan
    Route::get('/admin/pendidikan', 'Admin\pendidikanController@index');
    Route::get('/ubah/{id}', 'Admin\pendidikanController@edit');
    Route::delete('/hapus/{id}', 'Admin\pendidikanController@destroy');
    Route::get('/tambahPendidikan', 'Admin\pendidikanController@create');
    Route::post('/store', 'Admin\pendidikanController@store');
    Route::post('/apdet/{id}', 'Admin\pendidikanController@update');

    //Agama
    Route::get('/admin/agama', 'Admin\agamaController@index');
    Route::get('/admin/agama/create', 'Admin\agamaController@create');
    Route::post('/admin/agama', 'Admin\agamaController@store');
    Route::delete('/admin/agama/{agama}', 'Admin\agamaController@destroy');
    Route::get('/admin/agama/edit/{agama}', 'Admin\agamaController@edit');
    Route::patch('/admin/agama/{agama}', 'Admin\agamaController@update');
    
    // Absen
    Route::get('admin/data-kehadiran', 'Admin\AbsensiController@index');

    // Jencut
    Route::get('/admin/jeniscuti', 'Admin\JenisCutiController@index');
    Route::get('/admin/jeniscuti/create', 'Admin\JenisCutiController@create');
    Route::post('/admin/jeniscuti', 'Admin\JenisCutiController@store');
    Route::delete('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@destroy');
    Route::get('/admin/jeniscuti/edit/{jenis_cuti}', 'Admin\JenisCutiController@edit');
    Route::patch('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@update');
    
    // Transaksi
    //Cuti
    Route::get('/admin/cuti', 'Admin\CutiController@index');
    Route::patch('/admin/cuti/{cuti}', 'Admin\CutiController@update');

    // -------------------------------------------
// });

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');

// -----------------------------------------------
Route::get('/', 'Home@index')->middleware('auth');
// User
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', 'AuthController@logout');

    // Absen
    Route::get('/absen', 'AbsenController@index');
    Route::get('/tampilabsen', 'AbsenController@show');
    Route::get('/checkabsen', 'AbsenController@create');
    Route::get('/izinabsen', 'AbsenController@izinAbsen');

    // -------------------------------------------
    // Cuti

    Route::get('/cuti', 'CutiController@index');
    Route::get('/cuti/create', 'CutiController@create');
    Route::post('/cuti', 'CutiController@store');

    //--------------------------------------------
    //Invetaris

    Route::get('/invetaris', 'barangController@index');
    Route::get('/pinjam/create/{id_barang}', 'pinjamController@create');
    Route::get('/barang', 'barangController@index');
    Route::get('/show/{id_barang}', 'barangController@show');
    Route::get('/invetaris/pengajuan', 'barangController@tampil');
    Route::post('/pengajuan/store', 'pinjamController@store');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');