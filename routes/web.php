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

// Route::get('/', function () {
//     return view('home/home');
// });

Route::get('/', 'Home@index');
Route::get('/createkaryawan', 'CreateKaryawan@index');
Route::get('/login', 'CreateKaryawan@login');

// -------------------------------------------
// Absen

Route::get('/absen', 'Absen@index');
Route::get('/tampilabsen', 'Absen@show');
Route::get('/checkabsen', 'Absen@create');
Route::get('/izinabsen', 'Absen@izinAbsen');

// -------------------------------------------
// Cuti

Route::get('/cuti', 'CutiController@index');


//--------------------------------------------
//Invetaris

Route::get('/invetaris', 'Invetaris@index');
Route::get('/home', 'homeInvetaris@index');
