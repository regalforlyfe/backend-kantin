<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard.index');
});

Route::get('/kategori.all', 'KategoriController@all')->name('kategori.all');
Route::get('/produk.all', 'ProdukController@all')->name('produk.all');
Route::resource('/kategori', 'KategoriController');
Route::resource('/produk', 'ProdukController');
Route::resource('/toko', 'TokoController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('/admin', function () {
    return view('user.admin.index');
});

Route::get('/penjual', function () {
    return view('user.penjual.index');
});

Route::get('/pembeli', function () {
    return view('user.pembeli.index');
});

Route::get('/byviewers', function () {
    return view('report.byviewers.index');
});

Route::get('/byorders', function () {
    return view('report.byorders.index');
});

Route::get('/order', function () {
    return view('order.index');
});