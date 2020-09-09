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
    return redirect()->route('home');
});

Auth::routes();
Route::group(['middleware' => ['auth','verified','CheckRole:admin,penjual']],function(){ 

    Route::group(['prefix'=>'user'], function(){
        Route::get('/viewAdmin', 'UserController@index')->name('user.viewAdmin');
        Route::get('/user.admin', 'UserController@admin')->name('user.admin');
		Route::get('/viewPenjual', 'UserController@viewPenjual')->name('user.viewPenjual');
		Route::get('/user.penjual', 'UserController@penjual')->name('user.penjual');
		Route::get('/viewPembeli', 'UserController@viewPembeli')->name('user.viewPembeli');
		Route::get('/user.pembeli', 'UserController@pembeli')->name('user.pembeli');
		Route::resource('user', 'UserController');
    });
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/produk', 'ProdukController');
    Route::get('/toko.all', 'TokoController@all')->name('toko.all');
    Route::resource('/toko', 'TokoController');
    Route::get('/kategori.all', 'KategoriController@all')->name('kategori.all');
    Route::resource('/kategori', 'KategoriController');
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