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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
});

Route::group(['prefix' => 'office'], function () {
    
    Route::get('/login', 'office\LoginController@index')->name('admin.login');
    Route::post('/login', 'office\LoginController@login')->name('admin.do_login');
    Route::get('/logout', 'office\LoginController@logout')->name('admin.do_logout');
    
    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'office\DashboardController@index')->name('admin.dashboard.index');
        Route::resource('/user', 'office\UserController');
        Route::resource('/product', 'office\ProductController');
        Route::resource('/barang', 'office\GoodsController');
        
        Route::resource('/member-activity', 'office\MemberActivityController');
        Route::get('/member-activity-api', 'office\MemberActivityController@chart')->name('admin.member-activity.chart');
        
    });
});