<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('/admin')->group(function () {
    // User management
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::get('/users', 'Admin\UserController@index')->name('users');
    Route::get('/users/create/', 'Admin\UserController@create')->name('create');
    Route::get('/users/update/{id}', 'Admin\UserController@update')->name('update');
    Route::get('/users/delete/{id}', 'Admin\UserController@delete')->name('delete');

    Route::post('/users/create', 'Admin\UserController@create_post')->name('users');
    Route::post('/users/update/{id}', 'Admin\UserController@update_post')->name('users');

    // Package management
    Route::get('/packages', 'Admin\PackageController@index')->name('packages');
    Route::get('/packages/create', 'Admin\PackageController@create')->name('packages');

    // Service management
    Route::get('/services', 'Admin\ServiceController@index')->name('services');
    Route::get('/services/create/{service}', 'Admin\ServiceController@create')->name('create');
    Route::post('/services/create/{service}', 'Admin\ServiceController@create_post')->name('create');
    
    Route::get('/services/update/{service}/{id}', 'Admin\ServiceController@update')->name('update');
    Route::post('/services/update/{service}/{id}', 'Admin\ServiceController@update_post')->name('update');
});

Route::prefix('/user')->group(function() {
    Route::get('/{id}/billing', 'User\BillController@index')->name('billing');
});

Route::get('/', 'HomeController@index')->name('home');
