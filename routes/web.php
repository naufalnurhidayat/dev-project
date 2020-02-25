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
    Route::get('/admin/pinjam', 'PinjamController@index');
    Route::get('/admin/kembali', 'kembaliController@index');
    Route::get('/admin/detail/{id_pinjam}', 'PinjamController@show');
    // Route::get('/admin/detail/{id}', 'kembaliController@show');
    Route::patch('/admin/status/{pinjam}', 'PinjamController@update');
    // Karyawan
    Route::get('/admin/karyawan', 'Admin\KaryawanController@index');
    Route::get('/admin/karyawan/create', 'Admin\KaryawanController@create');
    Route::get('/admin/karyawan/{user}', 'Admin\KaryawanController@show');
    Route::post('/admin/karyawan', 'Admin\KaryawanController@store');
    Route::delete('/admin/karyawan/{user}', 'Admin\KaryawanController@destroy');
    Route::get('/admin/karyawan/edit/{user}', 'Admin\KaryawanController@edit');
    Route::patch('/admin/karyawan/{user}', 'Admin\KaryawanController@update');

    //Role
    Route::get('/admin/role', 'Admin\RoleController@index');
    Route::get('/admin/role/create', 'Admin\RoleController@create');
    Route::post('/admin/role', 'Admin\RoleController@store');
    Route::delete('/admin/role/{role}', 'Admin\RoleController@destroy');
    Route::get('/admin/role/edit/{role}', 'Admin\RoleController@edit');
    Route::patch('/admin/role/{role}', 'Admin\RoleController@update');

    //Pendidikan
    Route::get('/admin/pendidikan', 'Admin\pendidikanController@index');
    Route::get('/admin/ubah/{id}', 'Admin\pendidikanController@edit');
    Route::delete('/admin/hapus/{id}', 'Admin\pendidikanController@destroy');
    Route::get('/admin/tambahPendidikan', 'Admin\pendidikanController@create');
    Route::post('/admin/store', 'Admin\pendidikanController@store');
    Route::patch('/admin/apdet/{id}', 'Admin\pendidikanController@update');
    
    // Absen
    Route::get('admin/data-kehadiran', 'Admin\AbsensiController@index');
    Route::patch('admin/data-kehadiran/{id}', 'Admin\AbsensiController@update');

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
    Route::get('/admin/cuti/terima', 'Admin\CutiController@terima');
    Route::get('/admin/cuti/tolak', 'Admin\CutiController@tolak');
    Route::patch('/admin/cuti/{cuti}', 'Admin\CutiController@update');

    // -------------------------------------------
// });

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/registrasi', 'Admin\KaryawanController@create');
Route::post('/registrasi', 'Admin\KaryawanController@store');

// -----------------------------------------------
// User
// Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/', 'Home@index')->name('home');

    Route::get('/profile', 'ProfileController@index');
    Route::get('/profile/edit', 'ProfileController@edit');
    // Absen
    Route::get('/absen', 'AbsenController@index');
    Route::post('/absen', 'AbsenController@store');

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
    Route::get('/show/{id_pinjam}', 'barangController@show');
    Route::get('/tampil/table', 'barangController@tampil');
    // Route::get('/invetaris/keranjang', 'temporariController@index');
    Route::post('/pengajuan/store', 'PinjamController@store');
    Route::post('/pengajuan/pinjam/{id_karyawan}', 'barangController@store');
// });


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');