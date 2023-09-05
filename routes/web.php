<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


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



route::get('/', 'HomeController@index')
    ->name('index.index');
Route::get('/dashboard/dashboard', 'DashboardController@index')
    ->name('dashboard.dashboard')->middleware('login_auth');


// halaman tambah gambar
Route::get('/addimage/index', 'AddimageController@index')
    ->name('addimage.index')->middleware('login_auth');

// route untuk menambahkan gambar
Route::get('/addimage/create', 'AddimageController@create')
    ->name('addimage.create')->middleware('login_auth');

Route::post('/addimage', 'AddimageController@store')
    ->name('addimage.store')->middleware('login_auth');
// end halam tambah gambar

// route untuk menghapus gambar
Route::get('/delete/{id}', 'AddimageController@delete')
    ->name('delete')->middleware('login_auth');
// end route menghapus gambar


// route untuk menampilkan data sebelum dilakukan edit
Route::get('/tampilfoto/{id}', 'AddimageController@tampilfoto')
    ->name('tampilfoto')->middleware('login_auth');
// end route untuk menampilkan data sebelum dilakukan edit


// Route untuk edit data
Route::post('/update/{id}', 'AddimageController@update')
    ->name('update')->middleware('login_auth');
// end Route untuk edit data


// order midtrans
// Route::get('/transaksi/buy', [OrderController::class, 'index'])
//     ->name('transaksi.buy');
Route::get('/transaksi/buy', 'OrderController@index')
    ->name('transaksi.buy');

// checkout
// Route::post('/beli', [OrderController::class, 'beli']);
Route::post('/beli', 'OrderController@checkout')
    ->name('beli');

// route untuk setelah melakukan pembayaran
// Route::post('/midtrans-callback', 'OrderController@callback')
//     ->name('callback');
Route::get('/invoice/{id}', 'OrderController@invoice')
    ->name('invoice');


// login admin
Route::get('/login', 'AdminController@index')
    ->name('login.index');
Route::get('/logout', 'AdminController@logout')
    ->name('login.logout');
Route::post('/login', 'AdminController@process')
    ->name('login.process');


// route halaman akun
Route::get('/addakun/akun', 'AdminController@akun')
    ->name('addakun.akun')->middleware('login_auth');

// route halaman add akun
Route::get('/addakun/create', 'AdminController@create')
    ->name('addakun.create')->middleware('login_auth');

Route::post('/addakun', 'AdminController@store')
    ->name('addakun.store')->middleware('login_auth');

//Rote hapus akun
Route::get('/deleteakun/{id}', 'AdminController@delete')
    ->name('delete')->middleware('login_auth');

// route untuk menampilkan data sebelum dilakukan edit
Route::get('/tampilakun/{id}', 'AdminController@tampilakun')
    ->name('tampilakun')->middleware('login_auth');
// end route untuk menampilkan data sebelum dilakukan edit


// Route untuk edit data
Route::post('/edit/{id}', 'AdminController@update')
    ->name('update')->middleware('login_auth');
// end Route untuk edit data
