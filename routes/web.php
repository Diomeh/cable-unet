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
});

Route::prefix('/user')->group(function() {
    Route::get('/{id}/billing', 'User\BillController@index')->name('billing');
});

Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');
