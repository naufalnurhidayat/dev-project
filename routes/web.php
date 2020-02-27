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
Route::group(['middleware' => 'auth'], function () {
	
	Route::group(['middleware' => 'checkRole:Admin'], function () {
		// ADMIN
			// Route::get('/logoutAdmin', 'AuthController@logout');
			// Home Admin
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
    //  Route::post('/admin/kembali/store', 'kembaliController@store');
     Route::patch('/admin/status/{pinjam}', 'kembaliController@update');
     // Route::get('/admin/detail/{id}', 'PinjamController@show');
     // Route::get('/admin/detail/{id}', 'kembaliController@show');
     Route::patch('/admin/status/{id_pinjam}', 'PinjamController@update');
		
			// Karyawan
			Route::get('/admin/karyawan', 'Admin\KaryawanController@index');
			Route::get('/admin/karyawan/{user}', 'Admin\KaryawanController@show');
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
			
			//Stream
			Route::get('/admin/stream', 'Admin\StreamController@index');
			Route::get('/admin/stream/create', 'Admin\StreamController@create');
			Route::post('/admin/stream', 'Admin\StreamController@store');
			Route::delete('/admin/stream/{stream}', 'Admin\StreamController@destroy');
			Route::get('/admin/stream/edit/{stream}', 'Admin\StreamController@edit');
			Route::patch('/admin/stream/{stream}', 'Admin\StreamController@update');
			
			//Projek
			Route::get('/admin/projek', 'Admin\ProjekController@index');
			Route::get('/admin/projek/create', 'Admin\ProjekController@create');
			Route::post('/admin/projek', 'Admin\ProjekController@store');
			Route::delete('/admin/projek/{projek}', 'Admin\ProjekController@destroy');
			Route::get('/admin/projek/edit/{projek}', 'Admin\ProjekController@edit');
			Route::patch('/admin/projek/{projek}', 'Admin\ProjekController@update');
			
			
			// Jencut
			Route::get('/admin/jeniscuti', 'Admin\JenisCutiController@index');
			Route::get('/admin/jeniscuti/create', 'Admin\JenisCutiController@create');
			Route::post('/admin/jeniscuti', 'Admin\JenisCutiController@store');
			Route::delete('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@destroy');
			Route::get('/admin/jeniscuti/edit/{jenis_cuti}', 'Admin\JenisCutiController@edit');
			Route::patch('/admin/jeniscuti/{jenis_cuti}', 'Admin\JenisCutiController@update');
			
		  // Transaksi
			// Absen
			Route::get('admin/data-kehadiran', 'Admin\AbsensiController@index');
			Route::patch('admin/data-kehadiran/{id}', 'Admin\AbsensiController@update');
			Route::get('admin/absen', 'Admin\AbsensiController@create');
			Route::post('admin/absen', 'Admin\AbsensiController@store');
		
			//Cuti
			Route::get('/admin/cuti', 'Admin\CutiController@index');
			Route::get('/admin/cuti/terima', 'Admin\CutiController@terima');
			Route::get('/admin/cuti/tolak', 'Admin\CutiController@tolak');
      Route::patch('/admin/cuti/{cuti}', 'Admin\CutiController@update');
			
		// --------------------------------------------------------------------------------------		
	});

	Route::group(['middleware' => 'checkRole:Scrum Master'], function () {
		// SM
			// Route::get('/logoutSm', 'AuthController@logout');
			// Home SM
			Route::get('/sm', 'SM\HomeController@index');
		  // Master
			//inventaris
			Route::get('/sm/barang/index', 'databoxController@index');
			Route::get('/sm/create', 'databoxController@create');
			Route::post('/barang/store', 'databoxController@store');
			Route::patch('/sm/barang/update/{id_barang}', 'databoxController@update');
			Route::get('/sm/barang/edit/{id_barang}', 'databoxController@edit');
			Route::delete('/sm/destroy/{id_barang}', 'databoxController@destroy');
			Route::get('/sm/kategori/index', 'KategoriController@index');
			Route::get('/sm/kategori/create', 'KategoriController@create');
			Route::post('/sm/kategori/store', 'KategoriController@store');
			Route::get('/sm/kategori/edit/{id_kategori}', 'KategoriController@edit');
			Route::patch('/sm/kategori/update/{id_kategori}', 'KategoriController@update');
			Route::delete('/sm/kategori/destroy/{id_kategori}', 'KategoriController@destroy');
      
       //Admin Invetaris
     Route::get('/sm/pinjam', 'PinjamController@index');
     Route::get('/sm/kembali', 'kembaliController@index');
     Route::post('/sm/kembali/store', 'kembaliController@store');
     Route::patch('/sm/status/{pinjam}', 'kembaliController@update');
     // Route::get('/sm/detail/{id}', 'PinjamController@show');
     // Route::get('/sm/detail/{id}', 'kembaliController@show');
     Route::patch('/sm/status/{id_pinjam}', 'PinjamController@update');
		
			// Karyawan
			Route::get('/sm/karyawan', 'SM\KaryawanController@index');
			Route::get('/sm/karyawan/{user}', 'SM\KaryawanController@show');
			Route::delete('/sm/karyawan/{user}', 'SM\KaryawanController@destroy');
			Route::get('/sm/karyawan/edit/{user}', 'SM\KaryawanController@edit');
			Route::patch('/sm/karyawan/{user}', 'SM\KaryawanController@update');
			
		  // Transaksi
			// Absen
			Route::get('sm/data-kehadiran', 'SM\AbsensiController@index');
			Route::patch('sm/data-kehadiran/{id}', 'SM\AbsensiController@update');
		
			//Cuti
			Route::get('/sm/cuti', 'SM\CutiController@index');
			Route::get('/sm/cuti/terima', 'SM\CutiController@terima');
			Route::get('/sm/cuti/tolak', 'SM\CutiController@tolak');
      Route::patch('/sm/cuti/{cuti}', 'SM\CutiController@update');
      
			
		// --------------------------------------------------------------------------------------
	});

	Route::group(['middleware' => 'checkRole:Product Owner'], function () {
		// PO
			// Route::get('/logoutPo', 'AuthController@logout');
			// Home PO
			Route::get('/po', 'PO\HomeController@index');
		  // Master
			//inventaris
			Route::get('/po/barang/index', 'databoxController@index');
			Route::get('/po/create', 'databoxController@create');
			Route::post('/po/barang/store', 'databoxController@store');
			Route::patch('/po/barang/update/{id_barang}', 'databoxController@update');
			Route::get('/po/barang/edit/{id_barang}', 'databoxController@edit');
			Route::delete('/po/destroy/{id_barang}', 'databoxController@destroy');
			Route::get('/po/kategori/index', 'KategoriController@index');
			Route::get('/po/kategori/create', 'KategoriController@create');
			Route::post('/po/kategori/store', 'KategoriController@store');
			Route::get('/po/kategori/edit/{id_kategori}', 'KategoriController@edit');
			Route::patch('/po/kategori/update/{id_kategori}', 'KategoriController@update');
			Route::delete('/po/kategori/destroy/{id_kategori}', 'KategoriController@destroy');
			//PO Invetaris
       Route::get('/po/pinjam', 'PinjamController@index');
       Route::get('/po/kembali', 'kembaliController@index');
       Route::post('/po/kembali/store', 'kembaliController@store');
       Route::patch('/po/status/{pinjam}', 'kembaliController@update');
       // Route::get('/po/detail/{id}', 'PinjamController@show');
       // Route::get('/po/detail/{id}', 'kembaliController@show');
       Route::patch('/po/status/{id_pinjam}', 'PinjamController@update');
		
			// Karyawan
			Route::get('/po/karyawan', 'PO\KaryawanController@index');
			Route::get('/po/karyawan/{user}', 'PO\KaryawanController@show');
			Route::delete('/po/karyawan/{user}', 'PO\KaryawanController@destroy');
			Route::get('/po/karyawan/edit/{user}', 'PO\KaryawanController@edit');
			Route::patch('/po/karyawan/{user}', 'PO\KaryawanController@update');
			
		  // Transaksi
			// Absen
			Route::get('po/data-kehadiran', 'PO\AbsensiController@index');
			Route::patch('po/data-kehadiran/{id}', 'PO\AbsensiController@update');
		
			//Cuti
			Route::get('/po/cuti', 'PO\CutiController@index');
			Route::get('/po/cuti/terima', 'PO\CutiController@terima');
			Route::get('/po/cuti/tolak', 'PO\CutiController@tolak');
      Route::patch('/po/cuti/{cuti}', 'PO\CutiController@update');
			
		// --------------------------------------------------------------------------------------
	});

	Route::group(['middleware' => 'checkRole:User'], function () {
		// USER
			// Home User
			Route::get('/', 'Home@index')->name('home');
		
			Route::get('/profile/{nama}', 'ProfileController@index');
			Route::get('/profile/edit', 'ProfileController@edit');
		
			// Absen
			Route::get('/absen', 'AbsenController@index');
			Route::post('/absen', 'AbsenController@store');
			
			// Cuti
			Route::get('/cuti', 'CutiController@index');
			Route::get('/cuti/create', 'CutiController@create');
			Route::post('/cuti', 'CutiController@store');
		
			//Invetaris
      Route::get('/invetaris', 'barangController@index');
      Route::post('/kembali/store', 'kembaliController@store');
      Route::get('/pinjam/create/{id_barang}', 'pinjamController@create');
      Route::get('/barang', 'barangController@index');
      Route::get('/show/{id_pinjam}', 'barangController@show');
      Route::get('/tampil/table', 'barangController@tampil');
      // Route::get('/invetaris/keranjang', 'temporariController@index');
      Route::post('/pengajuan/store', 'PinjamController@store');
      Route::post('/pengajuan/pinjam/{id_karyawan}', 'barangController@store');
		
		// --------------------------------------------------------------------------------------
	});
	
	Route::group(['middleware' => ['checkRole:Admin,Product Owner,Scrum Master,User']], function () {
		Route::get('/logout', 'AuthController@logout');
	});


     
});


// --------------------------------------------------------------------------------------

// });

// Login
    Route::get('/login', 'AuthController@index')->name('login');
    Route::post('/login', 'AuthController@login');
// Registrasi
    Route::get('/registrasi', 'AuthController@create');
  	Route::post('/registrasi', 'AuthController@store');
Route::get('/accessforbidden', function() {
	return view('error.blocked');
});
